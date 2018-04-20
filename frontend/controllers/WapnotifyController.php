<?php
namespace frontend\controllers;
use frontend\models\Wapnotice;
class WapnotifyController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'main1';
    public function actionIndex()
    {   
        $Wapnotice = new Wapnotice();
        $wapnoticeinfo = $Wapnotice->getoneinfo();
        return $this->render('index',['wapnotifyinfo'=>$wapnoticeinfo]);
    }
    //网站公告详情
    public function actionDetail()
    {   
        $id = $_GET['id'];
        $Wapnotice = new Wapnotice();
        $wapnoticeinfo = $Wapnotice->getinfobyid($id);
        $wapnoticeinfo['content'] = htmlspecialchars_decode(str_replace("/ueditor/php/upload/image","http://m.hailanxiang.cn:8081/ueditor/php/upload/image",$wapnoticeinfo['content']));
        return $this->render('detail',['wapnotifyinfo'=>$wapnoticeinfo]);
    }
    
}