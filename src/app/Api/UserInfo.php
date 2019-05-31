<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户模块接口服务
 */
class UserInfo extends Api
{
    public function getRules() {
        return array(
            'login' => array(
                'code' => array('name' => 'code', 'require' => true),
            ),
        );
    }

    /**
     * 登录
     */
    public function login()
    {
        $domain = new \App\Domain\UserInfo();
        $rs = $domain->login($this->code);
        return $rs;
    }
} 
