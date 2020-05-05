<?php
namespace xytool\PaySdk\LeShuaPay\Notify;
use xytool\PaySdk\LeShuaPay\Notify\Pay;
class PayNotify extends Pay
{
    /**
     * 后续执行操作
     * @return void
     */
    protected function __exec()
    {
        // 支付成功处理，一般做订单处理，$this->data 是从微信发送来的数据
      //  file_put_contents(__DIR__ . '/notify_result.txt', date('Y-m-d H:i:s') . ':' . var_export($this->data, true));
        // 告诉微信我处理过了，不要再通过了
    }
}