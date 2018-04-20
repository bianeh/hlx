<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Wapnotice extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wapnotice}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','isshow'], 'integer'],
            [['content','title'], 'string', 'max' => 255],
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
            'title' =>'标题',
            'content' => '内容',
            'createtime'=>'创建时间'
        ];
    }
    
}
