<?php
namespace  xytool\PaySdk\LeShuaPay\InitiativePay\Params;

use xytool\PaySdk\LeShuaRequestBase;
use \xytool\PaySdk\LeShuaPay\InitiativePay\Params\BusinessParams;

/**
 * 乐刷被主支付下单请求类
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
    public $service = 'get_tdcode';

    /**
     * 接收乐刷通知的URL，需做UrlEncode 处理，需要绝对路径，确保乐刷能正确访问，若不需要回调请忽略。
     * @var string
     */
    public $notify_url;



    /**
     * 业务请求参数
     * 参考https://docs.open.alipay.com/204/105465/
     * @var \xytool\PaySdk\LeShuaPay\CoverPay\Params\BusinessParams
     */
    public $businessParams;

    public function __construct()
    {
        $this->businessParams = new BusinessParams;
        $this->_method = 'POST';
    }
}