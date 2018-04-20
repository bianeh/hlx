<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination;  
use yii\web\Controller;
use backend\models\Goodsmodel;
use backend\models\Packing;
/**
 * 商品管理
 */
class GoodsmodelController extends BaseController
{   
    public $enableCsrfValidation=false;
    /**
     *商品管理页面
     */
    public function actionIndex()
    {   
        return $this->render('index');  
    }
    /**
     * 获取商品规格信息
     */
    public function actionGoodsmodelinfo()
    {
        $goodsid = $_GET['Id'];
        $Goodsmodel = new Goodsmodel();
        $goodsmodelinfo = $Goodsmodel->getinfobygoodsid($goodsid);
        return $this->render('goodsmodelinfo',
                [
                    'goodsmodelinfo'=>$goodsmodelinfo,
                    'goodsid'=>$goodsid
                ]);  
    }
    /**
     * 新增规格
     */
    public function actionAdd()
    {   
        
        if(Yii::$app->request->post())
        {
            $request = Yii::$app->request->post();
            $files = $_FILES;
            $info_name = $request['info']['name'];
            $info_price = $request['info']['price'];
            $info_storage = $request['info']['storage']; 
            $info_packingid = $request['info']['packingid'];
            $goodsid = $request['goodsid'];
            for($i=0;$i<count($info_name);$i++)
            {
                $goodsmodel['name'] = $info_name[$i];
                $goodsmodel['price'] = $info_price[$i];
                $goodsmodel['storage'] = $info_storage[$i];
                $goodsmodel['packingid'] = $info_packingid[$i];
                $goodsmodel['goodsid'] = $goodsid;
                $key = 'specpic'.$i;
                $goodsmodel['pic'] = file_get_contents($_FILES[$key]['tmp_name']);
                $Goodsmodel = new Goodsmodel();
                $Goodsmodel->addspecs($goodsmodel);
            }
     
            for($i=0;$i<15;$i++)
            {
                $keyj = 'bigpic'.$i;
                if(isset($_FILES[$keyj]['tmp_name']))
                {
                    $images['pic'] = file_get_contents($_FILES[$keyj]['tmp_name']);
                    $images['busnum'] = $goodsid;
                    $Images = new Images();
                    $Images->addimages($images);
                }
            }
            die("<script>alert('成功添加！');history.back()</script>");
            
        }
        $Packing = new Packing();
        $packingInfo = $Packing->getinfo();
        $packingstr = '';
        foreach ($packingInfo as $key => $value) 
        {   
           $packingstr = $packingstr."<option>".$value['name']."</option>";
        }
        $goodsid = $_GET['goodsid'];
        return $this->render('add',[
            'packingstr'=>$packingstr,
            'goodsid'=>$goodsid
                ]);
    }
    /**
     * 规格参数修改编辑
     */
    public function actionEdit()
    {    
         if($_GET)
         {
            $Id = $_GET['Id'];
            $Goodsmodel = new Goodsmodel();
            $goodsmodelinfo = $Goodsmodel->getoneinfo($Id);
            $Packing = new Packing();
            $packingInfo = $Packing->getinfo();
            $packingstr = '';
            foreach ($packingInfo as $key => $value) 
            {   
               $packingstr = $packingstr."<option>".$value['name']."</option>";
            }
            return $this->render("edit",[
                'goodsmodelinfo'=>$goodsmodelinfo,
                'packingstr'=>$packingstr
                    ]);
         }
    }
    /**
     * 删除商品规格信息
     */
    public function actionDeletedata()
    {
        if($_REQUEST['ids'] && !empty($_REQUEST['ids']))
        {
            $ids = $_REQUEST['ids'];
            $ids = explode(',',$ids);
            for($i=0;$i<count($ids);$i++)
            {   
                $Id = $ids[$i];
                $goodsmodel = new Goodsmodel();
                $goodsmodel->deletedatabyid($Id);
            }
            echo "<script>alert('成功删除商品规格信息！');history.back();</script>";
        }
    }
}


