<?php
namespace wft\pay;

class QueryOrder extends BasicModel
{
    protected $requestData = [
        'service' => 'unified.trade.query', //接口类型
        'version'=>'2.0',//版本号
        'charset'=>'UTF-8',//字符集
        'sign_type'=>'MD5',//签名方式，取值：MD5、RSA_1_256、RSA_1_1，默认：MD5
        'sign_agentno'=>'',//渠道编号，由平台分配。传入了此参数时，数据的签名使用的将是服务商的signKey
        'mch_id'=>'',//门店编号，由平台分配
        'out_trade_no'=>'',//商户系统内部的订单号, out_trade_no和transaction_id至少一个必填，同时存在时transaction_id优先
        'transaction_id'=>'',//可传入平台订单号或第三方商户单号（third_order_no）, out_trade_no和transaction_id至少一个必填，同时存在时transaction_id优先
        'nonce_str'=>'',//随机字符串，不长于 32 位
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->requestData['version'] = $version;
        return $this;
    }

    /**
     * @param string $charset
     * @return $this
     */
    public function setCharset($charset)
    {
        $this->requestData['charset'] = $charset;
        return $this;
    }

    /**
     * @param string $sign_type
     * @return $this
     */
    public function setSignType($sign_type)
    {
        $this->requestData['sign_type'] = $sign_type;
        return $this;
    }

    /**
     * @param string $sign_agentno
     * @return $this
     */
    public function setSignAgentno($sign_agentno)
    {
        $this->requestData['sign_agentno'] = $sign_agentno;
        return $this;
    }

    /**
     * @param string $mch_id
     * @return $this
     */
    public function setMchId($mch_id)
    {
        $this->requestData['mch_id'] = $mch_id;
        return $this;
    }

    /**
     * @param string $transaction_id
     * @return $this
     */
    public function setTransactionId($transaction_id)
    {
        $this->requestData['transaction_id'] = $transaction_id;
        return $this;
    }

    /**
     * @param string $out_trade_no
     * @return $this
     */
    public function setOutTradeNo($out_trade_no)
    {
        $this->requestData['out_trade_no'] = $out_trade_no;
        return $this;
    }
}
