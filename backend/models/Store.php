<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Store extends \common\models\Store
{   
    /**
     * 添加体验店信息
     */
    public function addstore(array $data)
    {
         $this->setAttributes($data);
         return $this->save();
    }
    /**
     * 编辑公告
     */
    public function editnotice(array $data)
    {    
         $id = $data['id'];
         $res=Yii::$app->db->createCommand()->update('wapnotice',$data, "id = $id")->execute();
         return $res;
    }
     /**
     * 删除信息
     */
    public function deletedata($Id)
    {  
        return static::deleteAll(['id'=>$Id]);
    } 
     /**
     * 根据id编号
     */
    public function getoneinfo($id)
    {
        return Wapnotice::find()->where(['id'=>$id])->asArray()->one();
    }
}



