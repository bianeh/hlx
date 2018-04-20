<?php
namespace frontend\controllers;
use frontend\models\Goods;
use frontend\models\Images;
use frontend\models\Goodsmodel;
use frontend\models\Address;
use frontend\models\Orderinfo;
use frontend\models\Cart;
use frontend\models\Tea;
use frontend\models\Packing;
use frontend\models\Freight;
use frontend\models\Manager;
class OrderController extends BaseController
{  
    public $enableCsrfValidation=false;
     /**
     * 已收货订单信息
     */
    public function actionGetgoods()
    {   
        $Orderinfo = new Orderinfo();
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $status = 2;
        $orderinfo = $Orderinfo->getorders($userid,$status);
        foreach ($orderinfo as $key => $value) 
        {  
            $detailinfo = $value['detailinfo'];
            $detailinfo = json_decode($detailinfo,true);
            $total_price = 0;
            foreach ($detailinfo as $k => $v){
                $productid = $v['productId'];
                $Goods = new Goods();
                $goodsinfo = $Goods->getinfobyid($productid);
                $detailinfo[$k]['name'] = $goodsinfo['name'];
                $price = $v['unitPrice'];
                $total_price = $price + $total_price;
            } 
            $orderinfo[$key]['detailinfo'] = $detailinfo;
            $orderinfo[$key]['total_price'] = $total_price;
        }
        return $this->render('getgoods',['orderinfo'=>$orderinfo]);
    }
    
