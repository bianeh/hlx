<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
/**
 * 后台文章管理
 */
class ArticleController extends BaseController
{
    public function actionIndex()
    {   
        return $this->render('index');
    }
    public function actionHome()
    {   
        return $this->render('home');
    }
}
