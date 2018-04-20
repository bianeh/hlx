<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 员工模型
 * ---------------------------------------
 */
class Manager extends \common\models\Manager
{
    /**
     * 获取管理员信息
     */
    public function getinfo()
    {   
        return Manager::find()->asArray()->all();
    }
    /**
     * 添加管理员信息
     */
    public function managerdatasave(array $data)
    {    
         $this->setAttributes($data);
         return $this->save();
    }
    /**
     * 修改管理员密码是否可修改信息可否新增代理
     */
    public function managerdataupdateaddutpwd(array $data)
    {    
         $Manager  = static::findOne(['Id'=>$data['Id']]);
         $Manager->canAddProxy = isset($data['canAddProxy']) ? $data['canAddProxy'] : 0;
         $Manager->canModifyPwd = isset($data['canModifyPwd']) ? $data['canModifyPwd'] : 0;
         return $Manager->save();
    }
    /**
     * 根据id获取用户信息
     */
    public function getmanagerInfoByid($Id)
    {   
        return static::findByCondition(['Id'=>$Id])->asarray()->one();
    }
    /**
     * 根据用户名获取用户信息
     */
    public static function findByUsername($username)
    {   
        return static::findByCondition(['username'=>$username])->asarray()->one();
    }
    /**
     * 删除代销商信息
     */
    public function deletedata($Id)
    {  
       return static::deleteAll(['Id'=>$Id]);
    } 
    //根据推广号获取信息
    public function getinfoBytuiguanghao($tuiguanghao)
    {
        return static::findByCondition(['tuiguanghao'=>$tuiguanghao])->asarray()->one();
    }
    //根据手机号获取信息
    public function getinfoByphone($phone)
    {
        return static::findByCondition(['phone'=>$phone])->asarray()->one();
    }
}