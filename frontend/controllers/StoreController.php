<?php
namespace frontend\controllers;
use frontend\models\Store;
use frontend\models\Images;
class StoreController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'main1';
    public function actionIndex()
    {   
        $store = new Store();
        $storeinfo = $store->getinfo();
        return $this->render('index',['storeinfo'=>$storeinfo]);
    }
    
}
