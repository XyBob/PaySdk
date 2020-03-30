<?php
namespace  xytool\PaySdk\Alipay\MiniApp\Pay\Params;

use xytool\PaySdk\AlipayRequestBase;
use \xytool\PaySdk\Alipay\MiniApp\Pay\Params\BusinessParams;

/**
 * 支付宝手机支付下单请求类
 */
class Request extends AlipayRequestBase
{
    /**
     * 接口名称
     * @var string
     */
    public $method = 'alipay.trade.create';

    /**
     * 支付宝服务器主动通知商户服务器里指定的页面http/https路径。
     * @var string
     */
    public $notify_url;

    /**
     * 详见：https://docs.open.alipay.com/common/105193
     * @var string
     */
    public $app_auth_token;

    /**
     * 业务请求参数
     * 参考https://docs.open.alipay.com/204/105465/
     * @var \xytool\PaySdk\Alipay\MiniApp\params\Pay\BusinessParams
     */
    public $businessParams;

    public function __construct()
    {
        $this->businessParams = new BusinessParams;
        $this->_method = 'GET';
    }
}