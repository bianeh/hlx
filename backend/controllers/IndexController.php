<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Ads;
use backend\models\Orderinfo;
use backend\models\User;
use backend\models\Goods;
use backend\models\Manager;
/**
 * 后台首页
 */
class IndexController extends BaseController
{
    public function actionIndex()
    {   
        $Ads = new Ads();
        $res = $Ads->getinfo(1);
        $data = $this->_data;
        return $this->render('index',['data'=>$data]);
    }
    public function actionHome()
    {   
        $Orderinfo = new Orderinfo();
        $ordercount = count($Orderinfo->getinfo());
        $User = new User();
        $usercount = count($User->getinfo());
        $Goods = new Goods();
        $goodcount = count($Goods->getinfo());
        $Manager = new Manager();
        $managercount = count($Manager->getinfo());
        return $this->render('home',
                [
                    'ordercount'=>$ordercount,
                    'usercount'=>$usercount,
                    'goodcount'=>$goodcount,
                    'managercount'=>$managercount,
                ]);
    }
}
