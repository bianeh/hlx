<?php
namespace backend\models;
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
    /**
     * 编辑图片
     */
    public function editimages(array $data)
    {
         $Id = $data['Id'];
         $res=Yii::$app->db->createCommand()->update('images',$data, "Id = $Id")->execute();
         return $res;
         
    }
     //获取包装信息
    public function getinfo()
    {   
         $Info = Images::find()->asArray()->all();
         return $Info;
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
    
    /**
     * 删除大图信息
     */
    public function deletedata($Id)
    {  
       return static::deleteAll(['Id'=>$Id]);
    } 
}

