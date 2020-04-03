<?php
namespace  xytool\PaySdk\LeShuaPay\CoverPay\Params;

use xytool\PaySdk\Traits\JSONParams;
/**
 * 业务扩展参数
 */
class ExtendParams
{
    use JSONParams{
        toString as private traitToString;
    }

    /**
     * 当前可透传支付宝扫码点餐的参数，business_params、goods_detail、extend_params
     * @var string
     */
    public $business_params;

    /**
     * 商品详情
     *
     * @var string
     */
    public $goods_detail;

    public function toString()
    {
        if(null === $this->goods_detail)
        {
            return null;
        }
        return $this->traitToString();
    }
}