<?php

namespace UcSdk\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{

    protected $httpCode   = 200;
    protected $statusCode = 0;
    protected $headers    = [];

    public function success($data = [], $status = 'success')
    {
        return $this->send($status, $this->statusCode, compact('data'));
    }

    public function send($status, $statusCode, array $data)
    {
        $return = [
            'status'     => $status,
            'httpCode'   => $this->getHttpCode(),
            'statusCode' => $statusCode,
        ];
        $sendData = array_merge($return, $data);

        return $this->respond($sendData);

    }

    public function respond($data)
    {
        return \response()->json($data, $this->getHttpCode(), $this->getHeaders());
    }

    public function setStatusCode($code = 0)
    {
        $this->statusCode = $code;

        return $this;
    }

    public function setHeaders($headers = [])
    {
        $this->headers = $headers;

        return $this;
    }

    public function setHttpCode($code = Response::HTTP_OK)
    {
        $this->httpCode = $code;

        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function getHeaders()
    {
        return $this->headers;
    }


    public function failed($message = "error", $statusCode = -1, $status = 'error')
    {
        return $this->send($status, $statusCode, compact('message'));
    }

    public function notFound($message = 'Not Found')
    {
        return $this->failed($message, Response::HTTP_NOT_FOUND);
    }
}
