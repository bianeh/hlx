<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品模型
 * ---------------------------------------
 */
class Address extends \common\models\Address
{   
    public function addaddress(array $data)
    {    
         $this->setAttributes($data);
         return $this->save();
    }
     /**
     * 编辑地址
     */
    public function editaddress(array $data)
    {    
         $id = $data['Id'];
         $res=Yii::$app->db->createCommand()->update('address',$data, "Id = $id")->execute();
         return $res;
    }
   /**
    * 获取用户地址信息列表
    */
    public function getinfobyuserid($userid)
    {
        return Address::find()->where(['userid'=>$userid])->asArray()->all();
    }
    public function getoneinfobyuserid($userid)
    {
        return Address::find()->where(['userid'=>$userid,'isdefault'=>1])->asArray()->one();
    }
    public function getanyinfo($userid)
    {
        return Address::find()->where(['userid'=>$userid])->asArray()->one();
    }
    public function updatedefault($userid)
    {
       $this->updateAll(['isdefault'=>0],['userid'=>$userid]);
    }
    public function getinfobyid($id)
    {
        return Address::find()->where(['Id'=>$id])->asArray()->one();
    }
//    /**
//     * 根据商品id获取商品信息
//     */
//    public function getinfobyid($goodsid)
//    {
//        return Goods::find()->where(['Id'=>$goodsid])->asArray()->one();
//    }
     /**
     * 删除地址信息
     */
    public function deletedata($Id)
    {  
        return static::deleteAll(['Id'=>$Id]);
    } 
}
