<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品模型
 * ---------------------------------------
 */
class Goods extends \common\models\Goods
{   
   /**
    * 获取商品信息
    */
    public function getinfo()
    {
        return Goods::find()->asArray()->all();
    }
    /**
     * 根据商品id获取商品信息
     */
    public function getinfobyid($goodsid)
    {
        return Goods::find()->where(['Id'=>$goodsid])->asArray()->one();
    }
    /**
     * 获取分类商品信息
     */
    public function getgoosdinfobycate($catename)
    {
        return Goods::find()->where(['small'=>$catename,'valid'=>1])->asArray()->all();
    }
}
