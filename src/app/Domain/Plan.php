<?php
namespace App\Domain;

class Plan
{
    /**
     * 添加计划
     */
    public function addPlan($data)
    {
        $model = new \App\Model\Plan();
        $data = \App\obj_array($data);
        $rs = $model->addPlan($data);
        return $rs;
    }

    /**
     * 删除计划
     */
    public function delPlan($pid)
    {
        $model = new \App\Model\Plan();
        $rs = $model->delPlan($pid);
        return $rs;
    }
}