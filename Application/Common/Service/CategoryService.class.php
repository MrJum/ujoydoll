<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 20:50
 */

namespace Common\Service;


class CategoryService  extends BaseService
{
    public function getProductsByPname($pname){
        $pProduct = M("category")->where(["status" => 1, "name" => $pname])->find();
        return M("category")->where(["status" => 1, "pid" => $pProduct['id']])->select();
    }

}