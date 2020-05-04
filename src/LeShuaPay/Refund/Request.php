<?php
namespace xytool\PaySdk\LeShuaPay\Refund;

use xytool\PaySdk\LeShuaRequestBase;
use xytool\PaySdk\LeShuaPay\Refund\BusinessParams;
/**
 * 乐刷支付-退款请求类
 *
 */
class Request extends LeShuaRequestBase
{
    /**
     * 接口名称
     * @var string
     */
    public $_apiMethod = '/cgi-bin/lepos_pay_gateway.cgi';
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'unified_refund';

	/**
	 * 乐刷订单号，与商户订单号二选一
	 * @var string
	 */
	public $leshua_order_id;

	/**
	 * 商户订单号与乐刷订单号二选一
	 * @var string
	 */
	public $third_order_id;

	/**
	 * 商户退款单号
	 * @var string
	 */
	public $merchant_refund_id;

    /**
     * 附加数据
     * @var string
     */
    public $attach;


	/**
	 * 退款总金额，订单总金额，单位为分，只能为整数
	 * @var int
	 */
	public $refund_amount;

	/**
	 * 随机字符串
	 * @var string
	 */
	public $nonce_str;

	/**
	 * 接收乐刷退款结果通知的URL，需做Url Encode处理，需要绝对路径，确保乐刷能正确访问
	 * @var string
	 */
	public $notify_url;

	public function __construct()
	{
        $this->businessParams = new BusinessParams;
        $this->_method = 'POST';
        $this->nonce_str = md5(mt_rand());
	}
}