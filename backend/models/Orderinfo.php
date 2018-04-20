<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 订单信息模型
 * ---------------------------------------
 */
class Orderinfo extends \common\models\Orderinfo
{
     //获取订单信息信息
    public function getinfo()
    {   
         $Info = Orderinfo::find()->asArray()->all();
         return $Info;
    }
    /**
     * 查看订单详情
     */
    public function getdetailinfo($id)
    {
        $Info = Orderinfo::find()->where(['Id'=>$id])->asArray()->one();
        return $Info;
    }
     /**
     * 添加快递信息
     */
    public function addexpress(array $data)
    {
         $Id = $data['Id'];
         $res=Yii::$app->db->createCommand()->update('orderinfo',$data, "Id = $Id")->execute();
         return $res;
    }
}


