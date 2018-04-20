<?php
namespace backend\controllers;
use yii\web\Controller;
use Yii;
use backend\models\form\LoginForm;
use backend\models\Manager;
class BaseController extends Controller
{
    public $_data = array();
    public function init()
    {
        parent::init();
        $this->init_user_info();
        $data = $this->_data;
        $view=Yii::$app->getView();
        $view->params['data']= $data;
        if(empty($data))
        {   
            $this->redirect(array('/login/index'));
        }
    }
     /**
     * 初始化加载用户信息
     */
    private function init_user_info()
    {
        $login_form = new LoginForm();
        $Manager = new Manager();
        $sess_result = $login_form->init_sess_info();
        if($sess_result)
        {
            $sess_result = $this->object_array($sess_result);
        }
        if(isset($sess_result['Id']) && $sess_result['Id'])
        {
            $data = $Manager->getmanagerInfoByid($sess_result['Id']);
            //更新session
            $login_form->save_session($data);
            //更新cookie
            $login_form->write_cookie($data);
            $this->_data = $data;
        }
        else
        {
            return $this->redirect(array('/login/index'));
        }
    }
    public function object_array($array) 
    {
        if(is_object($array)) 
        {
        $array = (array)$array;
        } 
        if(is_array($array)) 
        {
         foreach($array as $key=>$value) 
         {
           $array[$key] = $this->object_array($value);
         }
        }
        return $array;
    }
}