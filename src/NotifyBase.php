<?php
namespace xytool\PaySdk;

use \xytool\PaySdk\Lib\ObjectToArray;

/**
 * 通知处理类基类
 */
abstract class NotifyBase
{
	/**
	 * 通知数据
	 * @var array
	 */
	public $data;

	/**
	 * SDK实例化
	 * @var \xytool\PaySdk\Base
	 */
	public $sdk;

	/**
	 * 返回数据
	 * @var mixed
	 */
	public $replyData;

	/**
	 * swoole 请求类，或支持 PSR-7 标准的对象
	 *
	 * @var \Swoole\Http\Request|\Psr\Http\Message\ServerRequestInterface
	 */
	public $swooleRequest;

	/**
	 * swoole 响应类，或支持 PSR-7 标准的对象
	 *
	 * @var \Swoole\Http\Response|\Psr\Http\Message\ResponseInterface
	 */
	public $swooleResponse;

	public function __construct()
	{

	}

	/**
	 * 执行
	 * @return void
	 */
	public function exec()
	{
		$this->data = $this->getNotifyData();
		if(!$this->notifyVerify())
		{
		//	$this->reply(02, '签名失败');
			throw new \Exception('签名失败');
		}
		$this->__exec();
	}

	/**
	 * 返回数据
	 * @param boolean $success
	 * @param string $message
	 * @return void
	 */
	public abstract function reply($success, $message = '');

	/**
	 * 获取通知数据
	 * @return void
	 */
	public abstract function getNotifyData();

	/**
	 * 对通知进行验证，是否是正确的通知
	 * @return bool
	 */
	public abstract function notifyVerify();

	/**
	 * 后续执行操作
	 * @return void
	 */
	protected abstract function __exec();
}