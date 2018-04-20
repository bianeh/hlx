<?php
namespace frontend\models;
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
    //获取某一个包装信息
    public function getoneinfo($teaid)
    {
    	 $Info = Tea::find()->where(['Id'=>$teaid])->asArray()->one();
    	 return $Info;
    }
}


