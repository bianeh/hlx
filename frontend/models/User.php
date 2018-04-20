<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 用户模型
 * ---------------------------------------
 */
class User extends \common\models\User
{   
     /**
      * 注册用户
      */
    public function register(array $data)
    {
         $this->setAttributes($data);
         $this->save();
         $Id = $this->attributes['Id'];
         return $Id;
    }
    /**
     * 验证用户是否存在
     */
    public function checkaccount($phone,$password)
    {
         return User::find()->where(['phone'=>$phone,'password'=>$password])->count(); 
    }
    /**
     * 获取登录用户的信息
     */
    public function getdistuserinfo($phone)
    {
         return static::findByCondition(['phone'=>$phone])->asarray()->one();
    }
    //验证用户的用户名是否存在
    public function checkmobile($phone)
    {
        return User::find()->where(['phone'=>$phone])->count();
    }
    //修改密码
    public function updatepwd(array $data)
    {
         $phone = $data['phone'];
         $res=Yii::$app->db->createCommand()->update('user',$data, "phone = $phone")->execute();
         return $res;
    }
    //修改信息
    public function updatetgh(array $data)
    {
         $Id = $data['Id'];
         $res=Yii::$app->db->createCommand()->update('user',$data, "Id = $Id")->execute();
         return $res;
    }
    //根据用户的id编号获取用户信息
    public function getinfobyuserid($Id)
    {
        return User::find()->where(['Id'=>$Id])->asarray()->one();
    }
    
}



