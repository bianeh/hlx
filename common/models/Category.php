<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Category extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','type'], 'integer'],
            [['name','parent'], 'string', 'max' => 255],
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
            'type' => 'TYPE',
            'parent' => 'PARENT'
        ];
    }
    
}
