<?php
namespace App\Domain;

class UserInfo
{
    /**
    * 登录
    */
    public function login($code)
    {
        $model = new \App\Model\UserInfo();
        //配置appid
        $appid = "wxaff772e9c8523c6e";
        //配置appscret
        $secret = "9c71310e555f19ae3eedb00f7858c72b";
        //api接口
        $api = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
        $openid = \App\httpGet($api);
        // $openid = 'asdfa';
        $rs = $model->login($openid);
        return $rs;
    }
}