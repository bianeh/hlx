<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination;  
use yii\web\Controller;
use backend\models\Manager;
use backend\models\form\managerForm;
use backend\controllers\BaseController;
/**
 * 后台管理员管理
 */
class ManagerController extends BaseController
{   
    public $enableCsrfValidation=false;
    /**
     *管理员列表
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
        $query = Manager::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
        return $this->render('index', [  
            'managerinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
    /**
     * 添加代销商页面
     */
    public function actionAdd()
    {   
        $model = new managerForm();
        if ($model->load(Yii::$app->request->post()) && $model->checkdata()) 
        {
            $info = Yii::$app->request->post();
            $info['managerForm']['date'] = date('Y-m-d H:i:s',time());
            $info['managerForm']['highermanager'] = $this->_data['Id'];
            $manager = new Manager();
            $res = $manager->managerdatasave($info['managerForm']);
            if($res)
            {
                echo "<script>alert('添加代销商信息成功！');history.back();</script>";
            }
        }
        return $this->render('add', [
            'model' => $model,
            'userinfo' => $this->_data,
        ]);
    }
    /**
     * 编辑代销商页面
     */
    public function actionEdit()
    {   
        if($_REQUEST['Id'] && !empty($_REQUEST['Id']))
        {
            $Id = $_REQUEST['Id'];
            $Manager = new Manager();
            $managerinfo = $Manager->getmanagerInfoByid($Id);
        }
        $model = new managerForm();
        if ($model->load(Yii::$app->request->post()) && $model->checkdata()) 
        {
            $info = Yii::$app->request->post();
            $manager = new Manager();
            $res = $manager->managerdatasave($info['managerForm']);
            if($res)
            {
                echo "<script>alert('编辑代销商信息成功！');history.back();</script>";
            }
        }
        return $this->render('edit', [
            'model' => $model,
            'managerinfo' => $managerinfo,
        ]);
    }
    /**
     * 删除代销商信息
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
                $manager = new Manager();
                $manager->deletedata($Id); 
            }
            echo "<script>alert('成功删除代销商信息！');history.back();</script>";
        }
    }
    
     /**
      * 功能设计
      */
    public function actionSetfunc()
    {   
        $info = Yii::$app->request->post();
        $manager = new Manager();
        $res = $manager->managerdataupdateaddutpwd($info['info']);
        if($res)
        {
            echo "<script>alert('成功设置功能！');history.back();</script>";
        }
    }
}
