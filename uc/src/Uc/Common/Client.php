<?php
/**
 * Description of this file
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/21 3:39 PM
 */

namespace UcSdk\UC\Common;


use UcSdk\HttpRequest\HttpRequest;
use UcSdk\UC\Kernel\BaseClient;
use phpDocumentor\Reflection\Types\Self_;

class Client extends BaseClient
{


    /**
     * 微信授权登录接口 传code值即可
     *
     * @var string
     */
    const AUTH_URL = '/a/%s/%s/qy/commondapi/wxuserlogin';

    /**
     * 小程序登录
     *
     * @var string
     */
    const MINI_PRO_URL = '/a/%s/%s/qy/miniprogram/jscode2session';

    /**
     * 企业微信小程序消息发送
     *
     * @var string
     */
    const SEND_MESSAGE_URL = '/a/%s/crs-mini-program/qy/send_mini';

    /**
     * UC上传接口
     *
     * @var string
     */
    const UPLOAD_FILE_URL = '/b/%s/upload';

    /**
     * 登录授权
     *
     * @param array $params [qyDomain ，appIdentifier , data]
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/21 5:48 PM
     */
     public function workAppLogin($params = [])
     {
         $path = vsprintf(self::AUTH_URL, [$params['qyDomain'], $params['appIdentifier']]);

         return $this->post($path, [
             'json' => $params['data'],
         ]);
     }

    /**
     * 小程序登录
     *
     * @param array $params [qyDomain ，appIdentifier , data]
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 3:32 PM
     */
    public function miniAppLogin($params = [])
    {
        $path = vsprintf(self::MINI_PRO_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 企业微信侧小程序消息发送
     *
     * @param $params => [qyDomain ， data]
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 3:36 PM
     */
    public function miniAppSendMessage($params)
    {
        $path = vsprintf(self::SEND_MESSAGE_URL, [$params['qyDomain']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }
}