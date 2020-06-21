<?php
namespace wft\pay;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use wft\Tools;

class HttpClient
{
    /**
     * @param $data
     * @return mixed
     */
    public static function exec($data) {
        $client = new Client(['base_uri'=>'https://pay.hstypay.com/v2/pay/gateway', 'verify' => false]);
        try {
            $res = $client->request('POST', '', [
                'body' => Tools::arrayToXml($data),
            ]);
        } catch (GuzzleException $e) {
            return false;
        }
        if ($res->getStatusCode() == 200) {
            $response = $res->getBody()->getContents();
            return Tools::xmlToArray($response);
        } else {
            return false;
        }
    }

}
