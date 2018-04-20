<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 包装模型
 * ---------------------------------------
 */
class Images extends \common\models\Images
{   
    /**
     * 添加图片
     */
    public function addimages(array $data)
    {
         $this->setAttributes($data);
         return $this->save();
    }
     //根据商品的id编号获取大图
    public function getoneinfo($goodsid)
    {   
         $Info = Images::find()->where(['busnum'=>$goodsid])->asArray()->one();
         return $Info;
    }
    //根据商品的id编号获取所有大图
    public function getallinfo($goodsid)
    {   
         $Info = Images::find()->where(['busnum'=>$goodsid])->asArray()->all();
         return $Info;
    }
    public function getdetailinfo($Id)
    {   
         $Info = Images::find()->where(['Id'=>$Id])->asArray()->one();
         return $Info;
    }
    //获取体验店的图片
    public function gettydpic($type,$typename,$busnum)
    {
         $Info = Images::find()->where(['type'=>$type,'typename'=>$typename,'busnum'=>$busnum])->one();
         return $Info;
    }
}


