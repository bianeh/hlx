<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Freightitem extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%freightitem}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','item','price','additem','freightid','isdefault','addprice'], 'integer'],
            [['city','unit','type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'item' => 'NAME',
            'price' => 'PRICE',
            'additem' => 'ADDITEM',
            'freightid' => 'FREIGHTID',
            'isdefault' => 'ISDEFAULT',
            'addprice' => 'ADDPRICE',
            'city' => 'CITY',
            'unit' => 'UNIT',
            'type' => 'TYPE'
            
        ];
    }
    
}


