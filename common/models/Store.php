<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Store extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%store}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['name','address','province','city','linker','phone','detailaddress'], 'string', 'max' => 255],
            [['pic','lat','lng'],'safe']
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
            'lat' => 'LAT',
            'lng' => 'LNG',
            'address' => 'ADDRESS',
            'province' => 'PROVINCE',
            'city' => 'CITY',
            'linker' => 'LINKER',
            'phone' => 'PHONE',
            'pic' => 'PIC',
            'detailaddress' => 'DETAILADDRESS'
        ];
    }
    
}





