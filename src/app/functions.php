<?php
namespace App;

function hello() {
    return 'Hey, man~';
}

//对象到数组
function obj_array($data)
{
    $rs = array();
    foreach($data as $key=>$val)
    {
        $rs[$key] = $val;
    }
    return $rs;
}

//返回openid
function httpGet($url, $data=NULL){
    $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	if (!empty($data)){
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
    $jsoninfo = json_decode($output, true);
    $openid = $jsoninfo["openid"];  // 从返回json结果中读出openid
    return $openid;
}