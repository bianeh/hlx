<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Wapnotice extends \common\models\Wapnotice
{   
    CONST ISSHOW = 0;
     /**
     * 获取公告信息
     */
    public function getoneinfo()
    {
        return Wapnotice::find()->where(['isshow'=>self::ISSHOW])->asArray()->all();
    }
    //根据ID编号获取公告信息
    public function getinfobyid($id)
    {
    	return Wapnotice::find()->where(['id'=>$id])->asArray()->one();
    }
}



