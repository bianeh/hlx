<?php
namespace backend\controllers;
use Yii;
use yii\data\Pagination;  
use yii\web\Controller;
use backend\models\Images;
/**
 * 商品管理
 */
class BigpicController extends BaseController
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
    public function actionBigpicinfo()
    {
        $goodsid = $_GET['Id'];
        $Images = new Images();
        $bigpicinfo = $Images->getallinfo($goodsid);
        return $this->render('bigpicinfo',
                [
                    'bigpicinfo'=>$bigpicinfo,
                    'goodsid'=>$goodsid,
                ]);
    }
    /**
     * 添加大图
     */
    public function actionAdd()
    {   
        if($_POST)
        {   
            $goodsid = $_POST['goodsid'];
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
            
        }
        $goodsid = $_GET['goodsid'];
        return $this->render('add',['goodsid'=>$goodsid]);
    }
    /**
     * 编辑商品大图
     */
    public function actionEdit()
    {  
        if($_POST)
        {  
            $Id = $_POST['Id'];
            $images['pic'] = file_get_contents($_FILES['bigpic0']['tmp_name']);
            $images['Id'] = $Id;
            $Images = new Images();
            $Images->editimages($images);
        }
        $Id = $_GET['Id'];
        return $this->render('edit',['Id'=>$Id]);
    }
    
     /**
     * 删除大图信息
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
                $Images = new Images();
                $Images->deletedata($Id); 
            }
            echo "<script>alert('成功删除大图信息！');history.back();</script>";
        }
    }
}


