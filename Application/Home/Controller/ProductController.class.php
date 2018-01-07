<?php
namespace Home\Controller;

class ProductController extends BaseController {
	
    public function index($code=''){
        $curCategory = M("category")->where(['pagecode' => $code])->find();
        $imgs = $this->getRelImgs($curCategory['id'], 2);
        if(empty($imgs)){
            $curCategory['img'] = null;
        }else{
            $curCategory['img'] = $imgs[0];
        }
        $this->assign('cur_product', $curCategory);
    	$this->display();
    }
    
}