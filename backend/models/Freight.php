<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 包装模型
 * ---------------------------------------
 */
class Freight extends \common\models\Freight
{
     //获取包装信息
    public function getinfo()
    {   
         $Info = Freight::find()->asArray()->all();
         return $Info;
    }
}


