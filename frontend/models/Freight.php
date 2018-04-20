<?php
namespace frontend\models;
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
    //获取某一个快递信息
    public function getoneinfo($id)
    {
         $Info = Freight::find()->where(['Id'=>$id])->asArray()->one();
         return $Info;
    }
}
