<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination; 
use yii\web\Controller;
use backend\models\Orderinfo;
use backend\models\Goods;
use backend\models\User;
/**
 * 订单页面
 */
class OrderinfoController extends BaseController
{  
    /**
     *全部订单信息
     */
    public function actionIndex()
    {   
        $con = [];
        if($_GET && !empty($_GET))
        {   
            $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';
            $con['orderid'] = isset($orderid) && $orderid !='' ? $orderid : '';
            $con = array_filter($con);
        }
        $query = Orderinfo::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)
            ->orderBy('Id DESC')  
            ->all(); 
        foreach ($models as $key => $value) {
            $userid = $value['userid'];
            $User = new User();
            $userinfo = $User->getuserinfobyuserid($userid);
            $phone = $userinfo['phone'];
            $models[$key]['userid'] = $phone;

        }
        return $this->render('index', [  
            'orderinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
    /**
     * 待付款
     */
     public function actionPayment()
    {   
        $con['state'] = 100;
        if($_GET && !empty($_GET))
        {   
            $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';
            $con['orderid'] = isset($orderid) && $orderid !='' ? $orderid : '';
            $con = array_filter($con);
        }
        $query = Orderinfo::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->orderBy('Id DESC')
            ->all(); 
        foreach ($models as $key => $value) {
            $userid = $value['userid'];
            $User = new User();
            $userinfo = $User->getuserinfobyuserid($userid);
            $phone = $userinfo['phone'];
            $models[$key]['userid'] = $phone;

        }
        return $this->render('payment', [  
            'orderinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
    /**
     * 已支付
     */
     public function actionHaspayment()
    {   
        $con['state'] = 0;
        if($_GET && !empty($_GET))
        {   
            $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';
            $con['orderid'] = isset($orderid) && $orderid !='' ? $orderid : '';
            $con = array_filter($con);
        }
        $query = Orderinfo::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->orderBy('Id DESC')
            ->all();
        foreach ($models as $key => $value) {
            $userid = $value['userid'];
            $User = new User();
            $userinfo = $User->getuserinfobyuserid($userid);
            $phone = $userinfo['phone'];
            $models[$key]['userid'] = $phone;

        } 
        return $this->render('haspayment', [  
            'orderinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
    /**
     * 已经发货
     */
     public function actionExpressgoods()
    {   
        $con['state'] = 1;
        if($_GET && !empty($_GET))
        {   
            $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';
            $con['orderid'] = isset($orderid) && $orderid !='' ? $orderid : '';
            $con = array_filter($con);
        }
        $query = Orderinfo::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->orderBy('Id DESC')
            ->all(); 
        foreach ($models as $key => $value) {
            $userid = $value['userid'];
            $User = new User();
            $userinfo = $User->getuserinfobyuserid($userid);
            $phone = $userinfo['phone'];
            $models[$key]['userid'] = $phone;

        }
        return $this->render('expressgoods', [  
            'orderinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
     /**
     * 已经收获
     */
     public function actionGetgoods()
    {   
        $con['state'] = 2;
        if($_GET && !empty($_GET))
        {   
            $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';
            $con['orderid'] = isset($orderid) && $orderid !='' ? $orderid : '';
            $con = array_filter($con);
        }
        $query = Orderinfo::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->orderBy('Id DESC')
            ->all(); 
        foreach ($models as $key => $value) {
            $userid = $value['userid'];
            $User = new User();
            $userinfo = $User->getuserinfobyuserid($userid);
            $phone = $userinfo['phone'];
            $models[$key]['userid'] = $phone;

        }
        return $this->render('getgoods', [  
            'orderinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
     /**
     * 超时未支付
     */
     public function actionExptime()
    {   
        $con['state'] = 200;
        if($_GET && !empty($_GET))
        {   
            $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : '';
            $con['orderid'] = isset($orderid) && $orderid !='' ? $orderid : '';
            $con = array_filter($con);
        }
        $query = Orderinfo::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->orderBy('Id DESC')
            ->all(); 
        foreach ($models as $key => $value) {
            $userid = $value['userid'];
            $User = new User();
            $userinfo = $User->getuserinfobyuserid($userid);
            $phone = $userinfo['phone'];
            $models[$key]['userid'] = $phone;

        }
        return $this->render('exptime', [  
            'orderinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
    /**
     * 查看订单详情
     */
    public function actionDetail()
    {
        $id = $_GET['id'];
        $Orderinfo = new Orderinfo();
        $info = $Orderinfo->getdetailinfo($id);
        $detailinfo = $info['detailinfo'];
        $detailinfo = json_decode($detailinfo);
        foreach ($detailinfo as $key => $value) {
            $productid = $value->productId;
            $buynum = $value->buyNum;
            $Goods = new Goods();
            $goodsinfo = $Goods->getoneinfo($productid);
            $detail[$key]['buynum'] = $buynum;
            $detail[$key]['productname'] = $goodsinfo['name'];
        }
        return $this->render('detail', [  
            'detail' => $detail,  
        ]);   
    }
    //发货信息填写
    public function actionExpressinfo()
    {
        if($_GET)
        {
            $id = $_GET['id'];
            return $this->render('expressinfo',['id'=>$id]);
        }
        if($_POST)
        {
            $deliverycompany = $_POST['deliverycompany'];
            $deliverynum = $_POST['deliverynum'];
            $Id = $_POST['Id'];

            $data['Id'] = $Id;
            $data['deliverynum'] = $deliverynum;
            $data['deliverycompany'] = $deliverycompany;
            $data['state'] = 1;

            $Orderinfo = new Orderinfo();
            $res = $Orderinfo->addexpress($data);
            if($res)
            {
                die("<script>alert('成功提交快递信息！');history.back();</script>");
            }
        }
    }
}
