<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户模块接口服务
 */
class Plan extends Api
{
    public function getRules() {
        return array(
            'addPlan' => array(
                'uid' => array('name' => 'uid', 'require' => true),
                'content' => array('name' => 'content', 'require' => true),
                'starttime' => array('name' => 'starttime', 'require' => true),
                'stoptime' => array('name' => 'stoptime', 'require' => true),
                'status' => array('name' => 'status', 'require' => true),
            ),
            'delPlan' => array(
                'pid' => array('name' => 'pid', 'require' => true),
            ),
        );
    }

    /**
     * 添加计划
     */
    public function addPlan()
    {
        $domain = new \App\Domain\Plan();
        $rs = $domain->addPlan($this);
        return $rs;
    }

    /**
     * 删除计划 delstatus
     */
    public function delPlan()
    {
        $domain = new \App\Domain\Plan();
        $rs = $domain->delPlan($this->pid);
        return $rs;
    }
} 
