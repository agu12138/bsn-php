<?php

namespace VenYuanBSN;

/***
 * 请求帮助类
 */
class SendHelper
{

    public static function post($url, $data = [], $headers = [], $timeout = 10, $cert = false)
    {
        return self::send($url, $data, $headers, 'POST', $timeout, $cert);
    }

    public static function get($url, $headers = [], $timeout = 10, $cert = false)
    {
        return self::send($url, [], $headers, 'GET', $timeout, $cert);
    }

    public static function put($url, $headers = [], $timeout = 10, $cert = false)
    {
        return self::send($url, '', $headers, 'PUT', $timeout, $cert);
    }

    public static function delete($url, $headers = [], $timeout = 10, $cert = false)
    {
        return self::send($url, '', $headers, 'DELETE', $timeout, $cert);
    }

    /**
     * @param $url
     * @param array $data
     * @param array $headers ['Accept:application/json']
     * @param string $method
     * @param int $timeout
     * @param bool $cert
     * @return bool|string
     */
    private static function send($url, $data = [], $headers = [], $method = 'POST', $timeout = 10, $cert = [])
    {
        echo "请求url:$url \n";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        // if (is_array($data) && !empty($data))
        //     $data = http_build_query($data);
        if (is_string($headers) || is_array($headers))
            curl_setopt($curl, CURLOPT_HTTPHEADER, ($headers));
        if ($cert) {
            //使用证书：cert 与 key 分别属于两个.pem文件
            curl_setopt($curl, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($curl, CURLOPT_SSLCERT, $cert[0]);
            curl_setopt($curl, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($curl, CURLOPT_SSLKEY, $cert[1]);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        switch ($method) {
            case 'POST':
                $data = json_encode($data);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
                );
                // curl_setopt($curl, CURLOPT_HEADER,true);
                curl_setopt($curl, CURLOPT_POST, true);
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                break;
            default:
                break;
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $return_str = curl_exec($curl);
        curl_close($curl);
        return json_decode($return_str);
    }
    static function generateRandomString($length = 24)
    {
        $bytes = [];
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $bytes[] = rand(0, 255);
        }
        foreach ($bytes as $ch) {
            $str .= chr($ch);
        }
        echo base64_encode($str)."\n";
        return base64_encode($str);
    }
}
