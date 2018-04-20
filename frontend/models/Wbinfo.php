<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Wbinfo extends \common\models\Wbinfo
{  
     /**
     * 获取站内信信息
     */
    public function getinfo($userid)
    {   
    	$con = ['or', ['userid' =>$userid], ['id' => 0]];
        return Wbinfo::find()->where($con)->asArray()->all();
    }
}