    /**
     * 已发货订单信息
     */
    public function actionExpress()
    {   
        $Orderinfo = new Orderinfo();
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $status = 1;
        $orderinfo = $Orderinfo->getorders($userid,$status);
        foreach ($orderinfo as $key => $value) 
        {  
            $detailinfo = $value['detailinfo'];
            $detailinfo = json_decode($detailinfo,true);
            $total_price = 0;
            foreach ($detailinfo as $k => $v){
                $productid = $v['productId'];
                $Goods = new Goods();
                $goodsinfo = $Goods->getinfobyid($productid);
                $detailinfo[$k]['name'] = $goodsinfo['name'];
                $price = $v['unitPrice'];
                $total_price = $price + $total_price;
            } 
            $orderinfo[$key]['detailinfo'] = $detailinfo;
            $orderinfo[$key]['total_price'] = $total_price;
        }
        return $this->render('express',['orderinfo'=>$orderinfo]);
    }
    /**
     * 已支付订单信息
     */
    public function actionHaspayment()
    {   
        $Orderinfo = new Orderinfo();
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $status = 0;
        $orderinfo = $Orderinfo->getorders($userid,$status);
        foreach ($orderinfo as $key => $value) 
        {  
            $detailinfo = $value['detailinfo'];
            $detailinfo = json_decode($detailinfo,true);
            $total_price = 0;
            foreach ($detailinfo as $k => $v){
                $productid = $v['productId'];
                $Goods = new Goods();
                $goodsinfo = $Goods->getinfobyid($productid);
                $detailinfo[$k]['name'] = $goodsinfo['name'];
                $price = $v['unitPrice'];
                $total_price = $price + $total_price;
            } 
            $orderinfo[$key]['detailinfo'] = $detailinfo;
            $orderinfo[$key]['total_price'] = $total_price;
        }
        return $this->render('haspayment',['orderinfo'=>$orderinfo]);
    }
    /**
     * 未支付订单信息
     */
    public function actionPaymenting()
    {   
        $Orderinfo = new Orderinfo();
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $status = 100;
        $orderinfo = $Orderinfo->getorders($userid,$status);
        foreach ($orderinfo as $key => $value) 
        {  
            $detailinfo = $value['detailinfo'];
            $detailinfo = json_decode($detailinfo,true);
            $total_price = 0;
            foreach ($detailinfo as $k => $v){
                $productid = $v['productId'];
                $Goods = new Goods();
                $goodsinfo = $Goods->getinfobyid($productid);
                $detailinfo[$k]['name'] = $goodsinfo['name'];
                $price = $v['unitPrice'];
                $total_price = $price + $total_price;
            } 
            $orderinfo[$key]['detailinfo'] = $detailinfo;
            $orderinfo[$key]['total_price'] = $total_price;
        }
        return $this->render('paymenting',['orderinfo'=>$orderinfo]);
    }
    /**
     * 全部订单信息
     */
    public function actionIndex()
    {   
        $Orderinfo = new Orderinfo();
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $orderinfo = $Orderinfo->getallorders($userid);
        foreach ($orderinfo as $key => $value) 
        {  
            $detailinfo = $value['detailinfo'];
            $detailinfo = json_decode($detailinfo,true);
            $total_price = 0;
            foreach ($detailinfo as $k => $v){
                $productid = $v['productId'];
                $Goods = new Goods();
                $goodsinfo = $Goods->getinfobyid($productid);
                $detailinfo[$k]['name'] = $goodsinfo['name'];
                $price = $v['unitPrice'];
                $total_price = $price + $total_price;
            } 
            $orderinfo[$key]['detailinfo'] = $detailinfo;
            $orderinfo[$key]['total_price'] = $total_price;
        }
        return $this->render('index',['orderinfo'=>$orderinfo]);
    }
    /**
     * @var string
     */
    public $layout = 'main1';
    public function actionPurchase()
    {   
        $specname = $_GET['specname'];
        $goodsid = $_GET['goodsid'];
        $num = $_GET['num'];
        $Goodsmodel = new Goodsmodel();
        $Goods = new Goods();
        $Images = new Images();
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $Address = new Address();
        $addressinfo = $Address->getanyinfo($userid);
        if(empty($addressinfo))
        {
            die("<script>alert('请先添加收货地址！');window.location.href='/address/add'</script>");
        }
        $addressinfom = $Address->getoneinfobyuserid($userid);

        if(empty($addressinfom))
        {
            $addressinfo = $addressinfo;
        }else{
            $addressinfo = $addressinfom;
        }
        $goodsmodelinfo = $Goodsmodel->getoneinfobyname($specname,$goodsid);
        $goodsinfo = $Goods->getinfobyid($goodsid);
        $imagesinfo = $Images->getallinfo($goodsid);
        $packingid = $goodsmodelinfo['packingid'];
        $Packing = new Packing();
        $packinfo = $Packing->getoneinfo($packingid);
        $boxprice = $packinfo['price'];


        $goodsinfo = $Goods->getinfobyid($goodsid);

        $teaid = $goodsinfo['teaid'];
        $Tea = new Tea();
        $teainfo = $Tea->getoneinfo($teaid);
        $teaprice = $teainfo['price'];
        if(isset($teaprice) && $teaprice < 1000)
        {
            $boxprice = $boxprice;
        }else{
            $boxprice = 0;
        }

        $teaid = $goodsinfo['teaid'];
        $Tea = new Tea();
        $teainfo = $Tea ->getoneinfo($teaid);
        $teaprice = $teainfo['price'];
        $userinfo = $_SESSION['userinfo'];
        $code = $userinfo['code'];
        if(!empty($code))
        {   
            // $Manager = new Manager();
            // $managerinfo = $Manager->getinfoBytuiguanghao($code);
            // $discount = $managerinfo['discount'];
            // $goodsmodelinfo['price'] = $goodsmodelinfo['price']*$discount/100;


                $phone = $userinfo['phone'];
                $Manager = new Manager();
                $muser = $Manager->getinfoByphone($phone);
                $mucount = count($muser);
                if($mucount == 1)
                {   
                    $discount = $muser['discount'];
                    $goodsmodelinfo['price'] = $goodsmodelinfo['price']*$discount/100;
                      
                }else{
                    $goodsmodelinfo['price'] = $goodsmodelinfo['price']*0.8;
                }


        }else{
            $goodsmodelinfo['price'] = $goodsmodelinfo['price'];

        }
        if($teaprice < 1000)
        {
             $total_price = $goodsmodelinfo['price']*$num + $boxprice*$num;
        }
        if($teaprice >= 1000)
        {
             $total_price = $goodsmodelinfo['price']*$num;
        }
        return $this->render('purchase',
                [
                 'goodsmodelinfo'=>$goodsmodelinfo,
                 'goodsinfo'=>$goodsinfo,
                 'imagesinfo'=>$imagesinfo,
                 'num'=>$num,
                 'addressinfo'=>$addressinfo,
                 'total_price'=>$total_price,
                 'boxprice' =>$boxprice,
                ]);
    }
    //购物车里面的信息展示到确认订单页面
     public function actionPurchasecart()
    {   
          
         
          if($_GET)
          {   
              if(empty($_GET['cartids']))
              {
                die("<script>alert('请选择购物信息后再确认！');history.back();</script>");
              }
              $data = explode(',', $_GET['cartids']);
              $count = count($data);
              $totalmoney = 0;
              $listinfo = [];
              $nums = [];
              for($i=0;$i<count($data);$i++)
              {
                  $id = $data[$i];
                  $Goodsmodel = new Goodsmodel();
                  $Cart = new Cart();
                  $Goods = new Goods();
                  $userInfo = $_SESSION['userinfo'];
                  $userid = $userInfo['Id'];
                  $Address = new Address();
                  $addressinfo = $Address->getoneinfobyuserid($userid);
                  $cartinfo = $Cart->getinfobyid($id);
                  $goodsid = $cartinfo['goodsid'];
                  $specname = $cartinfo['specname'];
                  $goodsmodelinfo = $Goodsmodel->getoneinfobyname($specname,$goodsid);
                  $packingid = $goodsmodelinfo['packingid'];
                  $Packing = new Packing();
                  $packinfo = $Packing->getoneinfo($packingid);
                  $boxprice = $packinfo['price'];
                  $goodsinfo = $Goods->getinfobyid($goodsid);
                  $teaid = $goodsinfo['teaid'];
                  $Tea = new Tea();
                  $teainfo = $Tea->getoneinfo($teaid);
                  $teaprice = $teainfo['price'];
                  $price = $cartinfo['price'];
                  $userinfo = $_SESSION['userinfo'];
                  $code = $userinfo['code'];
                  if($code != '')
                  {   
                      // $Manager = new Manager();
                      // $managerinfo = $Manager->getinfoBytuiguanghao($code);
                      // $discount = $managerinfo['discount'];
                      // $price = $price*$discount/100;


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
                  if(isset($teaprice) && $teaprice < 1000)
                  {
                     $total_price = $cartinfo['num']*$price + $boxprice*$cartinfo['num'];
                  }else{
                     $total_price = $cartinfo['num']*$price;
                  }

                  $goodsinfo = $Goods->getinfobyid($goodsid);
                  $teaid = $goodsinfo['teaid'];
                  $Tea = new Tea();
                  $teainfo = $Tea->getoneinfo($teaid);
                  $teaprice = $teainfo['price'];
                  if(isset($teaprice) && $teaprice < 1000)
                  {
                      $boxprice = $boxprice;
                  }else{
                      $boxprice = 0;
                  }
                  $cartinfo['total_price'] = $total_price;
                  $cartinfo['goodsname'] = $goodsinfo['name'];
                  $cartinfo['goodsid'] = $goodsid;
                  $cartinfo['boxprice'] = $boxprice;
                  $cartinfo['discountprice'] = $price;
                  $totalmoney = $total_price + $totalmoney; 
                  $listinfo[] = $cartinfo;
                  $nums[] = $cartinfo['num'];
              }
              return $this->render("purchasecart",[
                  'listinfo'=>$listinfo,
                  'addressinfo'=>$addressinfo,
                  'data'=>json_encode($data),
                  'nums'=>json_encode($nums),
                  'cartinfo'=>$cartinfo,
                  'totalmoney'=>$totalmoney,
                  'count'=>$count,
                      ]);
              
          } 
    }
    //购物车结算生成订单
    public function actionCartpayment()
    {
        $paymoney = $_GET['paymoney'];
        $dataids = $_GET['data'];
        $nums = $_GET['nums'];
        $addressid = $_GET['addressid'];
        $dataids = explode(',',$dataids);
        $nums = explode(',',$nums);
        $Address = new Address();
        $addressinfo = $Address->getinfobyid($addressid);
        $orderno = $this->actionOrderno();
        $userInfo = $_SESSION['userinfo'];
        $data['price'] = $paymoney;
        $data['orderdate'] = date("Y-m-d H:i:s");
        $data['orderid'] = $orderno;
        $data['address'] = $addressinfo['address'];
        $data['linker'] = $addressinfo['linker'];
        $data['mobile'] = $addressinfo['phone'];
        $data['state'] = 100;
        $data['userid'] = $userInfo['Id'];
        $arr = [];
        $arrdetailinfo = [];
        for($i=0;$i<count($dataids);$i++)
        {    
            $id = $dataids[$i];
            $Cart = new Cart();
            $cartinfo = $Cart->getinfobyid($id);
            $Cart->updatecartinfo($id);
            $specname = $cartinfo['specname'];
            $goodsid = $cartinfo['goodsid'];
            $Goods = new Goods();
            $goodsinfo = $Goods->getinfobyid($goodsid);
            $freightid = $goodsinfo['freightid'];
            $Freight = new Freight();
            $freightinfo = $Freight->getoneinfo($freightid);
            $teaid = $goodsinfo['teaid'];
            $Tea = new Tea();
            $teainfo = $Tea->getoneinfo($teaid);
            $teaprice = $teainfo['price'];
            if(isset($teaprice) && $teaprice < 1000)
            {
                $boxprice = 50;
            }else{
                $boxprice = 0;
            }
            $Goodsmodel = new Goodsmodel();
            $goodsmodelinfo = $Goodsmodel->getoneinfobyname($specname,$goodsid);
            $modelid = $goodsmodelinfo['Id'];
            $purl = "/file/regular/".$modelid;
            $arr['buyNum'] = $nums[$i];
            $arr['productId'] = $cartinfo['goodsid'];
            $arr['linker'] = $addressinfo['linker'];
            $arr['phone'] = $addressinfo['phone'];
            $arr['unitPrice'] = $cartinfo['price'];
            $arr['discount'] = $paymoney;
            $arr['productUrl'] = $purl;
            $arr['packingprice'] = $boxprice;
            $arr['regularname'] = $specname;
            $arr['productName'] = $goodsinfo['name'];
            $arr['address'] = $addressinfo['address'];
            $arr['freightname'] = $freightinfo['name'];
            $arr['freightdes'] = $freightinfo['description'];
            $arrdetailinfo[] = $arr;
        }   
        $data['detailinfo'] = json_encode($arrdetailinfo);
        $Orderinfo = new Orderinfo();
        $Orderinfo->add($data);
        return $this->render("payment",[
            'paymoney'=>$paymoney,
            'orderno' =>$orderno,
                ]);
    }
    //正常结算生成订单
    public function actionPayment()
    {   
        $paymoney = $_GET['paymoney'];
        $goodsid = $_GET['goodsid'];
        $addressid = $_GET['addressid'];
        $num = $_GET['num'];
        $Id = $_GET['Id'];
        $Goods = new Goods();
        $goodsinfo = $Goods->getinfobyid($goodsid);
        $freightid = $goodsinfo['freightid'];
        $Freight = new Freight();
        $freightinfo = $Freight->getoneinfo($freightid);
        $teaid = $goodsinfo['teaid'];
        $Tea = new Tea();
        $teainfo = $Tea->getoneinfo($teaid);
        $teaprice = $teainfo['price'];
        if(isset($teaprice) && $teaprice < 1000)
        {
            $boxprice = 50;
        }else{
            $boxprice = 0;
        }
        $Address = new Address();
        $addressinfo = $Address->getinfobyid($addressid);
        $Goodsmodel = new Goodsmodel();
        $goodsmodelinfo = $Goodsmodel->getoneinfo($Id);
        $specname = $goodsmodelinfo['name'];
        $purl = "/file/regular/".$Id;
        //待写
        $orderno = $this->actionOrderno();
        $userInfo = $_SESSION['userinfo'];
        $data['orderdate'] = date("Y-m-d H:i:s");
        $data['orderid'] = $orderno;
        $data['address'] = $addressinfo['address'];
        $data['linker'] = $addressinfo['linker'];
        $data['mobile'] = $addressinfo['phone'];
        $data['state'] = 100;
        $data['price'] = floatval($paymoney);
        $data['userid'] = $userInfo['Id'];
        $arr['buyNum'] = $num;
        $price = $goodsmodelinfo['price'];
        $userinfo = $_SESSION['userinfo'];
        $code = $userinfo['code'];
        if($code != '')
        {
            // $Manager = new Manager();
            // $managerinfo = $Manager->getinfoBytuiguanghao($code);
            // $discount = $managerinfo['discount'];
            // $price = $price*$discount;




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
        // $arr['productUrl'] = 343434;
        $arr['productUrl'] = $purl;
        // $arr['productId1'] = 1;
        $arr['productId'] = $goodsid;
        $arr['unitPrice'] = $goodsmodelinfo['price'];
        $arr['discount'] = $price;
        $arr['linker'] = $addressinfo['linker'];
        $arr['phone'] = $addressinfo['phone'];
        $arr['packingprice'] = $boxprice;
        $arr['regularname'] = $specname;
        $arr['productName'] = $goodsinfo['name'];
        $arr['address'] = $addressinfo['address'];
        $arr['freightname'] = $freightinfo['name'];
        $arr['freightdes'] = $freightinfo['description'];
        $arrdetailinfo = [];
        $arrdetailinfo[] = $arr;
        $data['detailinfo'] = json_encode($arrdetailinfo);
        // echo "<pre>";
        // print_r($data);
        // exit;
        $Orderinfo = new Orderinfo();
        $Orderinfo->add($data);
        return $this->render("payment",[
            'paymoney'=>$paymoney,
            'orderno' =>$orderno,
                ]);
    }
    //前去付款
    public function actionGopayment()
    {
        $paymoney = $_GET['paymoney'];
        $orderno = $_GET['orderno'];
        return $this->render("payment",[
            'paymoney'=>$paymoney,
            'orderno' =>$orderno,
                ]);

    }
    //修改购物车信息
    public function actionUpdatecart()
    {
        $num = $_POST['num'];
        $cartid = $_POST['cartid'];
        $Cart = new Cart();
        $Cart->updatenums($cartid,$num);
        $cartinfo = $Cart->getinfobyid($cartid);
        $price = $cartinfo['price'];
        $goodsid = $cartinfo['goodsid'];
        $Goods = new Goods();
        $goodsinfo = $Goods->getinfobyid($goodsid);
        $teaid = $goodsinfo['teaid'];
        $Tea = new Tea();
        $teainfo = $Tea->getoneinfo($teaid);
        $teaprice = $teainfo['price'];
        $userinfo = $_SESSION['userinfo'];
        $code = $userinfo['code'];
        if($code != '')
        {
            // $Manager = new Manager();
            // $managerinfo = $Manager->getinfoBytuiguanghao($code);
            // $discount = $managerinfo['discount'];
            // $price = $price*$discount/100;



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

        $Goodsmodel = new Goodsmodel();
        $goodsmodelinfo = $Goodsmodel->getgoodsonemodel($goodsid);
        $packingid = $goodsmodelinfo['packingid'];
        $Packing = new Packing();
        $packinfo = $Packing->getoneinfo($packingid);
        $boxprice = $packinfo['price'];


        if(isset($teaprice) && $teaprice < 1000)
        {
            $total_price = $price*$num + $boxprice*$num;
        }else{
            $total_price = $price*$num;
        }
        $response['total_price'] = $total_price;
        $response['code'] = '000000';
        die(json_encode($response));
    }
    //获取购物车选购的产品总价格
    public function actionGetcartprice()
    {
        $cartids = $_POST['cartids'];
        $cartids = explode(",",$cartids);
        $cartprice = 0;
        for($i=0;$i<count($cartids);$i++)
        {
            $cartid = $cartids[$i];
            $Cart = new Cart();
            $cartinfo = $Cart->getinfobyid($cartid);
            $num = $cartinfo['num'];
            $price = $cartinfo['price'];
            $goodsid = $cartinfo['goodsid'];
            $Goods = new Goods();
            $goodsinfo = $Goods->getinfobyid($goodsid);
            $teaid = $goodsinfo['teaid'];
            $Tea = new Tea();
            $teainfo = $Tea->getoneinfo($teaid);
            $teaprice = $teainfo['price'];


            $Goodsmodel = new Goodsmodel();
            $goodsmodelinfo = $Goodsmodel->getgoodsonemodel($goodsid);
            $packingid = $goodsmodelinfo['packingid'];
            $Packing = new Packing();
            $packinfo = $Packing->getoneinfo($packingid);
            $boxprice = $packinfo['price'];




            $userinfo = $_SESSION['userinfo'];
            $code = $userinfo['code'];
            if($code != '')
            {
                // $Manager = new Manager();
                // $managerinfo = $Manager->getinfoBytuiguanghao($code);
                // $discount = $managerinfo['discount'];
                // $price = $price*$discount/100;
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


            if(isset($teaprice) && $teaprice < 1000)
            {
                $total_price = $price*$num + $boxprice*$num;
            }else{
                $total_price = $price*$num;
            }
            $cartprice = $cartprice + $total_price;
            
        }
        $response['cartprice'] = $cartprice;
        $repsonse['code'] = '000000';
        die(json_encode($response));

    }
    /**
     * 订单地址选择
     */
    public function actionOrderaddress()
    {   
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $Address = new Address();
        $addressinfo = $Address->getinfobyuserid($userid);
        return $this->render('orderaddress',['addressinfo'=>$addressinfo]);
    }
    
    //支付宝或微信订单号生成
    public function actionOrderno()
    {    
         $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $order_sn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') .
            substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        return $order_sn;
    }
}

