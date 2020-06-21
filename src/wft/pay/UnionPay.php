<?php
namespace wft\pay;

class UnionPay extends BasicModel
{
    protected $requestData = [
        'service' => 'pay.weixin.jspay', //接口类型
        'version'=>'2.0',//版本号
        'charset'=>'UTF-8',//字符集
        'sign_type'=>'MD5',//签名方式，取值：MD5、RSA_1_256、RSA_1_1，默认：MD5
        'sign_agentno'=>'',//渠道编号，由平台分配。传入了此参数时，数据的签名使用的将是服务商的signKey
        'mch_id'=>'',//门店编号，由平台分配
        'is_raw'=>'1',//是否原生JS
        'is_minipg'=>'',//是否小程序支付，值为1，表示小程序支付；不传或值不为1，表示公众账号内支付
        'out_trade_no'=>'',//商户系统内部的订单号 ,32个字符内、 可包含字母,确保在商户系统唯一
        'device_info'=>'',//终端设备号
        'op_user_id'=>'',//操作员帐号,默认为门店编号
        'body'=>'',//商品描述
        'profit_share_infos'=>'',//分账信息, 必须按照规范上传，JSON格式，详见【分账字段说明】
        'sub_openid'=>'',//用户openid, 微信用户关注商家公众号的openid（注：使用测试号时此参数置空，即不要传这个参数，使用正式商户号时才传入）
        'sub_appid'=>'',//公众账号或小程序ID，当发起公众号支付时，值是微信公众平台基本配置中的AppID(应用ID)；当发起小程序支付时，值是对应小程序的AppID
        'attach'=>'', //商户附加信息，可做扩展参数
        'total_fee'=>0, //总金额，以分为单位，不允许包含任何字、符号
        'need_receipt'=>'', //需要和微信公众平台的发票功能联合，传入true时，微信支付成功消息和支付详情页将出现开票入口[新增need_receipt【适用于微信】]
        'mch_create_ip'=>'',//上传商户真实的发起交易的终端出网IP
        'notify_url'=>'http://127.0.0.1', //接收平台通知的URL，需给绝对路径，255字符内格式如:http://wap.tenpay.com/tenpay.asp，确保平台能通过互联网访问该地址，如不需要接收通知，请传：http://127.0.0.1
        'callback_url'=>'',//前端页面跳转的URL（包括支付成功和关闭时都会跳到这个地址,商户需自行处理逻辑），需给绝对路径，255字符内格式如:http://wap.tenpay.com/callback.asp注:该地址只作为前端页面的一个跳转，须使用notify_url通知结果作为支付最终结果。
        'time_start'=>'',//订单生成时间，格式为yyyyMMddHHmmss，如2009年12月25日9点10分10秒表示为20091225091010。时区为GMT+8 beijing。该时间取自商户服务器。注：订单生成时间与超时时间需要同时传入才会生效。
        'time_expire'=>'',//订单失效时间，格式为yyyyMMddHHmmss，如2009年12月27日9点10分10秒表示为20091227091010。时区为GMT+8 beijing。该时间取自商户服务器。注：订单生成时间与超时时间需要同时传入才会生效。
        'goods_tag'=>'',//商品标记，微信平台配置的商品标记，用于优惠券或者满减使用
        'nonce_str'=>'',//随机字符串，不长于 32 位
        'limit_credit_pay'=>'',//限定用户使用时能否使用信用卡，值为1，禁用信用卡；值为0或者不传此参数则不禁用
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
     * @param string $is_minipg
     * @return $this
     */
    public function setIsMinipg($is_minipg)
    {
        $this->requestData['is_minipg'] = $is_minipg;
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

    /**
     * @param string $device_info
     * @return $this
     */
    public function setDeviceInfo($device_info)
    {
        $this->requestData['device_info'] = $device_info;
        return $this;
    }

    /**
     * @param string $op_user_id
     * @return $this
     */
    public function setOpUserId($op_user_id)
    {
        $this->requestData['op_user_id'] = $op_user_id;
        return $this;
    }

    /**
     * @param string $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->requestData['body'] = $body;
        return $this;
    }

    /**
     * @param string $profit_share_infos
     * @return $this
     */
    public function setProfitShareInfos($profit_share_infos)
    {
        $this->requestData['profit_share_infos'] = $profit_share_infos;
        return $this;
    }

    /**
     * @param string $sub_openid
     * @return $this
     */
    public function setSubOpenid($sub_openid)
    {
        $this->requestData['sub_openid'] = $sub_openid;
        return $this;
    }

    /**
     * @param string $sub_appid
     * @return $this
     */
    public function setSubAppid($sub_appid)
    {
        $this->requestData['sub_appid'] = $sub_appid;
        return $this;
    }

    /**
     * @param string $attach
     * @return $this
     */
    public function setAttach($attach)
    {
        $this->requestData['attach'] = $attach;
        return $this;
    }

    /**
     * @param int $total_fee
     * @return $this
     */
    public function setTotalFee($total_fee)
    {
        $this->requestData['total_fee'] = $total_fee;
        return $this;
    }

    /**
     * @param string $need_receipt
     * @return $this
     */
    public function setNeedReceipt($need_receipt)
    {
        $this->requestData['need_receipt'] = $need_receipt;
        return $this;
    }

    /**
     * @param string $mch_create_ip
     * @return $this
     */
    public function setMchCreateIp($mch_create_ip)
    {
        $this->requestData['mch_create_ip'] = $mch_create_ip;
        return $this;
    }

    /**
     * @param string $notify_url
     * @return $this
     */
    public function setNotifyUrl($notify_url)
    {
        $this->requestData['notify_url'] = $notify_url;
        return $this;
    }

    /**
     * @param string $callback_url
     * @return $this
     */
    public function setCallbackUrl($callback_url)
    {
        $this->requestData['callback_url'] = $callback_url;
        return $this;
    }

    /**
     * @param string $time_start
     * @return $this
     */
    public function setTimeStart($time_start)
    {
        $this->requestData['time_start'] = $time_start;
        return $this;
    }

    /**
     * @param string $time_expire
     * @return $this
     */
    public function setTimeExpire($time_expire)
    {
        $this->requestData['time_expire'] = $time_expire;
        return $this;
    }

    /**
     * @param string $goods_tag
     * @return $this
     */
    public function setGoodsTag($goods_tag)
    {
        $this->requestData['goods_tag'] = $goods_tag;
        return $this;
    }

    /**
     * @param string $limit_credit_pay
     * @return $this
     */
    public function setLimitCreditPay($limit_credit_pay)
    {
        $this->requestData['limit_credit_pay'] = $limit_credit_pay;
        return $this;
    }

    /**
     * @param string $signKey
     * @return $this
     */
    public function setSignKey(string $signKey)
    {
        $this->signKey = $signKey;
        return $this;
    }
}
