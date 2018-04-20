<?php
namespace backend\models\form;
use backend\models\Goodsmodel;
use Yii;
/*
 * ---------------------------------------
 * 商品规格模型
 * ---------------------------------------
 */
class GoodsmodelForm extends Goodsmodel
{
    public $name;
    public $price;
    public $pic;
    public function rules()
    {
        return [
            [['name', 'price','pic'], 'required'],
        ];
    }
    public function checkdata()
    {
        if ($this->validate()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
}

