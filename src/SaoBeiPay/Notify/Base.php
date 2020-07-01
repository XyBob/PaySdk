<?php
namespace xytool\PaySdk\SaoBeiPay\Notify;

use \xytool\PaySdk\Lib\XML;
use \xytool\PaySdk\NotifyBase;
use \xytool\PaySdk\Lib\ObjectToArray;
use \Yurun\Util\YurunHttp\Stream\MemoryStream;

/**
 * 扫呗支付-通知处理基类
 */
abstract class Base extends NotifyBase
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 返回数据
	 * @param boolean $success
	 * @param string $message
	 * @return void
	 */
	public function reply($code, $message = '')
	{
		$this->replyData->return_code = $code;
		$this->replyData->return_msg = $message;
		if(null === $this->swooleResponse)
		{
            echo json_encode([
                'return_code'=>$this->replyData->return_code,
                'return_msg'=>$this->replyData->return_msg
            ]);exit;
		}
		else if($this->swooleResponse instanceof \Swoole\Http\Response)
		{
			$this->swooleResponse->end($this->replyData->return_msg);
		}
		else if($this->swooleResponse instanceof \Psr\Http\Message\ResponseInterface)
		{
			$this->swooleResponse = $this->swooleResponse->withBody(new MemoryStream($this->replyData->return_msg));
		}
	}

	/**
	 * 获取通知数据
	 * @return void
	 */
	public function getNotifyData()
	{
		if($this->swooleRequest instanceof \Swoole\Http\Request)
		{
		    $data = $this->swooleRequest->rawContent();
		}
		if($this->swooleRequest instanceof \Psr\Http\Message\ServerRequestInterface)
		{
            $data = (string)$this->swooleRequest->getBody();
		}
        $data = \file_get_contents('php://input');
		return json_decode($data,true);
	}
	
	/**
	 * 对通知进行验证，是否是正确的通知
	 * @return bool
	 */
	public function notifyVerify()
	{
		return $this->sdk->verifyCallback($this->data);
	}
}