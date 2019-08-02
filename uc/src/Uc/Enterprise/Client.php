<?php
/**
 * Description of this file
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/21 3:39 PM
 */

namespace UcSdk\UC\Enterprise;


use UcSdk\HttpRequest\HttpRequest;
use UcSdk\UC\Kernel\BaseClient;
use phpDocumentor\Reflection\Types\Self_;

class Client extends BaseClient
{


    /**
     * 企业详情接口
     *
     * @var string
     */
    const DETAIL_URL = '/b/%s/enterprise/detail';

    /**
     * 根据corpId获取企业详情接口
     *
     * @var string
     */
    const DETAIL_BY_CORP_ID_URL = '/s/enterprise/detail';

    /**
     * 企业列表接口
     *
     * @var string
     */
    const LIST_URL = '/s/enterprise/page-list';

    /**
     * 企业信息详情
     *
     * @var string
     */
    const SYSTEM_DETAIL_URL = '/s/enterprise/detail';

    /**
     * 企业注册
     *
     * @var string
     */
    const ENTERPRISE_REGISTER_URL = '/s/enterprise/register';

    /**
     * 获取企业详情
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 3:45 PM
     */
    public function detail(array $params = [])
    {
        $path = vsprintf(self::DETAIL_URL, [$params['qyDomain']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 根据corp_id获取企业详情
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 3:46 PM
     */
    public function detailByCorpId(array $params = [])
    {
        $path = self::DETAIL_BY_CORP_ID_URL;

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     *
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 3:47 PM
     */
    public function list($params = [])
    {
        $path = self::LIST_URL;

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 根据crop_id 从uc 获取企业信息
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 3:48 PM
     */
    public function systemDetail(array $params = [])
    {
        $path = self::SYSTEM_DETAIL_URL;

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 注册企业
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 3:48 PM
     */
    public function enterpriseRegister(array $params = [])
    {
        $path = self::ENTERPRISE_REGISTER_URL;

        return $this->post($path, [
            'json' => $params['data'],
        ]);

        return $this->post($url, $params);
    }
}