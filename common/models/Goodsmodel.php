<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Goodsmodel extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goodsmodel}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','goodsid','packingid','storage','containPackingFee'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['price'],'double'],
            [['pic'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'goodsid' => 'BIG',
            'name' => '规格名称',
            'price' => '价格',
            'storage' => 'PRICE',
            'pic' => '小图片',
            'packingid' => 'DATE',
            'containPackingFee' => 'VALID'
        ];
    }
    
}