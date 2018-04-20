<?php
namespace backend\models\form;
use backend\models\Goods;
use Yii;
/*
 * ---------------------------------------
 * 员工模型
 * ---------------------------------------
 */
class GoodsForm extends Goods
{
    public $big;
    public $small;
    public $name;
    public $freightid;
    public function rules()
    {
        return [
            [['big', 'small','name'], 'required'],
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
