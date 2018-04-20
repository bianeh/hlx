<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Cart extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','status','goodsid','num','userid'], 'integer'],
            [['specname'], 'string', 'max' => 255],
            [['price','createtime'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'id' => 'ID',
            'status' =>'结算状态',
            'goodsid' => '商品id编号',
            'createtime'=>'创建时间',
            'num' => '商品数目',
            'specname' => '规格参数',
            'price' => '商品价格',
            'userid'=>'用户id编号'
        ];
    }
    
}

