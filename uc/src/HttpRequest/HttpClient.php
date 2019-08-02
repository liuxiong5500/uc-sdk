<?php
/**
 * Description of this file（修改完成）
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/6 1:59 PM
 */

namespace UcSdk\HttpRequest;


use GuzzleHttp\Client;

class HttpClient
{
    private static $client = null;

    private function __construct()
    {
        throw new \Exception("denied new this class");
    }

    private function __clone()
    {
        throw new \Exception("denied clone this class");
    }

    public static function getClient($config = [])
    {
        /*if (is_null(self::$client)) {
            self::$client = new Client($config);
        }

        return self::$client;*/
        return new Client($config);
    }
}