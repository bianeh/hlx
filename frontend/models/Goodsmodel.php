<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Goodsmodel extends \common\models\Goodsmodel
{
    /**
     * 获取商品信息
     */
    public function getinfo()
    {   
        return Goodsmodel::find()->asArray()->all();
    }
    /**
     * 根据商品的id编号获取商品大图
     */
    public function getgoodsmodel($goodsid)
    {
        return Goodsmodel::find()->where(['goodsid'=>$goodsid])->asArray()->all();
    }
    public function getgoodsonemodel($goodsid)
    {
        return Goodsmodel::find()->where(['goodsid'=>$goodsid])->asArray()->one();
    }
    public function getoneinfo($Id)
    {   
         $Info = Goodsmodel::find()->where(['Id'=>$Id])->asArray()->one();
         return $Info;
    }
    public function getoneinfobyname($name,$goodsid)
    {   
         $Info = Goodsmodel::find()->select(['Id','name','price','packingid'])->where(['name'=>$name,'goodsid'=>$goodsid])->asArray()->one();
         return $Info;
    }
    
}