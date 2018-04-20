<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Collect extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%collect}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'goodsid'], 'integer'],
            [['createtime'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'id' => 'ID',
            'goodsid' => 'ADDRESS',
            'userid' => 'USERID',
            'createtime' => 'CREATETIME'
        ];
    }
    
}


