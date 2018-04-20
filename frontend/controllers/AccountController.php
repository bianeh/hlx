<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\User;
header("Content-type:text/html;charset=utf-8");
class AccountController extends Controller
{
    public $enableCsrfValidation = false;//关闭csrf攻击，接受ajax请求
    /**
     * @var string
     */
    public $layout = 'main1';
    public function actionRegister()
    {
        return $this->render('register');
    }
    public function actionLogin()
    {
        return $this->render('login');
    }
    /**
     * 注册
     */
    public function actionDoregister()
    {
        $request = Yii::$app->request->post();
        $data['phone'] = $request['phone'];
        $data['password'] = md5($request['password']);
        
        $phonea = $data['phone'];
        $passworddata = $data['password'];
        $User = new User();
        $userinfo = $User->getdistuserinfo($phonea);
        $phone = $userinfo['phone'];
        if($phone == $phonea)
        {
            $response['code'] = '000002';
            $response['msg'] = '该手机号码已经注册！';
            die(json_encode($response));
        }
        $code = $request['code'];
        $msgcode = $_SESSION['msgcode'];
        if($code != $msgcode)
        {
            $response['code'] = '000001';
            $response['msg'] = '短信验证码不正确!';
            die(json_encode($response));
        }
        $User = new User();
        $res = $User->register($data);
        if($res)
        {   
            $response['code'] = '000008';
            $response['msg'] = '注册成功!';
            die(json_encode($response));
        }
    }
     /**
     * 快捷登录
     */
     public function actionDofastlogin()
    {
        $request = Yii::$app->request->post();
        $phone = $request['phone'];
        $code = $request['code'];
        $User = new User();
        $res = $User->getdistuserinfo($phone);
        $msgcode = $_SESSION['msgcode'];
        if($code != $msgcode)
        {
            $response['code'] = '000006';
            $response['msg'] = '短信验证码不正确';
            die(json_encode($response));
        }
        $phone = $res['phone'];
        if(!$phone)
        {   
            $data['phone'] = $phone;
            $User = new User();
            $res = $User->register($data);
            $User = new User();
            $userinfo = $User->getdistuserinfo($phone);
            $_SESSION['userinfo'] = $userinfo;
            $response['code'] = '000008';
            die(json_encode($response));
        }
        if($phone)
        {   
            $User = new User();
            $userinfo = $User->getdistuserinfo($phone);
            $_SESSION['userinfo'] = $userinfo;
            $response['code'] = '000008';
            die(json_encode($response));
            
        }
    }
    /**
     * 登录
     */
     public function actionDologin()
    {
        $request = Yii::$app->request->post();
        $phone = $request['phone'];
        $password = md5($request['password']);
        $User = new User();
        $res = $User->checkaccount($phone,$password);
        if($res != 1)
        {
            $response['code'] = '000001';
            $response['msg'] = '用户名或密码不正确';
            die(json_encode($response));
        }
        if($res == 1)
        {   
            $User = new User();
            $userinfo = $User->getdistuserinfo($phone);
            $_SESSION['userinfo'] = $userinfo;
            $response['code'] = '000008';
            die(json_encode($response));
            
        }
    }
    /**
     * 快捷登录
     */
    public function actionFast_login()
    {
        return $this->render('fast_login');
    }
    //忘记密码
    public function actionForgetpasspwd()
    {
        return $this->render('forgetpasspwd');
        
    }
    //验证用户是否存在
    public function actionCheckmobile()
    {
        $phone = $_POST['txtUser_val'];
        $User = new User();
        $count = $User->checkmobile($phone);
        if($count != 1)
        {
            $response['code'] = '000001';
            $response['msg'] = '该用户不存在';
            die(json_encode($response));
        }else{
            $response['code'] = '000000';
            $response['msg'] = '该用户存在';
            die(json_encode($response));
        }
    }
    //修改密码
    public function actionUpdatepwd()
    {
         $phone = $_POST['txtUser'];
         $txtCode = $_POST['txtCode'];
         $txtNewpassword = $_POST['txtNewpassword'];
         $txtRepassword = $_POST['txtRepassword'];
         $msgcode = $_SESSION['msgcode'];
         $User = new User();
         $count = $User->checkmobile($phone);
         if($count != 1)
         {
            $response['code'] = '000001';
            $response['msg'] = '该用户不存在';
            die(json_encode($response));
         }
         if($txtCode != $msgcode)
         {
            $response['code'] = '000002';
            $response['msg'] = '短信验证码有误';
            die(json_encode($response));
         }
         if($txtNewpassword != $txtRepassword)
         {
            $response['code'] = '000003';
            $response['msg'] = '密码输入不一致';
            die(json_encode($response));
         }
         $User = new User();
         $data['phone'] = $phone;
         $data['password'] = md5($txtNewpassword);
         $res = $User->updatepwd($data);
         if($res)
         {
            $response['code'] = '000000';
            $response['msg'] = '密码修改成功';
            die(json_encode($response));
         }
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
        $mobile = $_POST['mobile'];
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
    //退出登录
    public function actionLoginout()
    {
        $_SESSION['userinfo'] = '';
        header('Location:http://m.hailanxiang.cn:8082/account/login');
        
    }

}