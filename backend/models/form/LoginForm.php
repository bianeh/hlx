<?php
namespace backend\models\form;
use Yii;
use common\core\BaseModel;
use backend\models\Manager;
/**
 * Login form
 */
class LoginForm extends BaseModel
{
    public $username;
    public $password;
    /**
     * @inheritdoc
    */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }
    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login($username)
    {
        if($this->validate()){
            $Manager = new Manager();
            $info = $Manager->findByUsername($username); 
            $this->write_cookie($info);
            $this->save_session($info);
            return true;
        } else {
            return false;
        }
    }
    public function init_sess_info(){
        //获取登录cookie信息
        if (isset($_COOKIE['HAILANXIANG']) && $_COOKIE['HAILANXIANG']) {

            $cookie_data = json_decode(base64_decode($_COOKIE['HAILANXIANG']));
            if (isset($cookie_data->Id) && $cookie_data->Id) {
                //获取登录session信息
                $sess_key = md5('SESSIONTOKEN-'.$cookie_data->Id);
                // echo $sess_key;
                $sess_info = Yii::$app->session[$sess_key];
                if (isset($sess_info) && $sess_info){
                    return json_decode($sess_info);
                }
            }
        }
        return false;
    }
    
    /**
     * 保存cookie信息
     * @param $data
     */
    public function write_cookie($data)
    {   
        $cookie_data = array(
            'Id' => $data['Id'],
            'username' => $data['username'],
        );
        $cookie_value = base64_encode(json_encode($cookie_data));
        setcookie("HAILANXIANG",$cookie_value, time()+3600*24, '/');
    }
    /**
     * 保存session信息
     * @param $data
     */
    public function save_session($data)
    {   
        $sess_key = md5('SESSIONTOKEN-'.$data['Id']);
        Yii::$app->session[$sess_key] = json_encode($data);
    }
}

