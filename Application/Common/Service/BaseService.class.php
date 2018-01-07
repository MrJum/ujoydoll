<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/7
 * Time: 22:23
 */

namespace Common\Service;

class BaseService
{
    public function enNameToPageCode($ename){
        $ename = trim($ename);
        return strtolower(preg_replace('/[^0-9a-zA-Z_]+/', '-', $ename));
    }

}