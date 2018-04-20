<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Store extends \common\models\Store
{  
     /**
     * 获取信息
     */
    public function getinfo()
    {
        return Store::find()->asArray()->all();
    }
    //获取门店信息
    public function getoneinfo($id)
    {
    	return Store::find()->where(['Id'=>$id])->one();
    }
}


