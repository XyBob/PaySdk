<?php
namespace xytool\PaySdk;

/**
 * 微信请求类基类
 */
abstract class LeShuaRequestBase extends RequestBase
{
    /**
     * 接口名称
     * @var string
     */
    public $_service = '';






    public function __construct()
    {
        $this->_isSyncVerify = true;
    }
}