<?php
/**
 * Description of this file
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/21 3:39 PM
 */

namespace UcSdk\UC\Department;


use UcSdk\HttpRequest\HttpRequest;
use UcSdk\UC\Kernel\BaseClient;
use phpDocumentor\Reflection\Types\Self_;

class Client extends BaseClient
{


    /**
     * 创建部门的接口地址
     *
     * @var string
     */
    const CREATE_URL = '/a/%s/%s/qy/department/create';

    /**
     * 编辑部门的接口地址
     *
     * @var string
     */
    const MODIFY_URL = '/a/%s/%s/qy/department/modify';

    /**
     * 删除部门的接口地址
     *
     * @var string
     */
    const DELETE_URL = '/a/%s/%s/qy/department/del';

    /**
     * 获取部门列表的接口地址
     *
     * @var string
     */
    const LIST_URL = '/a/%s/%s/department/page-list';

    /**
     * 获取部门列表的接口地址 (无鉴权)
     *
     * @var string
     */
    const IGNORE_PERMISSIONS_LIST_URL = '/a/%s/%s/qy/department/ignore-permissions/page-list';

    /**
     * 获取部门详情的接口地址
     *
     * @var string
     */
    const DETAIL_URL = '/a/%s/%s/qy/department/detail';

    /**
     * 获取部门类型列表的接口地址
     *
     * @var string
     */
    const TYPE_LIST_URL = '/a/%s/%s/qy/department/type-list';

    /**
     * 获取部门类型配置列表的接口地址
     *
     * @var string
     */
    const FIELD_CONFIG_LIST_URL = '/department/field-config-list';

    /**
     * 获取部门列表
     *
     * @param array $params => [qyDomain, appIdentifier, ignorePermissions ,data]
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 3:40 PM
     */
    public function list(array $params)
    {
        $path = vsprintf(self::IGNORE_PERMISSIONS_LIST_URL, [$params['qyDomain'], $params['appIdentifier']]);

        if ($params['ignorePermissions']) {
            $path = vsprintf(self::LIST_URL, [$params['qyDomain'], $params['appIdentifier']]);
        }

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }


    /**
     * 获取部门详情
     *
     * @param $params => [qyDomain, appIdentifier ,data['dpId']]
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 5:02 PM
     */
    public function detail(array $params)
    {
        $path = vsprintf(self::DETAIL_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 添加部门
     *
     * @param array $params => [qyDomain, appIdentifier ,data]
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 5:03 PM
     */
    public function create(array $params)
    {
        $path = vsprintf(self::CREATE_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     *
     * 删除部门
     *
     * @param array $params => [qyDomain, appIdentifier ,data]
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 5:13 PM
     */
    public function delete(array $params)
    {
        $path = vsprintf(self::DELETE_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 编辑部门
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 5:13 PM
     */
    public function modify(array $params)
    {
        $path = vsprintf(self::MODIFY_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 获取部门类型配置列表
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/22 5:14 PM
     */
    public function typeList(array $params = [])
    {
        $path = vsprintf(self::TYPE_LIST_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }
}