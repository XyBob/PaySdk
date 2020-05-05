<?php
namespace xytool\PaySdk\LeShuaPay\Query;

use xytool\PaySdk\LeShuaRequestBase;
use xytool\PaySdk\LeShuaPay\Query\BusinessParams;
/**
 * 乐刷支付-查询请求类
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
	public $service = 'query_status';

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

	public $nonce_str;

	public function __construct()
	{
        $this->businessParams = new BusinessParams;
        $this->_method = 'POST';
        $this->nonce_str = md5(mt_rand());
	}
}