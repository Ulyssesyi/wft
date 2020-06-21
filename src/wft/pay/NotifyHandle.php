<?php
namespace wft\pay;

use wft\Tools;

class NotifyHandle
{
    public static function init($xml, $signKey): Response {
        $data = Tools::xmlToArray($xml);
        $sign = $data['sign'];
        unset($data['sign']);
        if ($sign === Tools::encryptData($data, $signKey, $data['sign_type'])) {
            if ((int)$data['status'] === 0 && (int)$data['result_code'] === 0) {
                return new Response((int)$data['pay_result'] === 0, $data['err_msg'], $data);
            } else {
                return new Response(false, isset($data['err_msg']) ? $data['err_msg'] : $data['message']);
            }
        } else {
            new Response(false, '验签失败', $data);
        }
    }
}
