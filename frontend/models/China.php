<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class China extends \common\models\China
{
    /**
     * 获取商品信息
     */
    public function getinfo($pid)
    {   
        return China::find()->where(['Pid'=>$pid])->asArray()->all();
    } 
    /**
     * 获取地址信息
     */
    public function getinfobyid($id)
    {
        return China::find()->where(['Id'=>$id])->asArray()->one();
    }
}

