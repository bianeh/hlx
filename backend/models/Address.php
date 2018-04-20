<?php
namespace backend\models;
use Yii;

/*
 * ---------------------------------------
 * 地址模型
 * ---------------------------------------
 */
class Address extends \common\models\Address
{
    
     //获取地址信息
    public function getinfo()
    {   
         $Info = Orderinfo::find()->asArray()->all();
         return $Info;
    }
}


