<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Images extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%images}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','type','busnum'], 'integer'],
            [['typename'], 'string', 'max' => 255],
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
            'type' => 'TYPE',
            'busnum' => 'BUSNUM',
            'typename' => 'TYPENAME',
            'pic' => 'PIC',
        ];
    }
    
}