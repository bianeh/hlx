<?php
namespace frontend\controllers;
use frontend\models\Wapadv;
class TeaController extends BaseController
{
    public $layout = 'main1';
    public function actionIndex()
    {   
        $Wapadv = new Wapadv();
        $wapinfo = $Wapadv->getonecypic();
        return $this->render('index',['wapinfo'=>$wapinfo]);
    }
}

