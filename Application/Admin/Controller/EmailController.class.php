<?php
namespace Admin\Controller;

// 本类由系统自动生成，仅供测试用途
use Think\Page;

class EmailController extends BaseController {

    public function mgr($o_keyword='', $o_status='', $sort='', $startdate='', $enddate=''){
        $opts = $this->getOptions();
        $pageSize = $opts->pageSize;
        if(empty($o_status)){
            $o_status = I("o_status");
        }
        if(empty($o_keyword)){
            $o_keyword = I("o_keyword");
        }

        if(empty($pageCode)){
            $pageCode = I("code");
        }

        if(empty($sort)){
            $sort = I('sort');
            if(empty($sort)){
                $sort = 'desc';
            }
        }

        $o_type = I('o_type');

        if($startdate === ''){
            $startdate = I("get.startdate");
        }

        if($enddate === ''){
            $enddate = I("get.enddate");
        }


        $map = [];

        if($o_status !== ''){
            $map['status']  = array('eq', $o_status);
        }

        if($startdate !== '' && $enddate === ''){
            $map['createtime']  = ['EGT', $startdate];
        }

        if($startdate === '' && $enddate !== ''){
            $map['createtime']  = ['ELT', $enddate];
        }

        if($startdate !== '' && $enddate !== ''){
            $map['createtime']  = [['EGT', $startdate], ['ELT', $enddate], 'AND'];
        }

        if(!empty($o_keyword)){
            $map['email'] = array('like', '%'.$o_keyword.'%');
        }

        /** @var  $emailM  \Think\Model */
        $emailM = M("email");
        $count      = $emailM->where($map)->count();// 查询满足要求的总记录数
        $page       = new Page($count, $pageSize);// 实例化分页类 传入总记录数和每页显示的记录数

        $urlParams = [
            'code' => urlencode($pageCode),
            'o_keyword' => $o_keyword,
            'o_status' => $o_status,
            'o_type' => $o_type,
            'startdate' => $startdate,
            'enddate' => $enddate
        ];
        $page->parameter = http_build_query($urlParams);

        $show       = $page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $emailM->where($map)->order('`createtime` '.$sort)->limit($page->firstRow.','.$page->listRows)->select();
        $commentList = [];

        foreach($list as $item){
            $commentList []= $item;
        }

        $this->assign('list', $commentList);// 赋值数据集
        $this->assign('sort', $sort);
        $this->assign('o_status', $o_status);
        $this->assign('o_keyword', $o_keyword);
        $this->assign('startdate', $startdate);
        $this->assign('enddate', $enddate);
        $this->assign('page', $show);// 赋值分页输出
        $this->display();
    }

    public function del(){
        $ids = I("ids");
        $ids = explode(",", $ids);
        $feedbackM = M("email");

        foreach($ids as $id){
            if(!empty($id)){
                // 先查询是否有子文档，如果有则删除之
                $feedbackM->where("`id`='$id'")->delete();
            }
        }
        $this->jsonReturn (1);
    }

    public function changeStatus(){
        $eid = I("post.id");
        $status = I("post.status");

        M("email")->where(['id' => $eid])->save([
            'status' => intval($status)
        ]);

        $this->jsonReturn (1);
    }


}