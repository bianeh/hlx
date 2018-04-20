<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品模型
 * ---------------------------------------
 */
class Collect extends \common\models\Collect
{   
    public function addcollect(array $data)
    {    
         $this->setAttributes($data);
         return $this->save();
    }
    

    public function getinfobyuserid($userid,$goodsid)
    {
        return Collect::find()->where(['userid'=>$userid,'goodsid'=>$goodsid])->count(); 
    }
    //获取搜藏数目
    public function getcollectnum($goodsid)
    {
        return Collect::find()->where(['goodsid'=>$goodsid])->count(); 
    }
    
    public function getallinfobyuserid($userid)
    {
        return Collect::find()->where(['userid'=>$userid])->asArray()->all();
    }
     /**
     * 删除收藏产品信息
     */
    public function deletedata($Id)
    {  
        return static::deleteAll(['Id'=>$Id]);
    } 
}

