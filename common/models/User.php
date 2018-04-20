<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class User extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','valid','headindex','frommanager','lastLoginDate'], 'integer'],
            [['deviceNo','username','password','realname','code','phone','token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'deviceNo' => 'DEVICENO',
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
            'realname' => 'REALNAME',
            'code' => 'CODE',
            'phone' => 'PHONE',
            'registertime' => 'REGISTERTIME',
            'valid' => 'VALID',
            'headindex' => 'HEADINDEX',
            'head' => 'HEAD',
            'token' => 'TOKEN',
            'frommanager' => 'FROMMANAGER',
            'lastLoginDate' => 'LASTLOGINDATE'
        ];
    }
    
}





