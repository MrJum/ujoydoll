<?php
namespace Home\Controller;

class ProductController extends BaseController {

    const PAGE_SIZE = 2;

    public function index($code='', $pageno=1){
        $curCategory = M("category")->where(['pagecode' => $code])->find();
        $imgs = $this->getRelImgs($curCategory['id'], 2);
        if(empty($imgs)){
            $curCategory['img'] = null;
        }else{
            $curCategory['img'] = $imgs[0];
        }

        $products = D("content")->where(['category_id' => $curCategory['id'], 'status' => 1])->order("topnum desc, `order`,`createtime` desc")->select();
        $this->assign('products', $this->makeArticlesCanDisplay($products, $curCategory));
        $this->assign('cur_category', $curCategory);
    	$this->display();
    }
    
}