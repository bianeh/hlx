<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Address extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%address}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['address','userid'],'required'],
            [['Id', 'userid', 'isdefault'], 'integer'],
            [['address','detail','linker','phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'address' => 'ADDRESS',
            'userid' => 'USERID',
            'isdefault' => 'ISDEFAULT',
            'detail' => 'DETAIL',
            'linker' => 'LINKER',
            'phone' => 'PHONE'
        ];
    }
    
}
