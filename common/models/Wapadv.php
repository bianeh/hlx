<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Wapadv extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wapadv}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','position','type','isshow'], 'integer'],
            [['name','url'], 'string', 'max' => 255],
            [['pic','createtime'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'id' => 'ID',
            'position' => '位置',
            'type' => '类型',
            'name' =>'名称',
            'pic' => '广告图',
            'isshow' => '是否显示',
            'url' => '链接地址'
        ];
    }
    
}
