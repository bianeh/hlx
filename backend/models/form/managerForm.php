<?php
namespace backend\models\form;
use backend\models\Manager;
use Yii;
/*
 * ---------------------------------------
 * 员工模型
 * ---------------------------------------
 */
class managerForm extends Manager
{
    public $username;
    public $tuiguanghao;
    public $password;
    public $discount;
    public function rules()
    {
        return [
            [['username', 'password','discount'], 'required'],
            ['username', 'unique']
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
