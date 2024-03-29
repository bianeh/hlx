<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Basic extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%basic}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','type'], 'integer'],
            [['code','value','name','typename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'code' => 'CODE',
            'type' => 'TYPE',
            'value' => 'VALUE',
            'name' => 'NAME',
            'typename' => 'TYPENAME'
        ];
    }
    
}
