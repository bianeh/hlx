<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Images;
use frontend\models\Goodsmodel;
use frontend\models\Wapadv;
use frontend\models\Store;
use frontend\models\User;
class ImagesController extends Controller
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
    public function actionGetdetailpic()
    {
        $Id = $_GET['Id'];
        $Images = new Images();
        $imageinfo = $Images->getdetailinfo($Id);
        echo $imageinfo['pic'];
    }
    //获取首页banner图
    public function actionGetbanner()
    {
        $id = $_GET['id'];
        $Wapadv = new Wapadv();
        $advinfo = $Wapadv->getonepic($id);
        echo $advinfo['pic'];
        
    }
    //获取店铺图片
    public function actionStoreimg()
    {
        $id = $_GET['id'];
        $Images = new Images();
        $Info = $Images->gettydpic(2,'体验店',$id);
        echo $Info['pic'];
    }
    //获取头像图片
    public function actionGetuserphoto()
    {
        $Id = $_GET['Id'];
        $User = new User();
        $userinfo = $User->getinfobyuserid($Id);
        echo $userinfo['head'];
    }
}
