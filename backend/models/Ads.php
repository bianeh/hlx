<?php

namespace backend\models;

use Yii;

/*
 * ---------------------------------------
 * 文章模型
 * ---------------------------------------
 */
class Ads extends \common\models\Ads
{
    
     //获取商品信息
    public function getinfo($goods_id)
    {   
        return static::findByCondition(['Id'=>$goods_id])->asarray()->one();
    }
}
