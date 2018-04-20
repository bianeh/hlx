<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Goods extends \common\models\Goods
{   
    /**
     * 添加商品信息
     */
    public function addgoods(array $data)
    {
          Yii::$app->db->createCommand()->insert('goods', 
                 [
                      'name' => $data['name'],
                      'big' => $data['big'],
                      'small' => $data['small'],
                      'description' => $data['description'],
                      'productdate' => $data['productdate'],
                      'productcompany' => $data['productcompany'],
                      'licensenum' => $data['licensenum'],
                      'productaddress' => $data['productaddress'], 
                      'storagemethod' => $data['storagemethod'],
                      'marketprice' => $data['marketprice'],
                      'accountprice' => $data['accountprice'],
                      'material' => $data['material'],
                      'standard' => $data['standard'],
                      'teaid' => $data['teaid'],
                      'freightid' => $data['freightid'],
                      'date' => $data['date'],
                 ])->execute();
           return Yii::$app->db->getLastInsertId();
    }
    /**
     * 修改商品信息
     */
    public function editgoods(array $data)
    {
         $id = $data['Id'];
         $res=Yii::$app->db->createCommand()->update('goods',$data, "id = $id")->execute();
         return $res;
    }
    /**
     * 获取商品信息
     */
    public function getinfo()
    {   
        return Goods::find()->asArray()->all();
    }
    /*
     * 获取指定的商品信息
     */
    public function getoneinfo($id)
    {
        return Goods::find()->where(['Id'=>$id])->asArray()->one();
    }
    
     /**
     * 删除代商品信息
     */
    public function deletedata($Id)
    {  
       return static::deleteAll(['Id'=>$Id]);
    } 
    //上架下架产品
    public function udact($goodid,$valid)
    {
        $id = $goodid;
        $data['valid'] = $valid;
        $res=Yii::$app->db->createCommand()->update('goods',$data, "Id = $id")->execute();
        return $res;
    }
}
