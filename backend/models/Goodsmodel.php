<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Goodsmodel extends \common\models\Goodsmodel
{
    /**
     * 添加商品规格参数
     */
    public function addspecs(array $data)
    {
         $this->setAttributes($data);
         return $this->save();
    }
    /**
     * 获取商品信息
     */
    public function getinfo()
    {   
        return Goodsmodel::find()->asArray()->all();
    }
    /**
     * 根据商品的id获取商品的规格信息
     */
    public function getinfobygoodsid($goodsid)
    {
        return Goodsmodel::find()->where(['goodsid'=>$goodsid])->asArray()->all();
    }
    public function getoneinfo($Id)
    {   
         $Info = Goodsmodel::find()->where(['Id'=>$Id])->asArray()->one();
         return $Info;
    }
    
    /**
     * 删除参数信息
     */
    public function deletedata($Id)
    {  
       return static::deleteAll(['goodsid'=>$Id]);
    }
    /**
     * 删除参数信息
     */
    public function deletedatabyid($Id)
    {  
       return static::deleteAll(['Id'=>$Id]);
    }
    
}