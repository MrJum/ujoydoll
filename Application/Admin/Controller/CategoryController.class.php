<?php
namespace Admin\Controller;

// 本类由系统自动生成，仅供测试用途
class CategoryController extends BaseController {
    
    public function index(){
        //默认系统配置
//        $users = M("category")->order("createtime desc")->select();
//        $this->assign("users", $users);
        echo "no index page";
	}
    
    public function mgr(){
        $opt = $this->getOptions();
        $this->assign('option', $opt);
        $this->display();
    }

    public function getList(){
        $returnData = [];
        $parentCategorys = M("category")->where("pid=0")->select();
        foreach($parentCategorys as $parentCategory){
            $childNodes = M("category")->where("pid=".$parentCategory['id'])->select();

            $pNode = [
                'nodes' => [],
            ];

            $isAllChildNodeDisabled = true;

            foreach($childNodes as $childNode){
                $editStr = '<a href="javascript:void(0)" onclick="doEdit(\''.$childNode['id'].'\')">编辑</a>';
                $enabledStr = '<a href="javascript:void(0)" style="color:#22bb22;" onclick="doDisabled(\''.$childNode['id'].'\')">禁用</a>';
                if($childNode['status'] == 0){
                    $enabledStr = '<a href="javascript:void(0)"  style="color:#bb2222;"  onclick="doEnabled(\''.$childNode['id'].'\')">启用</a>';
                }else{
                    $isAllChildNodeDisabled = false;
                }
                $pNode['nodes'] []= [
                    'text' => '<span id="cate-'.$childNode['id'].'-text">'.$childNode['name'].$this->getCategoryImageHtml($childNode['id']).'</span>'.
                        '<input id="cate-'.$childNode['id'].'-edit" size="32"  type="text" name="cate-'.$childNode['id'].'-edit" value="'.$childNode['name'].'" style="display:none" />'.
                        '<div class="category-del-li-div">'.$editStr.'<a onclick="doDel(\''.$childNode['id'].'\', \''.$childNode['name'].'\')">删除</a>'.$enabledStr.'</div>',
                ];
            }

            $enabledStr = "";
            $delStr = "";
            $editStr = '<a href="javascript:void(0)" onclick="doEdit(\''.$parentCategory['id'].'\')">编辑</a>';
            if(empty($pNode['nodes']) || $isAllChildNodeDisabled){
                $enabledStr = '<a href="javascript:void(0)" style="color:#22bb22;" onclick="doDisabled(\''.$parentCategory['id'].'\')">禁用</a>';
                if($parentCategory['status'] == 0){
                    $enabledStr = '<a href="javascript:void(0)" style="color:#bb2222;"  onclick="doEnabled(\''.$parentCategory['id'].'\')">启用</a>';
                }

                $delStr = '<a href="javascript:void(0)" onclick="doDel(\''.$parentCategory['id'].'\', \''.$parentCategory['name'].'\')">删除</a>';
            }

            $pNode['text'] = '<span id="cate-'.$parentCategory['id'].'-text">'.$parentCategory['name'].$this->getCategoryImageHtml($parentCategory['id']).'</span>'.
                '<input id="cate-'.$parentCategory['id'].'-edit" type="text" name="cate-'.$parentCategory['id'].'-edit" value="'.$parentCategory['name'].
                '" style="display:none" />'.'<div class="category-del-li-div">'.$editStr.$delStr.$enabledStr.'</div>';

            $returnData []= $pNode;
        }
        $this->jsonReturn ($returnData);
    }

    private function getCategoryImageHtml($cateId){
        $attRel = M('attac_rel')->where(['rel_id' => $cateId, 'type' => 2])->find();
        if(empty($attRel)){
            return '';
        }

        $attac = M('attac')->where(['id' => $attRel['att_id']])->find();
        if(empty($attac)){
            return '';
        }

        return '<a class="cate-img-link" target="_blank" href="'.$attac['path'].'" style="opacity: 1;">
            <img src="/Public/admin/images/imgprew.png"/>
        </a>';

    }

    public function getCategorys(){
        $pid = I("get.pid");
        $categorys = M("category")->where("pid=".$pid."")->field("id, name")->select();
        $this->jsonReturn ($categorys);
    }

    public function getCategory(){
        $cid = I("get.cid");
        $category = M("category")->where("id=".$cid."")->field("id, name, pid")->find();
        if($category && !empty($category['pid'])){
            $category['pcategory'] = M("category")->where("id=".$category['pid']."")->field("id, name")->find();
        }else{
            $category['pcategory'] = null;
        }
        $categorys = M("category")->where("pid=0")->field("id, name")->select();
        $this->jsonReturn (['curcategory' => $category, 'pcategorys' => $categorys]);
    }
    
