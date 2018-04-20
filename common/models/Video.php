<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Video extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','valid','channelNo'], 'integer'],
            [['name','address','type','username','verifycode','channels'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'name' => 'NAME',
            'address' => 'ADDRESS',
            'type' => 'TYPE',
            'valid' => 'VALID',
            'username' => 'USERNAME',
            'deviceNo' => 'DEVICENO',
            'channelNo' => 'CHANNELNO',
            'verifycode' => 'VERIFYCODE',
            'channels' => 'CHANNELS'
        ];
    }
    
}





