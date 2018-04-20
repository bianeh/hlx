<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品购物车模型
 * ---------------------------------------
 */
class Cart extends \common\models\Cart
{  
     CONST STATUS = 0;
     public function addshopcart(array $data)
    {    
         $this->setAttributes($data);
         return $this->save();
    }
    /**
    * 根据用户id编号获取购物车信息
    */
    public function getinfobyuserid($userid)
    {
        return Cart::find()->where(['userid'=>$userid,'status'=>self::STATUS])->asArray()->all();
    }
     /**
    * 根据用户id编号获取购物车信息
    */
    public function getinfobyid($id)
    {
        return Cart::find()->where(['id'=>$id,'status'=>self::STATUS])->asArray()->one();
    }
    //修改购物车信息状态
    public function updatecartinfo($id)
    {
        $Cart  = static::findOne(['id'=>$id]);
        $Cart->status = 1;
        $Cart->save();
    }
    //修改购物车的数量
    public function updatenums($id,$num)
    {
        $Cart = static::findOne(['id'=>$id]);
        $Cart->num = $num;
        $Cart->save();
    }
}




