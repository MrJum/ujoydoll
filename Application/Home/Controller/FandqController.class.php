<?php
namespace Home\Controller;

class FandqController extends BaseController {
	
    public function index(){
        $curCategory = M("category")->where(['pagecode' => 'news'])->find();
        $imgs = $this->getRelImgs($curCategory['id'], 2);
        if(empty($imgs)){
            $curCategory['img'] = null;
        }else{
            $curCategory['img'] = $imgs[0];
        }
        $this->assign('cur_category', $curCategory);
        $news = D("content")->where(['category_id' => $curCategory['id'], 'status' => 1])->order("topnum desc, `order`,`createtime` desc")->select();
        $this->assign('news', $this->makeArticlesCanDisplay($news, $curCategory));
        $this->display();
    }


    public function detail($code=''){
        $newDetail = D("content")->where(['pagecode' => $code, 'status' => 1])->find();
        $newDetail['content'] = htmlspecialchars_decode($newDetail['content']);
        $this->assign('new', $newDetail);
        $this->display();
    }

}