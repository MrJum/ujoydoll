<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 20:50
 */

namespace Common\Service;


class ContentService extends BaseService
{
    public function getContentByIndexDisplay($dsid){
        $indexDisplayConts = M("indexdisplay_cont_rel")->where(['indexdisplay_id' => $dsid])->select();
        $contentIds = [];
        foreach($indexDisplayConts as $indexDisplayCont){
            $contentIds []= strval($indexDisplayCont['cid']);
        }
        return D("Content")->field('id, title, category_id, topnum')->where(["status" => 1, "id" => ['in', $contentIds]])->order("topnum desc, `order`,`createtime` desc")->select();
    }

}