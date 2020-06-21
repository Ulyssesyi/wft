<?php


namespace wft;


class Tools
{
    public static function arrayToXml($arr) {
        $xml = '<xml>';
        foreach ($arr as $key => $item) {
            if (is_numeric($item)){
                $xml.="<".$key.">".$item."</".$key.">";
            }elseif (is_array($item) || is_object($item)){
                $xml.= static::arrayToXml($item);
            }else{
                $xml.="<".$key."><![CDATA[".$item."]]></".$key.">";
            }
        }
        $xml .= '</xml>';
        return $xml;
    }

    /**
     * 将XML转为array
     * @param $xml
     * @return mixed
     */
    public static function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
    }

    public static function encryptData($data, $signKey, $signType)
    {
        ksort($data);
        $str = http_build_query($data);
        if ($signType === 'MD5') {
            return strtoupper(md5($str."&key=$signKey"));
        } else {
            return '';
        }
    }
}
