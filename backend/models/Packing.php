<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 包装模型
 * ---------------------------------------
 */
class Packing extends \common\models\Packing
{
     //获取包装信息
    public function getinfo()
    {   
         $Info = Packing::find()->asArray()->all();
         return $Info;
    }
}

