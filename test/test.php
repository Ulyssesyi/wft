<?php

use wft\pay\UnionPay;

require_once '../vendor/autoload.php';

$model = new UnionPay();
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
echo $res;
