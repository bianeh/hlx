<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination;  
use yii\web\Controller;
use backend\models\form\LoginForm;
use backend\models\Manager;
header("Content-type: text/html; charset=utf-8");
/**
 * 后台管理员登录
 */
class LoginController extends Controller
{   
    public $enableCsrfValidation=false;
    /**
     *管理员登录页面
     */
    public function actionIndex()
    {   
        return $this->render('index');  
    }
    /**
     * 管理员登录操作
     */
    public function actionDologin()
    {   
        $model = new LoginForm();
        $info = Yii::$app->request->post('info');
        $username = $info['username'];
        $password = $info['password'];
        $Manager = new Manager();
        $res = $Manager ->findByUsername($info['username']);
        $pwd = $res['password'];
        $mdpwd = md5($password);
        if($pwd != $mdpwd)
        {  
            
            die("<script>alert('用户名或密码不正确！');history.back()</script>");
        }
        if (Yii::$app->request->isPost) {
           if ($model->load(Yii::$app->request->post(),'info') && $model->login($username)) {
                $this->redirect(array('/'));
            } else {
                die("<script>alert('用户名或密码不正确2！');history.back()</script>");
            }
        }
    }
    /**
     * 管理员登出操作
     */
     public function actionLogin_out()
    {
        Yii::$app->session->destroy(); 
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => '51SHOWLATOKEN',
            'value' => '',
            'expire'=> 0
        ]));
        $this->redirect(array('/login/index'));
    }
}
