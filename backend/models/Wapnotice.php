<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Wapnotice extends \common\models\Wapnotice
{   
    /**
     * 添加商品信息
     */
    public function addnotice(array $data)
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
     * 删除wap端公告信息
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



