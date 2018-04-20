<?php
namespace frontend\models;
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
    //获取某个包装信息
    public function getoneinfo($id)
    {
    	$Info = Packing::find()->where(['Id'=>$id])->asArray()->one();
    	return $Info;
    }
}

