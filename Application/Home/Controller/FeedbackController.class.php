<?php
namespace Home\Controller;

class FeedbackController extends BaseController {
	
    public function index(){
        if(IS_GET){
            $this->display();
        }else{
            $company = remove_xss(I('post.Company'));
            if(empty($company)){
                $this->jsonReturn (false, 'Company cannot be empty!');
            }
            $phone = remove_xss(I('post.Phone'));
            if(!empty($phone)){
                if (!is_numeric($phone)) {
                    $isPhoneRight = false;
                }else{
                    $isPhoneRight = preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $phone) ? true : false;
                }
                if(!$isPhoneRight){
                    $this->jsonReturn (false, 'Please fill in the phone number correctly!');
                }
            }

            $email = remove_xss(I('post.Email'));
            if(empty($email)){
                $this->jsonReturn (false, 'Email cannot be empty!');
            }
            $subject = remove_xss(I('post.Subject'));
            if(empty($subject)){
                $this->jsonReturn (false, 'Subject cannot be empty!');
            }
            $message = remove_xss(I('post.Message'));
            if(empty($message)){
                $this->jsonReturn (false, 'Message cannot be empty!');
            }

            if(mb_strlen($message) > 500){
                $this->jsonReturn (false, 'Message size is too large!');
            }
            $vcode = remove_xss(I('post.VCode'));
            if(empty($vcode)){
                $this->jsonReturn (false, 'Verify code cannot be empty!');
            }

            //email格式校验
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
                $this->jsonReturn (false, 'Please fill in the email address correctly!');
            }

            $verify = new \Think\Verify();
            if(!$verify->check($vcode, '')){
                $this->jsonReturn (false, 'Verify code not correctly!');
            }

            $ret = M("feedback")->data([
                'company' => $company,
                'phone' => $phone,
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
                'status' => 1,
                'createtime' => date('Y-m-d H:i:s'),
                'modifytime' => date('Y-m-d H:i:s'),
            ])->add();

            if(!$ret){
                $this->jsonReturn (false, 'Add feedback failed!');
            }else{
                $this->jsonReturn ('Thanks for submitting your feedback!');
            }
        }
    }

    public function verifyCode(){
        $Verify = new \Think\Verify([
            'length' => 4,
            'useNoise' => false,
            'fontSize' => 13,
            'imageH' => 25,
            'imageW' => 100,
            'expire' => 30
        ]);
        $Verify->entry();
    }

}