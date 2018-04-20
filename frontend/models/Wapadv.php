<?php
namespace frontend\models;
use Yii;
/*
 * ---------------------------------------
 * 模型
 * ---------------------------------------
 */
class Wapadv extends \common\models\Wapadv
{   
    CONST ISSHOW = 0;
    /**
     * 根据id编号获取wapadv的图片
     */
    public function getonepic($id)
    {
        return Wapadv::find()->where(['id'=>$id])->asArray()->one();
    }
    /**
     * 获取轮播信息
     */
    public function getinfo()
    {   
        return Wapadv::find()->where(['isshow'=>self::ISSHOW,'type'=>1,'position'=>2])->asArray()->all();
    }
    /**
     * 获取首页占位图
     */
    public function getzwinfo()
    {
        return Wapadv::find()->where(['isshow'=>self::ISSHOW,'type'=>1,'position'=>3])->asArray()->one();
    }
    /**
     * 茶园背景图片获取
     */
    public function getonecypic()
    {
        return Wapadv::find()->where(['isshow'=>self::ISSHOW,'type'=>4])->asArray()->one();
    }
}


