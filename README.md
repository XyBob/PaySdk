#常用的php工具

##支付集成
目前仅仅支持 支付宝下单创建，小弟写的第一个composer包，练手的，感谢支持
（抄袭雨润大声的，用的他的http类，谢谢支持），之后会支付微信，扫呗，乐刷等（原雨润没有的支付功能）支付

使用方法 
composer require xytool/pay-sdk

代码示例
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
