<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class UserInfo extends NotORM
{
    /**
     * 登录
    */
    public function login($openid)
    {
        $orm = $this->getORM();
        // 先查询，没有再插入
        $rs = $orm->select('uid','credit','grade','signature')->where('openid', $openid)->fetchOne();
        // return $rs;
        if($rs != NULL)
        {
            // $sql = "select ui.uid,ui.credit,ui.grade,ui.signature,p.pid,p.content,p.starttime,p.stoptime,p.status,p.delstatus from userinfo ui join plan p on ui.uid=p.uid where ui.openid=:openid and delstatus='0'";
            $sql = "select pid,content,starttime,stoptime,status from plan where uid=:uid and delstatus='0'";
            $params = array(':uid' => $rs['uid']);
            $plandata = $orm->queryAll($sql, $params);
            // return $rs;
            
            $userinfo = $rs;

            $data = array('userinfo' => $userinfo, 'plandata' => $plandata);
            return array('code' => '1', "data" => $data);
        }
        else
        {
            $rs = $orm->insert(array('openid' => $openid));
            $id = $orm->insert_id();
            if($rs != NULL)
            {
                return array('code' => '1', "data" => array('uid'=>$id));
            }else{
                return array('code' => '0');
            }
        }
    }
}