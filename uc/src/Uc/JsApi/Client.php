<?php
/**
 * Description of this file
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/21 3:39 PM
 */

namespace UcSdk\UC\JsApi;


use UcSdk\UC\Kernel\BaseClient;

class Client extends BaseClient
{


    /**
     * 获取签名接口地址
     *
     * @var string
     */
    const AGENT_CONFIG_URL = '/a/%s/%s/qy/js-api-signature/agent/get';

    /**
     * 获取签名接口地址
     *
     * @var string
     */
    const CONFIG_URL = '/a/%s/%s/qy/jssignature';

    /**
     * 获取JS签名，用于调起选人组件、个人页面等
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 3:50 PM
     */
    public function agentConfig(array $params = [])
    {
        $path = vsprintf(self::AGENT_CONFIG_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 获取JS签名，用于分享、转发等
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 3:51 PM
     */
    public function config(array $params = [])
    {
        $path = vsprintf(self::CONFIG_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);

    }
}