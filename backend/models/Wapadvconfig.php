<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Wapadvconfig extends \common\models\Wapadvconfig
{   
    /**
     * 获取商品信息
     */
    public function getinfo($pid)
    {   
        return Wapadvconfig::find()->where(['pid'=>$pid])->asArray()->all();
    }
}


