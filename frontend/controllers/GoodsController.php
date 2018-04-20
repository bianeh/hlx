<?php
namespace frontend\controllers;
use frontend\models\Goodsmodel;
use frontend\models\Goods;
use frontend\models\Images;
use frontend\models\Collect;
use frontend\models\Orderinfo;
use frontend\models\Packing;
use frontend\models\Manager;
use frontend\models\Tea;
class GoodsController extends BaseController
{  
    public $enableCsrfValidation=false;
    public $layout = 'main1';
    public function actionDetail()
    {   
        $goodsid = $_GET['goodsid'];
        $Goodsmodel = new Goodsmodel();
        $Goods = new Goods();
        $Images = new Images();
        $Collect = new Collect();
        $Orderinfo = new Orderinfo();
        $collectnum = $Collect->getcollectnum($goodsid);
        $userinfo = $_SESSION['userinfo'];
        $userid = $userinfo['Id'];
        $phone = $userinfo['phone'];
        $Collect = new Collect();
        $iscollect = $Collect->getinfobyuserid($userid,$goodsid);
        $goodsmodelinfo = $Goodsmodel->getgoodsmodel($goodsid);
        foreach ($goodsmodelinfo as $key => $value) {
            $price = $value['price'];
            //折扣价计算
            $code = $userinfo['code'];
            if($code != '')
            {  
                // $Manager = new Manager();
                // $muser = $Manager->getinfoByphone($phone);
                // $mucount = count($muser);
                // if($mucount == 1)
                // {
                //     $goodsmodelinfo[$key]['discountprice'] = $price*$discount/100;
                // }else{
                //     $Manager = new Manager();
                //     $managerinfo = $Manager->getinfoBytuiguanghao($code);
                //     $discount = $managerinfo['discount'];
                //     $goodsmodelinfo[$key]['discountprice'] = $price*$discount/100;
                // }


                $phone = $userinfo['phone'];
                $Manager = new Manager();
                $muser = $Manager->getinfoByphone($phone);
                $mucount = count($muser);
                if($mucount == 1)
                {   
                  $discount = $muser['discount'];
                  $goodsmodelinfo[$key]['discountprice'] = $price*$discount/100;
                    
                }else{
                  $goodsmodelinfo[$key]['discountprice'] = $price*0.8;
                }

            }else{
                $goodsmodelinfo[$key]['discountprice'] = $price;

            }
        }

        
        $packingid = $goodsmodelinfo[0]['packingid'];
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



        $goodsinfo['description'] = htmlspecialchars_decode(str_replace("/ueditor/php/upload/image","http://www.hailanxiang.cn:8081/ueditor/php/upload/image",$goodsinfo['description']));
        $imagesinfo = $Images->getallinfo($goodsid);
        return $this->render('detail',
                [
                 'goodsmodelinfo'=>$goodsmodelinfo,
                 'goodsinfo'=>$goodsinfo,
                 'imagesinfo'=>$imagesinfo,
                 'collectnum'=>$collectnum,
                 'boxprice'=>$boxprice,
                 'iscollect'=>$iscollect,
//                 'sellernum'=>$sellnum,
                ]);
    }
    public function actionGetspecinfo()
    {
        $specval = $_POST['specval'];
        $goodsid = $_POST['goodsid'];
        $Goodsmodel = new Goodsmodel();
        $specinfo = $Goodsmodel->getoneinfobyname($specval,$goodsid);

        $price = $specinfo['price'];

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
              $specinfo['price'] = $price*$discount/100;
                
            }else{
              $specinfo['price'] = $price*0.8;
            }
            // $specinfo['price'] = $price*0.8;
        }else{
            $specinfo['price'] = $price;

        }
        $packingid = $specinfo['packingid'];
        $Packing = new Packing();
        $packinfo = $Packing->getoneinfo($packingid);
        $boxprice = $packinfo['price'];
        $specinfo['boxprice'] = $boxprice;
        die(json_encode($specinfo));
    }
    /**
     * 产品收藏
     */
    public function actionCollection()
    {   
        $Collect = new Collect();
        $userinfo = $_SESSION['userinfo'];
        $userid = $userinfo['Id'];
        $collectinfo = $Collect->getallinfobyuserid($userid);
        foreach ($collectinfo as $key => $value) {
             $goodsid = $value['goodsid'];
             $Goods = new Goods();
             $goodsinfo = $Goods->getinfobyid($goodsid);
             $name = $goodsinfo['name'];
             $marketprice = $goodsinfo['marketprice'];
             $collectinfo[$key]['name'] = $name;
             

             $Goodsmodel = new Goodsmodel();
             $goodsmodelinfo = $Goodsmodel->getgoodsonemodel($goodsid);
             $price = $goodsmodelinfo['price'];

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

            $collectinfo[$key]['marketprice'] = $price;
            $collectinfo[$key]['total_sell'] = $goodsinfo['total_sell'];
        }  
        return $this->render("collection",['collectinfo'=>$collectinfo]);
    }
    /**
     * 评价
     */
    public function actionEvaluate()
    {
        return $this->render('evaluate');
    }
}

