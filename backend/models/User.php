<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 用户信息模型
 * ---------------------------------------
 */
class User extends \common\models\User
{
     //获取用户信息信息
    public function getinfo()
    {   
         $Info = User::find()->asArray()->all();
         return $Info;
    }
    /**
     * 根据用户的id编号来获取用户信息
     */
    public function getuserinfobyuserid($userid)
    {
        $Info = User::find()->where(['Id'=>$userid])->one();
        return $Info;
    }
      /**
     * 根据用户的id编号来获取用户手机号信息
     */
    public function getuserinfobyphone($phone)
    {
        $Info = User::find()->where(['phone'=>$phone])->asArray()->one();
        return $Info;
    }
}


