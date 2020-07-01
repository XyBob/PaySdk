<?php

namespace xytool\PaySdk\SaoBeiPay\Params;

use \xytool\PaySdk\PublicBase;

/**
 * 扫呗主扫接口公共参数
 */
class PublicParams extends PublicBase
{
    /**
     * 版本号，当前版本100
     * @var string
     */
    public $pay_ver = '100';
    /**
     * 支付方式，010微信，020支付宝，060qq钱包，090口碑，100翼支付，140和包支付（仅限和包通道）
     * @var string
     */
    public $pay_type = '010';
    public $sign_type = 'MD5';
    /**
     * 接口类型，当前类型012
     * @var string
     */
    public $service_id = '012';
    /**
     * 商户号
     * @var string
     */
    public $merchant_no;
    /**
     * 终端号
     * @var string
     */
    public $terminal_id;

    public $access_token;

    public function __construct()
    {
        $this->apiDomain = 'https://pay.lcsw.cn/lcsw';
    }
}
