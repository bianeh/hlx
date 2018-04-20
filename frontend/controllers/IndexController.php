<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Goods;
use frontend\models\Images;
use frontend\models\Wapadv;
use frontend\models\Wapnotice;
use frontend\models\Goodsmodel;
use frontend\models\Tea;
use frontend\models\Packing;
class IndexController extends Controller
{
    
    public $enableCsrfValidation=false;
    /**
     * @var string
     */
    public $layout = 'main1';

    public function actionIndex()
    {
       
        $Images = new Images();
        $Wapadv = new Wapadv();
        $Wapnotice = new Wapnotice();
        $wapnoticeinfo = $Wapnotice->getoneinfo();
        $wapadvinfo = $Wapadv->getinfo();
        $wapzwinfo = $Wapadv->getzwinfo();
        $con['valid'] = 1;
        // if($_GET && !empty($_GET))
        // {   
        //     $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';
        //     $con['name'] = isset($keywords) && $keywords !='' ? '%'.$keywords.'%' : '';
        //     // $con = array_filter($con);
        // }
       // $con['name'] =  ['like', 'name', $keywords];

        // echo $keywords;
        // exit;

         if(isset($_GET['keywords'])){

              $Goodsinfo = Goods::find()->where($con)->asarray()->andFilterWhere(['like', 'name', $_GET['keywords']])->all(); 


              // $Goodsinfo  =  Goods::findAllBySql('select * from goods where valid = :valid and name like :keywords',array(':keywords'=>$_GET['keywords'],':valid'=>1));
          }else{
             $query = Goods::find();
             $Goodsinfo = $models = $query->where($con)->orderBy('Id DESC')->all(); 
          }
          // echo "<pre>";
          // print_r($Goodsinfo);
          // exit;
            
        foreach ($Goodsinfo as $key => $value) {
               $goodsid = $value['Id'];
               $Goodsmodel = new Goodsmodel();
               $goodsmodelinfo = $Goodsmodel->getgoodsonemodel($goodsid);
               $Goodsinfo[$key]['accountprice'] = $goodsmodelinfo['price'];

               $packingid = $goodsmodelinfo['packingid'];
               $Packing = new Packing();
               $packinfo = $Packing->getoneinfo($packingid);
               $boxprice = $packinfo['price'];



               $teaid = $value['teaid'];
               $Tea = new Tea();
               $teainfo = $Tea->getoneinfo($teaid);
               $teaprice = $teainfo['price'];
               if(isset($teaprice) && $teaprice < 1000)
               {
                 $Goodsinfo[$key]['teaid'] = $boxprice;
               }else{
                 $Goodsinfo[$key]['teaid'] = 0;
               }
              
              
         } 
        return $this->render('index',['goodsinfo'=>$Goodsinfo,'wapadvinfo'=>$wapadvinfo,'wapnoticeinfo'=>$wapnoticeinfo,'wapzwinfo'=>$wapzwinfo]);
    }
    public function actionSao()
    {
        return $this->render("sao");
    }
    
}
