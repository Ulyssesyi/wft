<?php


namespace wft\pay;


use wft\Tools;

class BasicModel
{
    protected $requestData = [
        'nonce_str'=>''
    ];
    public $signKey = '';

    public function __construct()
    {
        $this->requestData['nonce_str'] = md5(time());
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

    public function checkSign($response) {
        $sign = $response['sign'];
        unset($response['sign']);
        return $sign === Tools::encryptData($response, $this->signKey, $this->requestData['sign_type']);
    }

    public function request(): Response
    {
        $data = array_filter($this->requestData);
        $data['sign'] = Tools::encryptData($data, $this->signKey, $this->requestData['sign_type']);
        $response = HttpClient::exec($data);
        if ($response) {
            if ((int)$response['status'] === 0) {
                if ($this->checkSign($response)) {
                    if ((int)$response['result_code'] === 0) {
                        return new Response(true, $response['err_msg'], $response);
                    } else {
                        return new Response(false, $response['err_msg']);
                    }
                } else {
                    return new Response(false, '验签失败', $response);
                }
            } else {
                return new Response(false, isset($response['err_msg']) ? $response['err_msg'] : $response['message']);
            }
        } else {
            return new Response(false, '请求发生异常');
        }
    }
}
