<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination; 
use yii\web\Controller;
use backend\models\Wapnotice;
/**
 * 后台首页
 */
class WapnoticeController extends BaseController
{   public $enableCsrfValidation=false;
    public function actionIndex()
    {   
        $con = [];
        if($_GET && !empty($_GET))
        {   
            $name = isset($_GET['title']) ? $_GET['title'] : '';
            $con['title'] = isset($name) && $name !='' ? $name : '';
            $con = array_filter($con);
        }
        $query = Wapnotice::find();  
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
    //添加公告
    public function actionAdd()
    {  
        if($_POST)
        {  
            $data = $_POST;
            $data['createtime'] = date("Y-m-d H:i:s");
            $Wapnotice = new Wapnotice();
            $res = $Wapnotice->addnotice($data);
            if($res)
            {
                die("<script>alert('成功添加公告告！');history.back()</script>");
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
     * 删除wap端公告信息
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
                $Wapnotice = new Wapnotice();
                $Wapnotice->deletedata($Id); 
            }
            echo "<script>alert('成功删除wap端公告信息！');history.back();</script>";
        }
    }
}



