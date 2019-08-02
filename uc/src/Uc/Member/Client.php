<?php
/**
 * Description of this file
 *
 * @author  maxiongfei <maxiongfei@vchangyi.com>
 * @date    2019/5/21 3:39 PM
 */

namespace UcSdk\UC\Member;


use UcSdk\UC\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 增加员工接口
     *
     * @var string
     */
    const ADD_URL = '/a/%s/%s/qy/member/add';

    /**
     * 编辑员工接口
     *
     * @var string
     */
    const EDIT_URL = '/a/%s/%s/qy/member/update';

    /**
     * 员工列表接口
     *
     * @var string
     */
    const LIST_URL = '/a/%s/%s/qy/member/list';

    /**
     * 员工详情接口
     *
     * @var string
     */
    const DETAIL_URL = '/a/%s/%s/qy/member/get';

    /**
     * 删除员工
     *
     * @var string
     */
    const DELETE_URL = '/a/%s/%s/qy/member/delete';

    /**
     * 员工二维码
     *
     * @var string
     */
    const QR_CODE_URL = '/a/%s/%s/qy/member/qr-code/get';

    /**
     * 忽略权限查询人员列表
     *
     * @var string
     */
    const IGNORE_PERMISSIONS_LIST = '/a/%s/%s/qy/member/ignore-permissions/list';

    /**
     * 批量更新员工角色
     *
     * @var string
     */
    const UPDATE_ROLE_URL = '/a/%s/%s/qy/member/bat-update';

    /**
     * 根据userid获取用户信息
     *
     * @var string
     */
    const GET_BY_USER_ID = '/a/%s/%s/qy/member/get-by-userid';

    /*
     * 通讯录同步接口
     *
     * @var string
     */
    const MEMBER_SYNC_URL = '/b/%s/qy/member/sync';

    /**
     * 添加员工
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:00 PM
     */
    public function add(array $params = [])
    {
        $path = vsprintf(self::ADD_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 编辑员工
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:01 PM
     */
    public function edit(array $params = [])
    {
        $path = vsprintf(self::EDIT_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 员工列表
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:01 PM
     */
    public function list(array $params = [])
    {
        $path = vsprintf(self::LIST_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 员工详情
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:02 PM
     */
    public function detail(array $params = [])
    {
        $path = vsprintf(self::LIST_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 员工详情
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:02 PM
     */
    public function detailByUserId(array $params = [])
    {
        $path = vsprintf(self::GET_BY_USER_ID, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 删除员工
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:03 PM
     */
    public function delete(array $params = [])
    {
        $path = vsprintf(self::DELETE_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 查询员工二维码
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:03 PM
     */
    public function qrCode(array $params = [])
    {
        $path = vsprintf(self::QR_CODE_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 忽略权限人员列表
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:04 PM
     */
    public function ignorePermissionsList(array $params = [])
    {
        $path = vsprintf(self::IGNORE_PERMISSIONS_LIST, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * 批量更新员工角色
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:04 PM
     */
    public function updateRole(array $params = [])
    {
        $path = vsprintf(self::UPDATE_ROLE_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }

    /**
     * memberSync 同步通讯录
     *
     * @param array $params
     *
     * @return mixed
     * @author  maxiongfei <maxiongfei@vchangyi.com>
     * @date    2019/5/23 4:05 PM
     */
    public function memberSync(array $params = [])
    {
        $path = vsprintf(self::MEMBER_SYNC_URL, [$params['qyDomain'], $params['appIdentifier']]);

        return $this->post($path, [
            'json' => $params['data'],
        ]);
    }
}