<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;
use Yii;
class Goods extends \common\core\BaseActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id','storage','valid','freightid','teaid','total_sell','month_sell'], 'integer'],
            [['big','small','name','productcompany','description','standard','material','licensenum','productaddress','storagemethod'], 'string', 'max' => 255],
            [['marketprice','accountprice'],'double'],
            [['date','productdate'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {   
        return [
            'Id' => 'ID',
            'big' => '大标题',
            'small' => '小标题',
            'name' => '商品名称',
            'price' => '商品价格',
            'storage' => 'STORAGE',
            'date' => '日期',
            'valid' => 'VALID',
            'freightid' => 'FREIGHTID',
            'teaid' => 'TEAID',
            'productdate' => '生产日期',
            'productcompany' => '公司名称',
            'licensenum' => '许可证编号',
            'productaddress' => '产品生产地址',
            'storagemethod' => '存储方式',
            'description'=>'产品描述',
            'marketprice'=>'市场价格',
            'accountprice'=>'会员价格',
            'material'=>'材料',
            'standard'=>'产品标准',
            'total_sell'=>'销售总量',
            'month_sell'=>'月销'
        ];
    }
    
}


