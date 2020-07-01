<?php
namespace  xytool\PaySdk\SaoBeiPay\InitiativePay\Params;

use xytool\PaySdk\SaoBeiRequestBase;
use \xytool\PaySdk\SaoBeiPay\InitiativePay\Params\BusinessParams;

/**
 * 扫呗主支付下单请求类
 */
class Request extends SaoBeiRequestBase
{

    /**
     * 接口名称
     * @var string
     */
    public $_apiMethod = '/pay/100/jspay';


    /**
     * 接收乐刷通知的URL，需做UrlEncode 处理，需要绝对路径，确保乐刷能正确访问，若不需要回调请忽略。
     * @var string
     */
    public $notify_url;

    public $make_sign_key = [
        'pay_ver',
        'pay_type',
        'service_id',
        'merchant_no',
        'terminal_id',
        'terminal_trace',
        'terminal_time',
        'total_fee'
    ];

    /**
     * 业务请求参数
     * 参考https://docs.open.alipay.com/204/105465/
     * @var \xytool\PaySdk\SaoBeiPay\InitiativePay\Params\BusinessParams
     */
    public $businessParams;

    public function __construct()
    {
        $this->businessParams = new BusinessParams;
        $this->_method = 'POST';
    }
}