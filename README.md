# 常用的php工具

## 支付集成
目前仅仅支持 支付宝下单创建，小弟写的第一个composer包，练手的，感谢支持
（抄袭雨润大神的，用的他的http类，谢谢支持），之后会支付微信，扫呗，乐刷等（原雨润没有的支付功能）支付

### 支付宝
* 支付宝统一下单

### 微信
* 企业付款到零钱

### 乐刷
* 乐刷下单
[文档地址](https://www.yuque.com/leshuazf/doc/zhifujiaoyi#n8Uml)

使用方法 
```json
composer require xytool/pay-sdk
```

代码示例
* 支付宝统一下单
```php
<?php
require_once './vendor/autoload.php';

use \xytool\PaySdk\Alipay\sdk;
use \xytool\PaySdk\Alipay\Params\PublicParams;

$params                     = new PublicParams();
$params->appPrivateKey      = 'xxxx';
$params->appPublicKey = 'xxxx';
$params->appID = '2019092767852638';
$params->sign_type = 'RSA2';
$sdk                        = new sdk($params);

$request = new \xytool\PaySdk\Alipay\MiniApp\pay\Params\Request();
$request->notify_url = 'www.baidu.com'; // 支付后通知地址（作为支付成功回调，这个可靠）
$request->businessParams->out_trade_no = 'test' . mt_rand(10000000,99999999); // 商户订单号
$request->businessParams->total_amount = 9000000; // 价格
$request->businessParams->subject = '小米手机9黑色陶瓷尊享版'; // 商品标题

$result = $sdk->execute($request);
var_dump($result);
```
* 微信企业支付打款到零钱

```php
<?php
$params                     = new PublicParams();
$params->appID = 'xxx';
$params->mch_id = 'xxx';
$params->key = 'xxx';

$params->certPath = './apiclient_cert.pem';
$params->keyPath = './apiclient_key.pem';

$sdk                        = new sdk($params);
$request = new \xytool\PaySdk\Weixin\CompanyPay\Weixin\Pay\Request();
$request->partner_trade_no = 'test' . mt_rand(10000000,99999999); // 订单号
$request->openid = 'xxx-QA';
$request->check_name = 'NO_CHECK';
$request->amount = 1;
$request->desc = '测试';
$request->spbill_create_ip = '127.0.0.1';
$result = $sdk->execute($request);
var_dump($result);
```
--  乐刷涉及版权暂不开放


