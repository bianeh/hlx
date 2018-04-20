<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品模型
 * ---------------------------------------
 */
class Orderinfo extends \common\models\Orderinfo
{    
    public function add(array $data)
    {    
         Yii::$app->db->createCommand()->insert('orderinfo', 
                 [
                      'orderdate' => $data['orderdate'],
                      'orderid' => $data['orderid'],
                      'address' => $data['address'],
                      'linker' => $data['linker'],
                      'mobile' => $data['mobile'],
                      'state' => $data['state'],
                      'userid' => $data['userid'],
                      'price' => $data['price'],
                      'detailinfo' => $data['detailinfo'], 
                 ])->execute();
         // $this->setAttributes($data);
         // $this->save();
    }
    /**
     * 获取商品订单信息
     */
    public function getoneinfo($orderid)
    {
        return Orderinfo::find()->where(['orderid'=>$orderid])->asArray()->one();
    }
    //获取商品是否存在该商品订单
    public function checkiforder($orderid)
    {
        return Orderinfo::find()->where(['orderid'=>$orderid])->count();
    }
    /**
     * 修改支付状态
     */
    public function updatestate(array $data,$orderid)
    {
         $res=Yii::$app->db->createCommand()->update('orderinfo',$data, "orderid ='".$orderid."'")->execute();
         return $res;
    }
    /**
     * 获取商品订单信息根据商品订单信息的状态
     */
    public function getallorders($userid)
    {
        return Orderinfo::find()->where(['userid'=>$userid])->asArray()->all();
    }
     /**
     * 获取商品订单信息根据商品订单信息的状态
     */
    public function getorders($userid,$status)
    {
        return Orderinfo::find()->where(['userid'=>$userid,'state'=>$status])->asArray()->all();
    }
}