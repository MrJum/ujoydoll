<?php
/**
 * Created by PhpStorm.
 * User: daim01
 * Date: 2017/9/11
 * Time: 17:42
 */

namespace Client\Controller;

use Common\Model\ContentModel;
use PHPHtmlParser\Dom;


class RepairUtilController extends BaseController {

    public function categoryPagecode(){
        /** @var  $categoryService \Common\Service\CategoryService */
        $categoryService = D("Category", "Service");
        $products = $categoryService->getProductsByPname('TPE');
        foreach($products as $product){
            $newPagecode = $categoryService->enNameToPageCode($product['name']);
            M("category")->where(['id' => $product['id']])->save(['pagecode' => $newPagecode]);
        }
    }


}