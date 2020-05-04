<?php
namespace  xytool\PaySdk\LeShuaPay\CoverPay\Params;

use xytool\PaySdk\LeShuaRequestBase;
use \xytool\PaySdk\LeShuaPay\CoverPay\Params\BusinessParams;

/**
 * 乐刷被扫支付下单请求类
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
    public $service = 'upload_authcode';

    /**
     * 乐刷服务器主动通知商户服务器里指定的页面http/https路径。
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