    public function savecategory(){
        $categoryName = I('post.category_name');
        if(empty($categoryName)){
            $this->jsonReturn (false, '分类名称不能为空');
        }
        $parentCategoryVal = intval(I('post.parent_category'));
        if($parentCategoryVal < 0){
            $this->jsonReturn (false, "不正确的父级分类");
        }
        
        if($parentCategoryVal != 0){
            $parentCategory = M("category")->where(['id' => $parentCategoryVal])->select();
            if(empty($parentCategory)){
                $this->jsonReturn (false, "无效的父级分类");
            }
        }
        if(preg_match('/[\x{4e00}-\x{9fa5}]/u', $categoryName)>0){
            $pageCode = D('Pinyin', 'Helper')->toPinyin($categoryName);
        }else{
            $pageCode = D('Category', 'Service')->enNameToPageCode($categoryName);
        }

        if(empty($pageCode)){
            $pageCode = $categoryName;
        }
        $categoryModel = M("category"); // 实例化User对象
        $curCategoryId = I('post.cur_category_id');
        $isAdd = false;
        if(empty($curCategoryId)){
            $isAdd = true;
        }else{
            $curCategory = $categoryModel->where(['id' => $curCategoryId])->find();
            if(empty($curCategory)){
                $isAdd = true;
            }
        }

        $categoryModel->startTrans();
        try{
            if($isAdd){
                $curCategoryId = $categoryModel->data([
                    'pid' => $parentCategoryVal,
                    'name' => $categoryName,
                    'pagecode' => $pageCode,
                    'status' => 1,
                    'createtime' => date("Y-m-d H:i:s"),
                    'modifytime' => date("Y-m-d H:i:s"),
                ])->add();
            }else{
                $ret = $categoryModel->where(['id' => $curCategoryId])->save([
                    'name' => $categoryName,
                    'pagecode' => $pageCode,
                    'modifytime' => date("Y-m-d H:i:s"),
                ]);
            }

            $this->addRelAttac(I('post.up_img_id'), $curCategoryId);
            $categoryModel->commit();
        }catch (\Exception $e){
            $categoryModel->rollback();
        }

        if($curCategoryId){
            $this->jsonReturn ($curCategoryId);
        }else{
            $this->jsonReturn (false, '保持失败');
        }

    }

    public function dodel(){
        $cid = I('post.cid');
        $categoryModel = M("category")->where(['id' => $cid])->select();
        if(empty($categoryModel)){
            $this->jsonReturn (false, "无法删除不存在的分类");
        }

        $childCategoryModels = M("category")->where(['pid' => $cid])->select();
        if(!empty($childCategoryModels)){
            $this->jsonReturn (false, "无法删除存在子分类的分类");
        }
        $ret = M("category")->where('id='.$cid)->delete();
        if($ret){
            $this->jsonReturn ($ret);
        }else{
            $this->jsonReturn (false, '删除失败');
        }
    }
    
    public function dodisable(){
        $cid = I('post.cid');
        $status = intval(I('post.status'));
        $categoryModel = M("category");
        $category = $categoryModel->where(['id' => $cid])->select();
        if(empty($category)){
            $this->jsonReturn (false, "无法禁用/启用不存在的分类");
        }

        $childCategorys = $categoryModel->where(['pid' => $cid, 'status' => 1])->select();
        if(!empty($childCategorys) && $status === 0){
            $this->jsonReturn (false, "无法禁用存在子分类的分类");
        }
        $ret = false;
        $categoryModel->startTrans();
        try{

            $data['status'] = $status;
            $data['modifytime'] = date('Y-m-d H:i:s');
            $ret = $categoryModel->where(['id' => $cid])->save($data);

            if($status === 1){
                $disableDchildCategorys = $categoryModel->where(['pid' => $cid, 'status' => 0, 'modifytime' => date('Y-m-d H:i:s')])->select();
                foreach($disableDchildCategorys as $disableDchildCategory){
                    if(!$categoryModel->where(['id' => $disableDchildCategory['id']])->save($data)){
                        throw new Exception("禁用失败");
                    }
                }

            }
            $categoryModel->commit();
        }catch (Exception $e){
            $categoryModel->rollback();
            $this->jsonReturn (false, $e->getMessage());
        }

        if($ret){
            $this->jsonReturn ($ret);
        }else{
            $categoryModel->rollback();
            $this->jsonReturn (false, '禁用失败');
        }
    }

    public function updatename(){
        $cid = I('post.cid');
        $name = I('post.name');
        if(empty($name)){
            $this->jsonReturn (false, "分类名称不能为空");
        }
        $categoryModel = M("category");
        $category = $categoryModel->where(['id' => $cid])->select();
        if(empty($category)){
            $this->jsonReturn (false, "无法修改不存在的分类");
        }
        $existNameCategory = $categoryModel->where(['pid' => $category['pid'], 'name' => $name])->select();
        if(!empty($existNameCategory)){
            $this->jsonReturn (false, "已存在该名称的分类");
        }

        if(preg_match('/[\x{4e00}-\x{9fa5}]/u', $name)>0){
            $pageCode = D('Pinyin', 'Helper')->toPinyin($name);
        }else{
            $pageCode = D('Category', 'Service')->enNameToPageCode($name);
        }

        $data['name'] = $name;
        $data['pagecode'] = $pageCode;
        $data['modifytime'] = date('Y-m-d H:i:s');
        $ret = $categoryModel->where(['id' => $cid])->save($data);

        if($ret){
            $this->jsonReturn ($ret);
        }else{
            $categoryModel->rollback();
            $this->jsonReturn (false, '修改名称失败');
        }

    }

    private function addRelAttac($attId, $categoryId)
    {
        if(!$categoryId || !$attId){
            return;
        }

        $attacRelM = M("attac_rel");
        $attacRelM->where(['type'=> 2, 'rel_id' => $categoryId])->delete();
        $data = array();
        $data['att_id'] = $attId;
        $data['rel_id'] = $categoryId;
        $data['type'] = 2;
        $attacRelM->add($data, array(), True);
    }

}