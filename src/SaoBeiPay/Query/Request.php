<?php
namespace xytool\PaySdk\SaoBeiPay\Query;

use xytool\PaySdk\SaoBeiRequestBase;
use xytool\PaySdk\SaoBeiPay\Query\BusinessParams;
/**
 * 乐刷支付-查询请求类
 *
 */
class Request extends SaoBeiRequestBase
{
    /**
     * 接口名称
     * @var string
     */
    public $_apiMethod = '/pay/100/query';


	/**
	 * 终端查询流水号，填写商户系统的查询流水号
	 * @var string
	 */
	public $terminal_trace='';

	/**
	 * 终端查询时间，yyyyMMddHHmmss，全局统一时间格式
	 * @var string
	 */
	public $terminal_time='';

    /**
     * 当前支付终端流水号，与pay_time同时传递
     * @var string
     */
	public $pay_trace='';

    /**
     * 当前支付终端交易时间，yyyyMMddHHmmss，全局统一时间格式，与pay_trace同时传递
     * @var string
     */
	public $pay_time='';

    /**
     * 订单号，查询凭据，可填利楚订单号、微信订单号、支付宝订单号、银行卡订单号任意一个
     * @var string
     */
	public $out_trade_no='';


	public $businessParams;
    public $make_sign_key = [
        'pay_ver',
        'pay_type',
        'service_id',
        'merchant_no',
        'terminal_id',
        'terminal_trace',
        'terminal_time',
        'out_trade_no'
    ];
	public function __construct()
	{
        $this->businessParams = new BusinessParams;
        $this->_method = 'POST';
	}
}