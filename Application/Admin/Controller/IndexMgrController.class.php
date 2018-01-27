<?php

namespace Admin\Controller;

// 本类由系统自动生成，仅供测试用途
class IndexMgrController extends BaseController {
    
    public function index(){
        $indexDisplays = M("indexdisplay")->where()->select();
        $indexDisplayList = [];
        /** @var  $contentService \Common\Service\ContentService*/
        $contentService = D("Content", "Service");
        foreach($indexDisplays as $indexDisplay){
            $contentEntitys = $contentService->getContentByIndexDisplay($indexDisplay['id']);
            foreach($contentEntitys as &$contentEntity){
                $contentEntity['category'] = M("category")->where(['id' => $contentEntity['category_id']])->find();
                $contentEntity['is_set_main'] = !empty(M('attac_rel')->where(['ismain' => 1, 'rel_id' => $contentEntity['id']])->find());
            }
            $indexDisplayList[$indexDisplay['id']] = ['articles' => $contentEntitys, 'limit_size' => $indexDisplay['limitsize']];
        }
        $this->assign('indexDisplayList', $indexDisplayList);
        $this->display();
	}
    

    public function cancelDisplayIndex(){
        $cid = I("post.cid");
        $iid = I("post.iid");
        $indexDisplayCont = M("indexdisplay_cont_rel")->where(['indexdisplay_id' => $iid, 'cid' => $cid])->find();
        if(empty($indexDisplayCont)){
            $this->jsonReturn(false, '不存在的关系');
        }
        M("indexdisplay_cont_rel")->where(['indexdisplay_id' => $iid, 'cid' => $cid])->delete();
        $this->jsonReturn(true);
    }
   
}