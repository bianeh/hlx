<?php
namespace frontend\controllers;
use yii\web\Controller;
header("Content-type:text/html;charset=utf-8");
class BaseController extends Controller
{
    public $layout = 'main1';
    public function init()
    {
      if(empty($_SESSION['userinfo']))
      {  
            echo "<script>alert('请先登录！');this.location.href='/account/login'</script>";
            exit;
      }
    } 
}
