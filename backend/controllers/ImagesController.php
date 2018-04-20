<?php
namespace backend\controllers;
use backend\models\Images;
use backend\models\Goodsmodel;
use backend\models\Wapadv;
class ImagesController extends BaseController
{
    public $layout = 'main1';
    public function actionGetpic()
    {
        $goodsid = $_GET['goodsid'];
        $Images = new Images();
        $imageinfo = $Images->getoneinfo($goodsid);
        echo $imageinfo['pic'];
    }
    public function actionGetgoodsmodelpic()
    {
        $id = $_GET['Id'];
        $Goodsmodel = new Goodsmodel();
        $imageinfo = $Goodsmodel->getoneinfo($id);
        echo $imageinfo['pic'];
    }
    public function actionGetbigpic()
    {
        $Id = $_GET['Id'];
        $Images = new Images();
        $imageinfo = $Images->getdetailinfo($Id);
        echo $imageinfo['pic'];
    }
    //获取广告图片
    public function actionGetwapadv()
    {
        $id = $_GET['id'];
        $wapadv = new Wapadv();
        $wapadvinfo = $wapadv->getonepic($id);
        echo $wapadvinfo['pic'];
    }
}


