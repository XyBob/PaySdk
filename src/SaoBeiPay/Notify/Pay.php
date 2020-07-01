<?php
namespace xytool\PaySdk\SaoBeiPay\Notify;

use \xytool\PaySdk\SaoBeiPay\Notify\Base;
use \xytool\PaySdk\SaoBeiPay\Reply\Pay  as ReplyPay;
/**
 * 扫呗支付-支付通知处理基类
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