<?php
namespace xytool\PaySdk\LeShuaPay;

use \xytool\PaySdk\Base;
use \xytool\PaySdk\Lib\Encrypt\AES;
use \xytool\PaySdk\Lib\ObjectToArray;

/**
 * 乐刷放平台SDK类
 */
class sdk extends Base
{
    /**
     * 公共参数
     * @var \xytool\PaySdk\LeShuaPay\Params\PublicParams
     */
    public $publicParams;

    /**
     * 处理执行接口的数据
     * @param $params
     * @param &$data 数据数组
     * @param &$requestData 请求用的数据，格式化后的
     * @param &$url 请求地址
     * @return array
     */
    public function __parseExecuteData($params, &$data, &$requestData, &$url)
    {
      //  echo json_encode($params);exit;
        $params = ObjectToArray::parse($params);
        $businessParams = $params['businessParams'];
        unset($params['businessParams']);
        $params =  \array_merge(ObjectToArray::parse($businessParams), $params);
        $data = \array_merge(ObjectToArray::parse($this->publicParams), $params);
       // echo json_encode($this->publicParams);exit;
        unset($data['sign_type'],$data['_apiMethod'],$data['apiDomain'], $data['appID'], $data['appPrivateKey'], $data['appPrivateKeyFile'], $data['appPublicKey'], $data['appPublicKeyFile'], $data['_syncResponseName'], $data['_method'], $data['_isSyncVerify'], $data['aesKey'], $data['isUseAES'],$data['extend_business_params']);
        $data['sign'] = $this->sign($data);
        $requestData = $this->filter_array($data);
        unset($requestData['key']);
      //  echo json_encode($requestData);exit;
        $url = $this->publicParams->apiDomain.$params['_apiMethod'];
    }

    /**
     * 签名
     * @param $data
     * @return string
     */
    public function sign($data)
    {
        $content = $this->parseSignData($data);
      //  echo $content;exit;
        switch($this->publicParams->sign_type)
        {
            case 'MD5':
                $result =strtoupper(md5($content));;
                break;
            default:
                throw new \Exception('未知的加密方式：' . $this->publicParams->sign_type);
        }
        return $result;
    }

    /**
     * 验证回调通知是否合法
     * @param $data
     * @return bool
     */
    public function verifyCallback($data)
    {
       // echo json_encode($data);exit;
        if(!isset($data['sign']))
        {
            return false;
        }
        $signType = $this->publicParams->sign_type;
        $data['key'] = $this->publicParams->notify_key;
        unset($data['error_code']);
        $sign = $data['sign'];
        $content = $this->parseSignData($data,true);
        switch($signType)
        {
            case 'MD5':
                return $sign === md5($content);
            default:
                throw new \Exception('未知的加密方式：' . $signType);
        }
    }

    /**
     * 验证同步返回内容
     * @param AlipayRequestBase $params
     * @param array $data
     * @return bool
     */
    public function verifySync($params, $data)
    {
        if(!isset($data['sign']))
        {
            return true;
        }
        $content = \json_encode($data[$params->_syncResponseName], JSON_UNESCAPED_UNICODE);
        if(empty($this->publicParams->appPublicKeyFile))
        {
            $key = $this->publicParams->appPublicKey;
            $method = 'verifyPublic';
        }
        else
        {
            $key = $this->publicParams->appPublicKeyFile;
            $method = 'verifyPublicFromFile';
        }
        switch($this->publicParams->sign_type)
        {
            case 'RSA':
                return \xytool\PaySdk\Lib\Encrypt\RSA::$method($content, $key, \base64_decode($data['sign']));
            case 'RSA2':
                return \xytool\PaySdk\Lib\Encrypt\RSA2::$method($content, $key, \base64_decode($data['sign']));
            default:
                throw new \Exception('未知的加密方式：' . $this->publicParams->sign_type);
        }
    }

    public function parseSignData($data,$null_flag=false)
    {
        unset($data['sign']);
        \ksort($data);
        $content = '';

        if($null_flag){//空值参与签名
            foreach ($data as $k => $v){
                if($k!='key'){
                    $content .= $k . '=' . $v . '&';
                }
            }
        }else{
            foreach ($data as $k => $v){
                if($v !== '' && $v !== null && !is_array($v)&&$k!='key'){
                    $content .= $k . '=' . $v . '&';
                }
            }
        }

        $content .='key='.$data['key'];
        return trim($content, '&');
    }

    /**
     * 调用执行接口
     * @param mixed $params
     * @param string $method
     * @return mixed
     */
    public function execute($params, $format = 'XML')
    {
        $result = parent::execute($params, $format);
        return $result;
    }

    /**
     * 检查是否执行成功
     * @param array $result
     * @return boolean
     */
    protected function __checkResult($result)
    {
        $result = reset($result);
        return isset($result['resp_code']) && ($result['resp_code']==0);
    }

    /**
     * 获取错误信息
     * @param array $result
     * @return string
     */
    protected function __getError($result)
    {
      //  $result = reset($result);

        if(isset($result['sub_code']) && $result['sub_code']!=0)
        {
            return $result['resp_msg'];
        }
        return '';
    }

    /**
     * 获取错误代码
     * @param array $result
     * @return string
     */
    protected function __getErrorCode($result)
    {
        if(isset($result['sub_code']) && 0 != $result['sub_code'])
        {
            return $result['sub_code'];
        }
        return '';
    }


    function filter_array($arr, $values = ['', null, false, 0, '0',[]]) {
        foreach ($arr as $k => $v) {
            if (is_array($v) && count($v)>0) {
                $arr[$k] = $this->filter_array($v, $values);
            }
            foreach ($values as $value) {
                if ($v === $value) {
                    unset($arr[$k]);
                    break;
                }
            }
        }
        return $arr;
    }
}
