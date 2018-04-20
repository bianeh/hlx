<?php
namespace frontend\controllers;
use frontend\models\Cart;
use frontend\models\Goodsmodel;
use frontend\models\Goods;
use frontend\models\Tea;
use frontend\models\Packing;
use frontend\models\Manager;
class CartController extends BaseController
{
    public $layout = 'main1';
    public function actionAddshopcart()
    {
        $specname = $_GET['specname'];
        $goodsid = $_GET['goodsid'];
        $num = $_GET['num'];
        $Goodsmodel = new Goodsmodel();
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $goodsmodelinfo = $Goodsmodel->getoneinfobyname($specname,$goodsid);
        $price = $goodsmodelinfo['price'];
        $data['price'] = $price;
        $data['specname'] = $specname;
        $data['userid'] = $userid;
        $data['num'] = $num;
        $data['goodsid'] = $goodsid;
        $data['status'] = 0;
        $data['createtime'] = date("Y-m-d H:i:s");
        $Cart = new Cart();
        $res = $Cart->addshopcart($data);
        if($res)
        {
            die("<script>alert('成功添加到购物车');history.back()</script>");
        } 
    }
    //购物车列表
    public function actionIndex()
    {   
        $Cart = new Cart();
        $totalmoney = 0;
        $userinfo = $_SESSION['userinfo'];
        $userid = $userinfo['Id'];
        $cartinfo = $Cart->getinfobyuserid($userid);
        $totalmoney = 0;
        foreach ($cartinfo as $key => $value) {
            $goodsid = $value['goodsid'];
            $specname = $value['specname'];
            $num = $value['num'];
            $price = $value['price'];
            $cartinfo[$key]['yprice'] = $price;



            $userinfo = $_SESSION['userinfo'];
            $code = $userinfo['code'];
            if($code != '')
            {
                $phone = $userinfo['phone'];
                $Manager = new Manager();
                $muser = $Manager->getinfoByphone($phone);
                $mucount = count($muser);
                if($mucount == 1)
                {   
                    $discount = $muser['discount'];
                    $price = $price*$discount/100;
                      
                }else{
                    $price = $price*0.8;
                }
            }else{
                $price = $price;

            }
            

            // $userinfo = $_SESSION['userinfo'];
            // $code = $userinfo['code'];
            // if($code != '')
            // {   
            //   $Manager = new Manager();
            //   $managerinfo = $Manager->getinfoBytuiguanghao($code);
            //   $discount = $managerinfo['discount'];
            //   $price = $price*$discount/100;
            // }else{
            //   $price = $price;
            // }
            // if(isset($teaprice) && $teaprice < 1000)
            // {
            //  $total_price = $cartinfo['num']*$price + $boxprice*$cartinfo['num'];
            // }else{
            //  $total_price = $cartinfo['num']*$price;
            // }





            $Goods = new Goods();
            $Goodsmodel = new Goodsmodel();
            $goodsinfo = $Goods->getinfobyid($goodsid);
            $goodsmodelinfo = $Goodsmodel->getoneinfobyname($specname,$goodsid);

            $packingid = $goodsmodelinfo['packingid'];
            $Packing = new Packing();
            $packinfo = $Packing->getoneinfo($packingid);
            $boxprice = $packinfo['price'];

            $teaid = $goodsinfo['teaid'];
            $Tea = new Tea();
            $teainfo = $Tea->getoneinfo($teaid);
            $teaprice = $teainfo['price'];
            if(isset($teaprice) && $teaprice < 1000)
            {
              $boxprice = $boxprice;
              $total_price = $num*$price + $boxprice*$num;
            }else{
              $boxprice = 0;
              $total_price = $num*$price;
            }
  

            $totalmoney = $total_price + $totalmoney;
            $cartinfo[$key]['name'] = $goodsinfo['name'];
            $cartinfo[$key]['productId'] = $goodsinfo['Id'];
            $cartinfo[$key]['price'] = $price;
            $cartinfo[$key]['total_price'] = $total_price;
            $cartinfo[$key]['boxprice'] = $boxprice;
        }
        return $this->render("index",['cartinfo'=>$cartinfo,'totalmoney'=>$totalmoney]);
    }
}
