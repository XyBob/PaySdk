<?php

namespace xytool\PaySdk\SaoBeiPay\InitiativePay\Params;


/**
 * 扫呗主扫下单业务参数类
 */
class BusinessParams
{
    use \xytool\PaySdk\Traits\JSONParams;


    /**
     * 终端流水号，填写商户系统的订单号
     * @var string
     */
    public $terminal_trace="";

    /**
     * 终端交易时间，yyyyMMddHHmmss，全局统一时间格式
     * @var string
     */
    public $terminal_time="";

    /**
     * 金额，单位分
     * @var string
     */
    public $total_fee="";

    /**
     *公众号appid，公众号支付时使用的appid（若传入，则open_id需要保持一致）
     * @var string
     */
    public $sub_appid="";

    /**
     * 用户标识（微信openid，支付宝userid），pay_type为010及020时需要传入
     * @var string
     */
    public $open_id="";

    /**
     * 订单描述
     * @var string
     */
    public $order_body="";



    /**
     * 外部系统通知地址
     * @var string
     */
    public $notify_url="";

    /**
     * 附加数据，原样返回
     * @var string
     */
    public $attach="";

    /**
     * 订单包含的商品列表信息，Json格式。pay_type为010，020，090时，可选填此字段
     * @var string
     */
    public $goods_detail="";

    /**
     * 订单优惠标记，代金券或立减优惠功能的参数（字段值：cs和bld
     * @var string
     */
    public $goods_tag="";
    

    public function __construct()
    {
    }

    public function toString()
    {
        $obj = (array)$this;
        return \json_encode($obj);
    }
}