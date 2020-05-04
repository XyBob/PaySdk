<?php
namespace xytool\PaySdk\LeShuaPay\Params;

use \xytool\PaySdk\PublicBase;

/**
 * 支付宝即时到账接口公共参数
 */
class PublicParams extends PublicBase
{
    /**
     * 用户子标识,微信公众号、小程序、支付宝服务窗、支付宝小程序、银联JS支付必填
     * @var string
     */
    public $sub_openid;

    /**
     * 乐刷商户id
     * @var string
     */
    public $merchant_id;
    public $key;
    public $sign_type = 'MD5';
    public function __construct()
    {
        $this->apiDomain = 'https://paygate.leshuazf.com';
    }
}
