## 威富通支付
### 微信公众号/小程序
```php
require_once 'path/vendor/autoload.php';

// 统一下单
$model = new \wft\pay\UnionPay();
$res = $model->setSignKey('xxx')
    ->setIsMinipg('1')
    ->setOutTradeNo('TEST-'.time())
    ->setBody('测试商品')
    ->setMchId('xxx')
    ->setSubOpenid('xxx')
    ->setSubAppid('xxx')
    ->setAttach('测试订单')
    ->setTotalFee(1)
    ->setMchCreateIp('127.0.0.1')
    ->request();

// 异步通知
$res = \wft\pay\NotifyHandle::init($_POST, '密钥');
if ($res->getResult()) {
    //支付成功
}
return 'success';
```
