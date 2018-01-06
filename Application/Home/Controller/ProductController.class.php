<?php
namespace Home\Controller;

class ProductController extends BaseController {
	
    public function index($code=''){
        $curCategory = M("category")->where(['pagecode' => $code])->find();
        $this->assign('cur_product', $curCategory);
    	$this->display();
    }
    
}