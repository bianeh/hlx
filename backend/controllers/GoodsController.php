<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination;  
use yii\web\Controller;
use backend\models\form\GoodsForm;
use backend\models\form\GoodsmodelForm;
use backend\models\Manager;
use backend\models\Category;
use backend\models\Packing;
use backend\models\Freight;
use backend\models\Images;
use backend\models\Goods;
use backend\models\Goodsmodel;
use backend\models\Tea;
/**
 * 商品管理
 */
class GoodsController extends BaseController
{   
    public $enableCsrfValidation=false;
    /**
     *商品管理页面
     */
    public function actionIndex()
    {   


        $con = [];
        if($_GET && !empty($_GET))
        {   
            $username = isset($_GET['username']) ? $_GET['username'] : '';
            $con['username'] = isset($username) && $username !='' ? $username : '';
            $con = array_filter($con);
        }
        $query = Goods::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
        return $this->render('index', [  
            'goodsinfo' => $models,  
            'pages' => $pages,  
        ]);
    }
    /**
     * 添加产品
     */
    public function actionAdd()
    {   
        $model = new GoodsForm();
        $Catgory = new Category();
        $Packing = new Packing();
        $Freight = new Freight();
        $Tea = new Tea();
        $bigInfo = $Catgory->getgoodscategoryinfo(0);
        $smallInfo = $Catgory->getgoodscategoryinfo(1);
        $packingInfo = $Packing->getinfo();
        $freightInfo = $Freight->getinfo();
        $teaInfo = $Tea->getinfo();
        if (Yii::$app->request->post()) 
        {  
            $request = Yii::$app->request->post();
            $files = $_FILES;
            $goods['name'] = $request['name'];
            $goods['big'] = $request['big'];
            $goods['small'] = $request['small'];
            $goods['description'] = $request['description'];
            $goods['productdate'] = $request['productdate'];
            $goods['productcompany'] = $request['productcompany'];
            $goods['licensenum'] = $request['licensenum'];
            $goods['productaddress'] = $request['productaddress'];
            $goods['storagemethod'] = $request['storagemethod'];
            $goods['marketprice'] = $request['marketprice'];
            $goods['accountprice'] = $request['accountprice'];
            $goods['material'] = $request['material'];
            $goods['standard'] = $request['standard'];
            $goods['total_sell'] = $request['total_sell'];
            $goods['month_sell'] = $request['month_sell'];
            $goods['teaid'] = $request['teaid'];
            $goods['freightid'] = $request['freightid'];
            $goods['date'] = date("Y-m-d H:i:s",time());
            $Goods = new Goods();
            $goodsid = $Goods->addgoods($goods);
            $info_name = $request['info']['name'];
            $info_price = $request['info']['price'];
            $info_storage = $request['info']['storage']; 
            $info_packingid = $request['info']['packingid'];
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
                    $images['type'] = 0;
                    $images['typename'] = '茶叶';
                    $Images = new Images();
                    $Images->addimages($images);
                }
            }
            die("<script>window.location.href='/goods/index'</script>");
        }
        $packingstr = '';
        foreach ($packingInfo as $key => $value) 
        {   
           $packingstr = $packingstr."<option value=".$value['Id'].">".$value['name']."</option>";
        }
        return $this->render('add', [
            'model' => $model,
            'bigInfo' => $bigInfo,
            'packingstr' => $packingstr,
            'smallInfo' => $smallInfo,
            'freightInfo' => $freightInfo,
            'teaInfo' => $teaInfo,
        ]);
    }
    /**
     * 编辑产品
     */
    public function actionEdit()
    {     
        
        if (Yii::$app->request->post()) 
        {  
            $request = Yii::$app->request->post();
            $files = $_FILES;
            $goods['name'] = $request['name'];
            $goods['big'] = $request['big'];
            $goods['Id'] = $request['Id'];
            $goods['small'] = $request['small'];
            $goods['description'] = $request['description'];
            $goods['productdate'] = $request['productdate'];
            $goods['productcompany'] = $request['productcompany'];
            $goods['licensenum'] = $request['licensenum'];
            $goods['productaddress'] = $request['productaddress'];
            $goods['storagemethod'] = $request['storagemethod'];
            $goods['marketprice'] = $request['marketprice'];
            $goods['accountprice'] = $request['accountprice'];
            $goods['material'] = $request['material'];
            $goods['standard'] = $request['standard'];
            $goods['total_sell'] = $request['total_sell'];
            $goods['month_sell'] = $request['month_sell'];
            $goods['teaid'] = $request['teaid'];
            $goods['freightid'] = $request['freightid'];
            $goods['date'] = date("Y-m-d H:i:s",time());
            $Goods = new Goods();
            $goodsid = $Goods->editgoods($goods);
            die("<script>window.location.href='/goods/index'</script>");
        }

        $id = $_GET['id'];
        $Goods = new Goods();
        $goodsinfo = $Goods->getoneinfo($id);
        $model = new GoodsForm();
        $Catgory = new Category();
        $Packing = new Packing();
        $Freight = new Freight();
        $Tea = new Tea();
        $bigInfo = $Catgory->getgoodscategoryinfo(0);
        $smallInfo = $Catgory->getgoodscategoryinfo(1);
        $packingInfo = $Packing->getinfo();
        $freightInfo = $Freight->getinfo();
        $teaInfo = $Tea->getinfo();
        $packingstr = '';
        foreach ($packingInfo as $key => $value) 
        {   
           $packingstr = $packingstr."<option>".$value['name']."</option>";
        }
        return $this->render('edit', [
            'model' => $model,
            'bigInfo' => $bigInfo,
            'packingstr' => $packingstr,
            'smallInfo' => $smallInfo,
            'freightInfo' => $freightInfo,
            'teaInfo' => $teaInfo,
            'goodsinfo'=>$goodsinfo
        ]);
    }
    /**
     * 获取产品分类小类
     */
    public function getsmallcate()
    {
        $name = Yii::$app->request->post('name');
        $bigInfo = $Catgory->getchildcategoryinfo($name);
        $str = '';
        foreach ($bigInfo as $key => $value) 
        {
            $str = $str."<option>".$value['name']."</option>";
        }
        echo $str;   
    }
    
    /**
     * 删除商品信息
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
                $goods = new Goods();
                $goodsmodel = new Goodsmodel();
                $goods->deletedata($Id); 
                $goodsmodel->deletedata($Id);
            }
            echo "<script>alert('成功删除商品信息！');history.back();</script>";
        }
    }
    //上架下架产品操作
    public function actionUdact()
    {
        $Id = $_POST['Id'];
        $valid = $_POST['valid'];
        if($valid == 1)
        {
            $response['msg'] = '上架成功！';
        }else{
            $response['msg'] = '下架成功！';
        }
        $Goods = new Goods();
        $res = $Goods->udact($Id,$valid);
        if($res)
        {
            $response['code'] = '000000';
        }
        die(json_encode($response));
    }
    
}

