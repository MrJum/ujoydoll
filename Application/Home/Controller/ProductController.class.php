<?php
namespace Home\Controller;

class ProductController extends BaseController {

    const PAGE_SIZE = 3;

    public function index($code='', $pageno=1){
        if(empty($pageno)){
            $pageno = 1;
        }
        $curCategory = M("category")->where(['pagecode' => $code])->find();
        $imgs = $this->getRelImgs($curCategory['id'], 2);
        if(empty($imgs)){
            $curCategory['img'] = null;
        }else{
            $curCategory['img'] = $imgs[0];
        }

        $startIdx = self::PAGE_SIZE * ($pageno - 1);
        $total = D("content")->where(['category_id' => $curCategory['id'], 'status' => 1])->count();
        $products = D("content")->where(['category_id' => $curCategory['id'], 'status' => 1])->order("topnum desc, `order`,`createtime` desc")->limit($startIdx, self::PAGE_SIZE)->select();
        $pageCount = floor(($total - 1) / self::PAGE_SIZE) + 1;
        $this->assign('products', $this->makeArticlesCanDisplay($products, $curCategory));
        $this->assign('cur_category', $curCategory);
        $this->assign('total_count', $total);
        $this->assign('page_count', $pageCount);
        $this->assign('page_no', $pageno);
    	$this->display();
    }

    public function search($pageno=1){
        if(empty($pageno)){
            $pageno = 1;
        }
        $keyword = trim(remove_xss(I('keyword')));
        if(!empty($keyword)){
            $map['title|intro|content'] = array('like', '%'.$keyword.'%');
        }
        $map['status'] = 1;
        $TPECategory = M("category")->where(['pagecode' => 'TPE'])->find();
        $startIdx = self::PAGE_SIZE * ($pageno - 1);
        $subWhere = "category_id in (select id from yyg_category where pid='".$TPECategory['id']."')";
        $total = D("content")->where($subWhere)->where($map)->count();
        $products = D("content")->where($subWhere)->where($map)->order("topnum desc, `order`,`createtime` desc")->limit($startIdx, self::PAGE_SIZE)->select();
        $retProducts = [];
        foreach($products as $product){
            $category = M("category")->where(['id' => $product['category_id']])->find();
            $retProducts []= $this->makeArticleCanDisplay($product, $category);
        }
        $pageCount = floor(($total - 1) / self::PAGE_SIZE) + 1;

        $this->assign('products', $retProducts);
        $this->assign('total_count', $total);
        $this->assign('page_count', $pageCount);
        $this->assign('page_no', $pageno);
        $this->assign('keyword', $keyword);
        $this->display("Product:search");
    }

    public function detail($ccode='', $pcode=''){
        $category = M("category")->where(['pagecode' => $ccode])->find();
        $product = M("content")->where(['pagecode' => $pcode, 'category_id' => $category['id']])->find();
        $product['content'] = htmlspecialchars_decode($product['content']);
        $product['intro'] = htmlspecialchars_decode($product['intro']);
        $this->assign('product', $this->makeArticleCanDisplay($product, $category));
        $this->assign('cur_category', $category);
        $this->assign('attacs', $this->getProductAttacs($product['id']));
        $this->display();
    }

    private function getProductAttacs($cid){
        if(empty($cid)) return 0;
        $arels = M("attac_rel")->where("`rel_id`='$cid' and `type`= 1 and isproduct=1")->select();

        $dataJsons = array();
        $attacM = M("attac");
        $opt = $this->getOptions();

        foreach($arels as $ar){
            $att_id = $ar['att_id'];
            $attac = $attacM->find($att_id);
            if(empty($attac)) {
                M("attac_rel")->where("`rel_id`='$cid' and `att_id`='$att_id' and `type`=1")->delete();
                continue;
            }
            $dataJson = array();
            $dataJson['id'] = $attac['id'];
            $fpath = __ROOT__.$attac['path'];
            $dataJson['path'] = $fpath;
            $fdir = substr($fpath, 0, strrpos($fpath, '/'));
            $fname = substr($fpath, strrpos($fpath, '/') + 1);
            foreach(explode(',', $opt->thumbMaxWidth) as $pwidth){
                $dataJson['thumb'] []= $fdir.'/thumbs/'.'thumb_'.$pwidth.'_'.$fname;
            }
            array_push($dataJsons, $dataJson);
        }
        return $dataJsons;
    }
    
}