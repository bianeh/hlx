<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 包装模型
 * ---------------------------------------
 */
class Tea extends \common\models\Tea
{
     //获取包装信息
    public function getinfo()
    {   
         $Info = Tea::find()->asArray()->all();
         return $Info;
    }
}


