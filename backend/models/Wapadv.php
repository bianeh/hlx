<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Wapadv extends \common\models\Wapadv
{   
    /**
     * 添加商品信息
     */
    public function addadv(array $data)
    {
         $this->setAttributes($data);
         return $this->save();
    }
    /**
     * 编辑广告信息
     */
    public function editadv(array $data)
    {
         $id = $data['id'];
         $res=Yii::$app->db->createCommand()->update('wapadv',$data, "id = $id")->execute();
         return $res;
    }
    /**
     * 获取商品信息
     */
    public function getinfo()
    {   
        return Wapadv::find()->asArray()->all();
    }
    /**
     * 根据id编号获取wapadv的图片
     */
    public function getonepic($id)
    {
        return Wapadv::find()->where(['id'=>$id])->asArray()->one();
    }
     /**
     * 删除wap端广告信息
     */
    public function deletedata($Id)
    {  
       return static::deleteAll(['id'=>$Id]);
    } 
}

