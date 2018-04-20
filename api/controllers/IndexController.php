<?php
namespace api\controllers;
use yii\web\Controller;
class IndexController extends Controller
{
   /**
    * @var string
    */
    public $layout = 'main1';
    public function actionIndex()
    {
        return $this->render('index/index');
    }
}
