<?php
namespace frontend\controllers;
use frontend\models\Collect;
class CollectController extends BaseController
{   
    public $enableCsrfValidation = false;//关闭csrf攻击，接受ajax请求
    public $layout = 'main1';
    //收藏商品动作
    public function actionCollect()
    {
        $goodsid = $_GET['Id'];
        $userinfo = $_SESSION['userinfo'];
        $userid = $userinfo['Id'];
        $data['goodsid'] = $goodsid;
        $data['userid'] = $userid;
        $data['createtime'] = date("Y-m-d H:i:s");
        $Collect = new Collect();
        $count = $Collect->getinfobyuserid($userid,$goodsid);
        if($count == 1)
        {
            die("<script>alert('你已经收藏过该商品！');history.back();</script>");
        }
        $res = $Collect->addcollect($data);
        if($res)
        {
           die("<script>alert('成功收藏该商品！');history.back();</script>");
        }
    }
}




