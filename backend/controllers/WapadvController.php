<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination; 
use yii\web\Controller;
use backend\models\Wapadv;
use backend\models\Wapadvconfig;
/**
 * 后台首页
 */
class WapadvController extends BaseController
{   public $enableCsrfValidation=false;
    public function actionIndex()
    {   
        $con = [];
        if($_GET && !empty($_GET))
        {   
            $name = isset($_GET['name']) ? $_GET['name'] : '';
            $con['name'] = isset($name) && $name !='' ? $name : '';
            $con = array_filter($con);
        }
        $query = Wapadv::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
        return $this->render('index', [  
            'wapadvinfo' => $models,  
            'pages' => $pages,  
        ]); 
    }
    //添加广告图页面
    public function actionAdd()
    {  
        if($_POST)
        {  
            $data = $_POST;
            $data['pic'] = file_get_contents($_FILES['pic']['tmp_name']);
            $data['createtime'] = date("Y-m-d H:i:s");
            $Wapadv = new Wapadv();
            $res = $Wapadv->addadv($data);
            if($res)
            {
                die("<script>alert('成功添加广告！');history.back()</script>");
            }  
        }
        $Wapadvconfig = new Wapadvconfig();
        $wapadvconfiginfo = $Wapadvconfig->getinfo(0);
        return $this->render('add',['wapadvconfiginfo'=>$wapadvconfiginfo]);
    }
     //编辑广告图页面
    public function actionEdit()
    {  
        if($_POST)
        {  
            $data = $_POST;
            $data['pic'] = file_get_contents($_FILES['pic']['tmp_name']);
            $data['createtime'] = date("Y-m-d H:i:s");
            $Wapadv = new Wapadv();
            $res = $Wapadv->editadv($data);
            if($res)
            {
                die("<script>alert('成功编辑广告！');history.back()</script>");
            }  
        }
        $id = $_GET['id'];
        $wapadv = new Wapadv();
        $wapadvinfo = $wapadv->getonepic($id);
        $type = $wapadvinfo['type'];
        $Wapadvconfig = new Wapadvconfig();
        $wapadvconfigcatinfo = $Wapadvconfig->getinfo($type);
        $Wapadvconfig = new Wapadvconfig();
        $wapadvconfiginfo = $Wapadvconfig->getinfo(0);
        return $this->render('edit',[
            'wapadvconfiginfo'=>$wapadvconfiginfo,
            'wapadvinfo'=>$wapadvinfo,
            'wapadvconfigcatinfo'=>$wapadvconfigcatinfo
                ]);
    }
    public function actionGetadvconfig()
    {
        $pid = $_POST['pid'];
        if($pid != 0)
        {
            $Wapadvconfig = new Wapadvconfig();
            $wapadvconfiginfo = $Wapadvconfig->getinfo($pid);
            //print_r($wapadvconfiginfo);
            // print_r($wapadvconfiginfo);
            $str = "";
            foreach ($wapadvconfiginfo as $key => $value) 
            {
                $name = $value['name'];
                $id = $value['id'];
                $str = $str."<option class='pro' value=".$id.">".$name."</option>";  
            }
            echo $str;
        }
    }
     /**
     * 删除wap端广告信息
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
                $wapadv = new Wapadv();
                $wapadv->deletedata($Id); 
            }
            echo "<script>alert('成功删除wap端广告图片！');history.back();</script>";
        }
    }
}

