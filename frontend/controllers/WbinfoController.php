<?php
namespace frontend\controllers;
use frontend\models\Wbinfo;
class WbinfoController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'main1';
    public function actionIndex()
    {   
        $Wbinfo = new Wbinfo();
        $userinfo = $_SESSION['userinfo'];
        $userid = $userinfo['Id'];
        $wbinfo = $Wbinfo->getinfo($userid);
        return $this->render('index',['wbinfo'=>$wbinfo]);
    }
    
}

