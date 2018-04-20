<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Orderinfo extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orderinfo}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','userid','isproxy','channel','state'], 'integer'],
            [['orderid','status','detailinfo','ip','area','deliverynum','deliverycompany','address','linker','mobile'], 'string', 'max' => 255],
            [['orderdate'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'orderid' => 'ORDERID',
            'price' => 'PRICE',
            'orderdate' => 'ORDERDATE',
            'userid' => 'USERID',
            'isproxy' => 'ISPROXY',
            'detailinfo' => 'DETAILINFO',
            'status' => 'STATUS',
            'ip' => 'IP',
            'area' => 'AREA',
            'channel' => 'CHANNEL',
            'state' => 'STATE',
            'sendDate' => 'SENDDATE',
            'receiveDate' => 'RECEIVEDATE',
            'deliverynum' => 'DELIVERYNUM',
            'deliverycompany' => 'DELIVERYCOMPANY',
            'address' => 'ADDRESS',
            'linker' => 'LINKER',
            'mobile' => 'MOBILE',
        ];
    }
    
}


