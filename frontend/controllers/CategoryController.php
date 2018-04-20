<?php
namespace frontend\controllers;
use frontend\models\Wapnotice;
use frontend\models\Goods;
use frontend\models\Goodsmodel;
use frontend\models\Packing;
use frontend\models\Tea;
class CategoryController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'main1';
    public function actionIndex()
    {  
        $Goods = new Goods();
        $gslcinfo = $Goods->getgoosdinfobycate('高山绿茶');
        $gshcinfo = $Goods->getgoosdinfobycate('高山红茶');
        $gswlinfo = $Goods->getgoosdinfobycate('高山乌龙');
        $gsbcinfo = $Goods->getgoosdinfobycate('高山白茶');
        foreach ($gslcinfo as $key => $value) {
            $Id = $value['Id'];
            $goodsmodel = new Goodsmodel();
            $goodsmodelinfo = $goodsmodel->getgoodsonemodel($Id);

            $teaid = $value['teaid'];
            $Tea = new Tea();
            $teainfo = $Tea->getoneinfo($teaid);
            $teaprice = $teainfo['price'];

            $packingid = $goodsmodelinfo['packingid'];
            $Packing = new Packing();
            $packinfo = $Packing->getoneinfo($packingid);
            $boxprice = $packinfo['price'];
            if(isset($teaprice) && $teaprice < 1000)
            { 
                $gslcinfo[$key]['teaid'] = $boxprice;
               
            }else{
                $gslcinfo[$key]['teaid'] = 0;
            }
            $gslcinfo[$key]['marketprice'] = $goodsmodelinfo['price'];
        }
        foreach ($gshcinfo as $key => $value) {
            $Id = $value['Id'];
            $goodsmodel = new Goodsmodel();
            $goodsmodelinfo = $goodsmodel->getgoodsonemodel($Id);

            $teaid = $value['teaid'];
            $Tea = new Tea();
            $teainfo = $Tea->getoneinfo($teaid);
            $teaprice = $teainfo['price'];

            $packingid = $goodsmodelinfo['packingid'];
            $Packing = new Packing();
            $packinfo = $Packing->getoneinfo($packingid);
            $boxprice = $packinfo['price'];
            if(isset($teaprice) && $teaprice < 1000)
            { 
                $gshcinfo[$key]['teaid'] = $boxprice;
               
            }else{
                $gshcinfo[$key]['teaid'] = 0;
            }
            $gshcinfo[$key]['marketprice'] = $goodsmodelinfo['price'];
        }
        foreach ($gswlinfo as $key => $value) {

            $Id = $value['Id'];
            $goodsmodel = new Goodsmodel();
            $goodsmodelinfo = $goodsmodel->getgoodsonemodel($Id);

            $teaid = $value['teaid'];
            $Tea = new Tea();
            $teainfo = $Tea->getoneinfo($teaid);
            $teaprice = $teainfo['price'];

            $packingid = $goodsmodelinfo['packingid'];
            $Packing = new Packing();
            $packinfo = $Packing->getoneinfo($packingid);
            $boxprice = $packinfo['price'];
            if(isset($teaprice) && $teaprice < 1000)
            { 
                $gswlinfo[$key]['teaid'] = $boxprice;
               
            }else{
                $gswlinfo[$key]['teaid'] = 0;
            }
            $gswlinfo[$key]['marketprice'] = $goodsmodelinfo['price'];
        }
        foreach ($gsbcinfo as $key => $value) {

            $Id = $value['Id'];
            $goodsmodel = new Goodsmodel();
            $goodsmodelinfo = $goodsmodel->getgoodsonemodel($Id);

            $teaid = $value['teaid'];
            $Tea = new Tea();
            $teainfo = $Tea->getoneinfo($teaid);
            $teaprice = $teainfo['price'];

            $packingid = $goodsmodelinfo['packingid'];
            $Packing = new Packing();
            $packinfo = $Packing->getoneinfo($packingid);
            $boxprice = $packinfo['price'];
            if(isset($teaprice) && $teaprice < 1000)
            { 
                $gsbcinfo[$key]['teaid'] = $boxprice;
               
            }else{
                $gsbcinfo[$key]['teaid'] = 0;
            }
            $gsbcinfo[$key]['marketprice'] = $goodsmodelinfo['price'];
        }
        return $this->render('index',['gslcinfo'=>$gslcinfo,'gshcinfo'=>$gshcinfo,'gswlinfo'=>$gswlinfo,'gsbcinfo'=>$gsbcinfo]);
    }
    
}