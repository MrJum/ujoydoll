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


    public function addEmail(){
        $email = remove_xss(I('post.Email'));
        $emailEntity = M("email")->where(['email' => $email])->find();
        if(empty($emailEntity)){
            M("email")->data(['email' => $email, 'createtime' => date("Y-m-d H:i:s"), 'modifytime' => date("Y-m-d H:i:s")])->add();
        }

        echo json_encode(['status' => 1, 'msg' => '']);
        die();
    }
}