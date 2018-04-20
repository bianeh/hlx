<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品分类模型
 * ---------------------------------------
 */
class Category extends \common\models\Category
{
    /**
     * 获取商品分类信息
     */
    public function getgoodscategoryinfo($type)
    {   
        $Info = Category::find()->where(['type'=>$type])->asArray()->all();
        return $Info;
    }
    /**
     * 根据商品名称获取商品分类信息
     */
    public function getchildcategoryinfo($name)
    {
         $Info = Category::find()->where(['parent'=>$name])->asArray()->all();
         return $Info;
    }
}

