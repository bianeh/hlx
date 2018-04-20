<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Manager extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%manager}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','password'],'required'],
            [['Id', 'discount', 'highermanager','roleid','valid','canAddProxy','canModifyPwd'], 'integer'],
            [['username','tuiguanghao','realname','password','wechat','cardnumber','cardinfo','phone','remark','promptUrl','qrcode'], 'string', 'max' => 255],
            [['date'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'username' => '用户名',
            'tuiguanghao' => '推广号',
            'password' => '密码',
            'discount' => '折扣值',
            'wechat' => '微信号',
            'cardnumber' => '身份证号码',
            'cardinfo' => '银行卡开户地址',
            'phone'=>'手机号码',
            'realname'=>'姓名',
            'remark'=>'备注',
            'date'=>'DATE',
            'valid'=>'VALID',
            'roleid'=>'ROLEID',
            'highermanager'=>'HIGHERMANAGER',
            'canAddProxy'=>'CANADDPROXY',
            'canModifyPwd'=>'CANMODIFYPWD',
            'promptUrl'=>'PROMPTURL',
            'qrcode'=>'QRCODE'
        ];
    }
    
}
