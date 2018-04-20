<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class China extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%china}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','Pid'], 'integer'],
            [['Name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'Name' => 'NAME',
            'Pid' => 'PID'
        ];
    }
    
}
