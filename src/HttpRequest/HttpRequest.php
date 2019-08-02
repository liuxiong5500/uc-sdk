<?php
/**
 * Desc:（修改完成）
 * Date: 2019/1/17 Time: 11:08
 */

namespace UcSdk\HttpRequest;

use UcSdk\Traits\ApiResponse;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

Class HttpRequest
{
    use ApiResponse;
    private $header = [
        'Content-Type' => 'application/json',
    ];
    private $config = [];


    public function getHeader()
    {
        return $this->header;
    }

    public function setHeader($header = [])
    {
        $this->header = array_merge($this->header, $header);

        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config = [])
    {
        $this->config = $config;

        return $this;
    }

    public function __call($name, $arguments)
    {
        $id = $this->guid();
        Log::info($id."-httpRequest请求开始", array_merge($this->config, [
            '请求方式'    => $name,
            '请求路径和参数' => $arguments,
        ]));
        // 请求路径
        $path = $arguments[0] ?? '';
        // 请求参数
        $params = $arguments[1] ?? [];
        try {
            if (!in_array(strtolower($name), ['get', 'post', 'put', 'delete'])) {
                throw new \Exception("错误的http请求");
            }
            $response = HttpClient::getClient($this->getConfig())->request($name, $path, $params);
            $body = $response->getBody()->getContents();
        } catch (RequestException $exception) {
            Log::error($id."-httpRequest请求出错", [$exception->getMessage()]);
            throw new \Exception($exception->getMessage(), $exception->getCode());
        } catch (ClientException $exception) {
            Log::error($id."-httpRequest请求出错", [$exception->getMessage()]);
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }
        Log::info($id."-httpRequest请求结束(success)", array_merge($this->config, [
            '请求方式'    => $name,
            '请求路径和参数' => $arguments,
            '响应结果'    => $body,
        ]));
        // 回调函数
        if (isset($arguments[2]) && ($arguments[2] instanceof \Closure)) {
            return $arguments[2]($body);
        }

        return $body;
    }

    private function guid()
    {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
            $charId = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charId, 0, 8).$hyphen.substr($charId, 8, 4).$hyphen.substr($charId, 12,
                    4).$hyphen.substr($charId, 16, 4).$hyphen.substr($charId, 20, 12).chr(125);// "}"
            return $uuid;
        }
    }
}
