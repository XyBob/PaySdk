<?php
namespace xytool\PaySdk\LeShuaPay\Notify;

use \xytool\PaySdk\LeShuaPay\Notify\Base;
use \xytool\PaySdk\LeShuaPay\Reply\Pay  as ReplyPay;
/**
 * 乐刷支付-支付通知处理基类
 */
abstract class Pay extends Base
{
    public $replyData;
	public function __construct()
	{
		parent::__construct();
        $this->replyData = new ReplyPay;
	}
}