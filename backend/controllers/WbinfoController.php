<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination; 
use yii\web\Controller;
use backend\models\Wbinfo;
use backend\models\User;
/**
 * 后台首页
 */
class WbinfoController extends BaseController
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
        $query = Wbinfo::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
        return $this->render('index', [  
            'wbinfo' => $models,  
            'pages' => $pages,  
        ]); 
    }
    //新增站内信
    public function actionAdd()
    {   
        if($_POST)
        {   
            $title = $_POST['title'];
            $info = $_POST['info'];
            $isall = $_POST['isall'];
            if($isall == 1)
            {
                $userinfo = $_POST['userinfo'];
                $userinfo = explode("|", $userinfo);
                for($i=0;$i<count($userinfo);$i++)
                {   
                    $User = new User();
                    $phone = $userinfo[$i];
                    $Userdata = $User->getuserinfobyphone($phone);
                    $data['title'] = $title;
                    $data['info'] = $info;
                    $data['userid'] = $Userdata['Id'];
                    $data['type'] = 1;
                    $data['createtime'] = date("Y-m-d H:i:s");
                    $Wbinfo = new Wbinfo();
                    $Wbinfo ->addwbinfo($data);
                }
            }
            if($isall == 0)
            {
                    // $User = new User();
                    // $Userdata = $User->getinfo();
                    // foreach($Userdata as $key => $value) {
                        $data['title'] = $title;
                        $data['info'] = $info;
                        // $data['userid'] = $value['Id'];
                        $data['type'] = 0;
                        $data['createtime'] = date("Y-m-d H:i:s");
                        $Wbinfo = new Wbinfo();
                        $Wbinfo ->addwbinfo($data);
                    // }   
            }
            die("<script>alert('添加站内信成功！');history.back()</script>");
        }
        return $this->render('add');
    }
    /**
     * 删除站内信信息
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
                $Wbinfo = new Wbinfo();
                $Wbinfo->deletedata($Id); 
            }
            echo "<script>alert('成功删除站内信信息！');history.back();</script>";
        }
    }
}



