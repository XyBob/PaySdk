<?php

namespace xytool\PaySdk\LeShuaPay\InitiativePay\Params;

use  xytool\PaySdk\LeShuaPay\InitiativePay\Params\ExtendParams;

/**
 * 乐刷被扫下单业务参数类
 */
class BusinessParams
{
    use \xytool\PaySdk\Traits\JSONParams;

    /**
     * 订单描述
     * @var string
     */
    public $body;

    /**
     * WXZF微信，ZFBZF支付宝，UPSMZF银联二维码
     * @var string
     */
    public $pay_way;

    /**
     * 微信公众号ID ；微信公众号支付的公众号id。选填，如果传了会使用此appid 进行下单；没传使用商户进件时最新配置的 appid
     * @var string
     */
    public $appid;

    /**
     * 微信公众号、小程序、支付宝服务窗、支付宝小程序、银联JS支付必填
     * @var string
     */
    public $sub_openid;
    /**
     *商户内部订单号，可以包含字母：确保同一个商户下唯一
     * @var string
     */
    public $third_order_id;

    /**
     * 总金额 单位分
     * @var string
     */
    public $amount;

    /**
     * 0-支付宝扫码支付、银联二维码扫码支付；1-微信公众号、支付宝服务窗支付<原生支付>、银联js支付；2-微信公众号、支付宝服务窗支付<简易支付>；3-微信小程序支付、支付宝小程序支付
     * @var string
     */
    public $jspay_flag = 1;



    /**
     * 商户发起交易的IP地址
     * @var string
     */
    public $client_ip;

    /**
     * 商户门店编号
     * @var string
     */
    public $shop_no;

    /**
     * 商户终端编号
     * @var string
     */
    public $pos_no;

    /**
     * 附加数据，支付成功原样返回；注意：只能是汉字、英文字母、数字
     * @var string
     */
    public $attach;

    /**
     * 指定支付方式,1：禁止使用信用卡；0或者不填：不限制
     * @var
     */
    public $limit_pay;

    /**
     * 订单优惠标记,透传给微信
     * @var
     */
    public $goods_tag;


    /**
     *  支付宝花呗分期数，支持3、6、12期
     * @var string
     */
    public $hb_fq_num;


    /**
     * 随机字符串 32位
     * @var string
     */
    public $nonce_str;

    /**
     * 当前可透传支付宝扫码点餐的参数，business_params、goods_detail、extend_params
     * 随机字符串 32位
     * @var string
     */
    public $extend_business_params;


    public function __construct()
    {
        $this->extend_business_params = new ExtendParams;
        $this->nonce_str              = md5(mt_rand());
    }

    public function toString()
    {
        $obj = (array)$this;
        return \json_encode($obj);
    }
}