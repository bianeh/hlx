<?php
namespace backend\models;
use Yii;
/*
 * ---------------------------------------
 * 商品信息模型
 * ---------------------------------------
 */
class Wbinfo extends \common\models\Wbinfo
{   
    /**
     * 添加站内信信息
     */
    public function addwbinfo(array $data)
    {
         $this->setAttributes($data);
         return $this->save();
    }
    /**
     * 删除站内信
     */
    public function deletedata($Id)
    {  
        return static::deleteAll(['id'=>$Id]);
    } 
}



