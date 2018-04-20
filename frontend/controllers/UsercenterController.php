<?php
namespace frontend\controllers;
use frontend\models\Manager;
use frontend\models\User;
class UsercenterController extends BaseController
{
    public $layout = 'main1';
    public $enableCsrfValidation = false;//关闭csrf攻击，接受ajax请求
    public function actionIndex()
    {   
    	$userinfo = $_SESSION['userinfo'];
        return $this->render('index',['userinfo'=>$userinfo]);
    }
    //认证会员
    public function actionRecoginize()
    {
    	return $this->render('recoginize');
    }
    //会员认证操作
    public function actionDorecoginize()
    {
    	

        $userinfo = $_SESSION['userinfo'];
        $tuiguangcode = $userinfo['code'];
        if(!empty($tuiguangcode))
        {
            $response['code'] = '000001';
            $response['msg'] = '你已是认证会员！';
            die(json_encode($response));
        }
        $code = $_POST['code'];
        $tuiguanghao = $_POST['tuiguanghao'];
        $msgcode = $_SESSION['msgcode'];
        if($code != $msgcode)
        {
            $response['code'] = '000001';
            $response['msg'] = '手机验证码不正确！';
            die(json_encode($response));
        }
        $Manager = new Manager();
        $res = $Manager->getinfoBytuiguanghao($tuiguanghao);
        if(empty($res))
        {
            $response['code'] = '000002';
            $response['msg'] = '没有改邀请人';
            die(json_encode($response));
        }
        $userinfo = $_SESSION['userinfo'];
        $Id = $userinfo['Id'];
        $data['tuiguanghao'] = $tuiguanghao;
        $data['Id'] = $Id;
        $User = new User();
        $result = $User->updatetgh($data);
        if($result)
        {
            $response['code'] = '000000';
            $response['msg'] = '认证成功！';
            die(json_encode($response));
        }
    }
    //会员详细信息
    public function actionUserdetail()
    {   
        $userinfo = $_SESSION['userinfo'];
        //用户的id编号
        $userid = $userinfo['Id'];
        //用户的昵称
        $username = $userinfo['username'];
        return $this->render("userdetail",['userinfo'=>$userinfo]);
    }

     /**
     * 获取验证码
     */
    public function actionGetcode()
    {
        $statusStr = array(
        "0" => "短信发送成功",
        "-1" => "参数不全",
        "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
        "30" => "密码错误",
        "40" => "账号不存在",
        "41" => "余额不足",
        "42" => "帐户已过期",
        "43" => "IP地址限制",
        "50" => "内容含有敏感词"
    );
        $userinfo = $_SESSION['userinfo'];
        $mobile = $userinfo['phone'];
        $msgcode = rand(100000, 999999);
        $_SESSION['msgcode'] = $msgcode;
        $smsapi = "http://www.smsbao.com/"; //短信网关
        $user = "zhepu"; //短信平台帐号
        $pass = md5("zp888888"); //短信平台密码
        $content="尊敬的".$mobile."您好，您的验证码是".$msgcode;//要发送的短信内容
        $phone = $mobile;
        $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
        $result =file_get_contents($sendurl) ;
        echo $statusStr[$result];
    }
    //修改用户昵称
    public function actionUpusername()
    {   
        $userinfo = $_SESSION['userinfo'];
        //用户的id编号
        $userid = $userinfo['Id'];
        //用户的昵称

        if($_POST)
        {
            $username = $_POST['username'];
            $User = new User();
            $data['Id'] = $userid;
            $data['username'] = $username;
            $res = $User->updatetgh($data);
            if($res)
            {   
                $_SESSION['userinfo']['username'] = $username;
                $response['code'] = '000000';
                $response['msg'] = '成功修改昵称';
                die(json_encode($response));
            }
        }
        
        $username = $userinfo['username'];
        return $this->render("upusername",['userinfo'=>$userinfo]);
    }
    //修改头像
    public function actionUpuserphoto()
    {
        return $this->render("upuserphoto");
    }
    //修改头像操作
    public function actionUpphoto(){
        $head = file_get_contents($_FILES['photo']['tmp_name']);
        $userinfo = $_SESSION['userinfo'];
        //用户的id编号
        $userid = $userinfo['Id'];
        //用户的昵称
        $User = new User();
        $data['Id'] = $userid;
        $data['head'] = $head;
        $res = $User->updatetgh($data);
        if($res)
        {
            die("<script>alert('成功修改头像');history.back()</script>");
        }
    }
    //关于我们
    public function actionIntroinfo()
    {
        return $this->render("introinfo");
    }

}