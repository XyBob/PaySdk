<?php
namespace xytool\PaySdk\LeShuaPay\CoverPay\Params;

use  xytool\PaySdk\LeShuaPay\CoverPay\Params\ExtendParams;

/**
 * 乐刷被扫下单业务参数类
 */
class BusinessParams
{
    use \xytool\PaySdk\Traits\JSONParams;

    /**
     * 订单描述
     * @var string
     */
    public $body;

    /**
     * WXZF微信，ZFBZF支付宝，UPSMZF银联二维码
     * @var string
     */
    public $pay_way;

    /**
     *商户内部订单号，可以包含字母：确保同一个商户下唯一
     * @var string
     */
    public $third_order_id;

    /**
     * 总金额 单位分
     * @var string
     */
    public $amount;

    /**
     * 接收乐刷通知的URL，需做UrlEncode 处理，需要绝对路径，确保乐刷能正确访问，若不需要回调请忽略。
     * @var string
     */
    public $notify_url;

    /**
     * 商户发起交易的IP地址
     * @var string
     */
    public $client_ip;

    /**
     * 商户门店编号
     * @var string
     */
    public $shop_no;

    /**
     * 商户终端编号
     * @var string
     */
    public $pos_no;

    /**
     * 附加数据，支付成功原样返回；注意：只能是汉字、英文字母、数字
     * @var string
     */
    public $attach;

    /**
     * 指定支付方式,1：禁止使用信用卡；0或者不填：不限制
     * @var
     */
    public $limit_pay;

    /**
     * 订单优惠标记,透传给微信
     * @var
     */
    public $goods_tag;

    public $auth_code;



    /**
     *  支付宝花呗分期数，支持3、6、12期
     * @var string
     */
    public $hb_fq_num;


    /**
     * 随机字符串 32位
     * @var string
     */
    public $nonce_str;

    /**
     * 当前可透传支付宝扫码点餐的参数，business_params、goods_detail、extend_params
     * 随机字符串 32位
     * @var string
     */
    public $extend_business_params;

    public function __construct()
    {
        $this->extend_business_params = new ExtendParams;
        $this->nonce_str = md5(mt_rand());
    }

    public function toString()
    {
        $obj = (array)$this;
     /*   $result = $obj['extend_params']->toString();
        if(null === $result)
        {
            unset($obj['extend_params']);
        }
        else
        {
            $obj['extend_params'] = $result;
        }
        if(null === $obj['logistics_detail'])
        {
            unset($obj['logistics_detail']);
        }
        else
        {
            $obj['logistics_detail'] = json_encode($obj['logistics_detail']);
        }
        if(null === $obj['business_params'])
        {
            unset($obj['business_params']);
        }
        else
        {
            $obj['business_params'] = json_encode($obj['business_params']);
        }
        if(null === $obj['receiver_address_info'])
        {
            unset($obj['receiver_address_info']);
        }
        else
        {
            $obj['receiver_address_info'] = json_encode($obj['receiver_address_info']);
        }
        foreach($obj as $key => $value)
        {
            if(null === $value)
            {
                unset($obj[$key]);
            }
        }*/
        return \json_encode($obj);
    }
}