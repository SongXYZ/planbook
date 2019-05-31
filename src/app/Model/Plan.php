<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Plan extends NotORM
{
    /**
     * 添加计划
     */
    public function addPlan($data)
    {
        $orm = $this->getORM();
        $rs = $orm->insert($data);
        // $id = $orm->insert_id();
        if($rs != NULL)
        {
                return array('code' => '1');
        }else{
                return array('code' => '0');
        }
    }

    /**
     * 删除计划
     */
    public function delPlan($pid)
    {
        $orm = $this->getORM();
        $rs = $orm->where('pid', $pid)->update(array('delstatus'=>'1'));
        if($rs === false){
            return array('code' => '0');
        }else{
            return array('code' => '1');
        }
    }
}