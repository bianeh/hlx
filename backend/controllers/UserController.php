<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination; 
use yii\web\Controller;
use backend\models\Orderinfo;
use backend\models\Address;
use backend\models\User;
/**
 * 后台首页
 */
class UserController extends BaseController
{
    public function actionIndex()
    {   
        $con = [];
        if($_GET && !empty($_GET))
        {   
            $username = isset($_GET['username']) ? $_GET['username'] : '';
            $con['username'] = isset($username) && $username !='' ? $username : '';
            $con = array_filter($con);
        }
        $query = User::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
        return $this->render('index', [  
            'userinfo' => $models,  
            'pages' => $pages,  
        ]);  
    }
    /**
     * 用户地址信息
     */
    public function actionUseraddress()
    {   
        $con = [];
        if($_GET && !empty($_GET))
        {   
//            $username = isset($_GET['username']) ? $_GET['username'] : '';
//            $con['username'] = isset($username) && $username !='' ? $username : '';
//            $con = array_filter($con);
        }
        $query = Address::find();  
        $countQuery = clone $query;  
        $pageSize = 15;  
        $pages = new Pagination(['totalCount' => $countQuery->where($con)->count(),'pageSize' => $pageSize]);  
        $models = $query->where($con)->offset($pages->offset)  
            ->limit($pages->limit)  
            ->all();  
//        foreach ($models as $key => $value) {
//            $userid = $value['userid'];
//            $User = new User();
//            $useinfo = $User->getuserinfobyuserid($userid);
//            
//           ｒｒｒｒrrrrr
//        }
        return $this->render('useraddress', [  
            'addressinfo' => $models,  
            'pages' => $pages,  
        ]); 
    }
}


