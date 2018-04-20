<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination; 
use yii\web\Controller;
use backend\models\Store;
use backend\models\Images;
/**
 * 后台首页
 */
class StoreController extends BaseController
{   public $enableCsrfValidation=false;
    public function actionIndex()
    {   
        $con = [];
        if($_GET && !empty($_GET))
        {   
//            $name = isset($_GET['title']) ? $_GET['title'] : '';
//            $con['title'] = isset($name) && $name !='' ? $name : '';
//            $con = array_filter($con);
        }
        $query = Store::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
        return $this->render('index', [  
            'wapnoticeinfo' => $models,  
            'pages' => $pages,  
        ]); 
    }
    //添加体验店
    public function actionAdd()
    {  
        if($_POST)
        {  
            $data = $_POST;
            $Store = new Store();
            $res = $Store->addstore($data);
            $images['pic'] = file_get_contents($_FILES['pic']['tmp_name']);
            $images['busnum'] = $goodsid;
            $images['type'] = 2;
            $images['typename'] = '体验店';
            $Images = new Images();
            $Images->addimages($images);
            if($res)
            {
                die("<script>alert('成功新增体验店！');history.back()</script>");
            }  
        }
        return $this->render('add');
    }
     //编辑公告
    public function actionEdit()
    {  
        if($_POST)
        {  
            $data = $_POST;
            $Wapnotice = new Wapnotice();
            $res = $Wapnotice->editnotice($data);
            if($res)
            {
                die("<script>alert('成功编辑公告！');history.back()</script>");
            }  
        }
        $id = $_GET['id'];
        $Wapnotice = new Wapnotice();
        $wapnoticeinfo = $Wapnotice->getoneinfo($id);
        return $this->render('edit',[
            'wapnoticeinfo'=>$wapnoticeinfo
                ]);
    }
     /**
     * 删除体验店信息
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
                $Store = new Store();
                $Store->deletedata($Id); 
            }
            echo "<script>alert('成功删除信息！');history.back();</script>";
        }
    }
}



