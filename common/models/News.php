<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class News extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','valid','receiver','type'], 'integer'],
            [['content','title','manager','url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'content' => 'PHONE',
            'date' => 'DATE',
            'title' => 'TITLE',
            'valid' => 'VALID',
            'manager' => 'MANAGER',
            'receiver' => 'RECEIVER',
            'type' => 'TYPE',
            'url' => 'URL'
        ];
    }
    
}

