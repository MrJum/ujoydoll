<?php
namespace Home\Controller;

class IndexController extends BaseController {
	
    public function index(){
        $this->assign('tuijianContents', $this->getIndexDisplayArticles(1));
        $this->assign('hotContents', $this->getIndexDisplayArticles(2));
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

    private function getIndexDisplayArticles($indexDisplayId){
        $indexDisplay = M("indexdisplay")->where(['id' => $indexDisplayId])->find();
        $tuijianIndexDisplays = M("indexdisplay_cont_rel")->where(['indexdisplay_id' => $indexDisplayId])->select();
        $tuijianIndexDisplayIds = [];
        foreach($tuijianIndexDisplays as $tuijianIndexDisplay){
            $tuijianIndexDisplayIds []= $tuijianIndexDisplay['cid'];
        }
        $tuijianContents = M("Content")->where(['id' => ['in', $tuijianIndexDisplayIds]])->order("topnum, modifytime desc")->select();
        $tuijianArticles = [];
        foreach($tuijianContents as $tuijianContent){
            $tuijianArticle = $this->makeArticleCanDisplay($tuijianContent, M("category")->where(['id' => $tuijianContent['category_id']])->find());
            $tuijianArticle['intro'] = strip_tags(htmlspecialchars_decode($tuijianArticle['intro']));
            $tuijianArticles []= $tuijianArticle;
        }
        $tuijianArticles = array_slice($tuijianArticles, 0, $indexDisplay['limitsize']);
        return $tuijianArticles;
    }
}