<?php
namespace Home\Controller;

class IndexController extends BaseController {
	
    public function index(){
    	$this->display();
    }

    public function aboutus(){
        $aboutusCategoryId = 49;
        $aboutusCategory = M("category")->where(['id' => $aboutusCategoryId])->find();
        $aboutusContent = D("Content")->where(["category_id" => $aboutusCategoryId, 'status' => 1])->find();
        $aboutusContent['content'] = htmlspecialchars_decode($aboutusContent['content']);
        $this->assign('aboutus', $this->makeArticleCanDisplay($aboutusContent, $aboutusCategory));
        $this->display("Aboutus:aboutus");
    }

}