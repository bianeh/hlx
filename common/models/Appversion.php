<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Appversion extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%appversion}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['platform','version','updatecontent'], 'string', 'max' => 255],
            [['updatetime'],'datetime'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'platform' => 'PLATFORM',
            'version' => 'VERSION',
            'updatecontent' => 'UPDATECONTENT',
            'updatetime' => 'UPDATETIME'
        ];
    }
    
}
