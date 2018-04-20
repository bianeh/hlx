<?php
namespace frontend\controllers;
use frontend\models\Goodsmodel;
use frontend\models\China;
use frontend\models\Address;
class AddressController extends BaseController
{   
    public $enableCsrfValidation = false;//关闭csrf攻击，接受ajax请求
    public $layout = 'main1';
    public function actionIndex()
    {   
        $userInfo = $_SESSION['userinfo'];
        $userid = $userInfo['Id'];
        $Address = new Address();
        $addressinfo = $Address->getinfobyuserid($userid);
        return $this->render('index',['addressinfo'=>$addressinfo]);
    }
    public function actionAdd()
    {
        return $this->render('add');
    }
    public function actionEdit()
    {   
        $Id = $_GET['Id'];
        $Address = new Address();
        $addressinfo = $Address->getinfobyid($Id);
        return $this->render('edit',['addressinfo'=>$addressinfo]);
    }
    public function actionGetprovince()
    {   
        $pid = 0;
        $China = new China();
        $chinainfo = $China->getinfo($pid);
        $str = "<option value=''>请选择</option>";
        foreach ($chinainfo as $key => $value) 
        {   
            $name = $value['Name'];
            $id = $value['Id'];
            if($id != 0)
            {
               $str = $str."<option class='pro' value=".$id.">".$name."</option>";
            }
        }
        echo $str;
    }
    public function actionGetcity()
    {   
        $pid = $_POST['Id'];
        $China = new China();
        $chinainfo = $China->getinfo($pid);
        $str = "<option value=''>请选择</option>";
        foreach ($chinainfo as $key => $value) 
        {   
            $name = $value['Name'];
            $id = $value['Id'];
            if($id != 0)
            {
               $str = $str."<option class='city' value=".$id.">".$name."</option>";
            }
        }
        echo $str;
    }
    public function actionGetarea()
    {   
        $pid = $_POST['Id'];
        $China = new China();

        $addressinfo = $China->getinfobyid($pid);




        $chinainfo = $China->getinfo($pid);
        if(!empty($chinainfo)){

            $str = "<option value=''>请选择</option>";
            foreach ($chinainfo as $key => $value) 
            {   
                $name = $value['Name'];
                $id = $value['Id'];
                if($id != 0 && $name != '市辖区')
                {
                   $str = $str."<option class='ara' value=".$id.">".$name."</option>";
                }
            }



            $sxq = $chinainfo[0]['Name'];
            if($sxq == "市辖区")
            {   
                $Pid = $chinainfo[0]['Id'];
                $chinainfo = $China->getinfo($Pid);
                foreach ($chinainfo as $key => $value) 
                {   
                    $name = $value['Name'];
                    $id = $value['Id'];
                    if($id != 0)
                    {
                       $str = $str."<option class='ara' value=".$id.">".$name."</option>";
                    }
                }
            }
            
        }else{
            $name = $addressinfo['Name'];
            $id = $addressinfo['Id'];
            $str = "<option value=''>请选择</option>";
            $str = $str."<option class='ara' value=".$id.">".$name."</option>";

        }
        echo $str;
    }
    public function actionGettown()
    {   
        $pid = $_POST['Id'];
        $China = new China();
        $chinainfo = $China->getinfo($pid);
        $sxq = $chinainfo[0]['Name'];
       
            $str = "<option value=''>请选择</option>";
            foreach ($chinainfo as $key => $value) 
            {   
                $name = $value['Name'];
                $id = $value['Id'];
                if($id != 0)
                {
                   $str = $str."<option class='ara' value=".$id.">".$name."</option>";
                }
            }

        
        echo $str;
    }
    /**
     * 添加地址
     */
    public function actionDoaddaddress()
    {
        if($_POST)
        {   
            $userInfo = $_SESSION['userinfo'];
            $linker = $_POST['linker'];
            $phone = $_POST['phone'];
            $detail = $_POST['detail'];
            $isdefault = $_POST['isdefault'];
            $userid = $userInfo['Id'];
            if($isdefault == 1)
            {
               $Address = new Address();
               $Address->updatedefault($userid);
            }
            $province = $_POST['province'];
            $city = $_POST['city'];
            $area = $_POST['area'];
            
            $China = new China();
            $provinceInfo = $China->getinfobyid($province);
            $cityInfo = $China->getinfobyid($city);
            if($area)
            {
                $areaInfo = $China->getinfobyid($area);
                $areaname = $areaInfo['Name'];
            }
            $provincename = $provinceInfo['Name'];
            $cityname = $cityInfo['Name'];
            
            if(!empty($areaname))
            {
               $data['address'] = $provincename.$cityname.$areaname;
            }else{
               $data['address'] = $provincename.$cityname;
            }
            $data['userid'] = $userInfo['Id'];
            $data['linker'] = $linker;
            $data['isdefault'] = $isdefault;
            $data['phone'] = $phone;
            $data['detail'] = $detail;
            $Address = new Address();
            $res = $Address->addaddress($data);
            if($res)
            {
                die("<script>alert('成功添加地址！');history.go(-2);</script>");
            }
        }
    }
    
     /**
     * 添加地址
     */
    public function actionDoeditaddress()
    {
        if($_POST)
        {   
            $userInfo = $_SESSION['userinfo'];
            $linker = $_POST['linker'];
            $phone = $_POST['phone'];
            $Id = $_POST['Id'];
            $detail = $_POST['detail'];
            $isdefault = $_POST['isdefault'];
            $userid = $userInfo['Id'];
            if($isdefault == 1)
            {
               $Address = new Address();
               $Address->updatedefault($userid);
            }
            $province = $_POST['province'];
            $city = $_POST['city'];
            $area = $_POST['area'];
            $China = new China();
            $provinceInfo = $China->getinfobyid($province);
            $cityInfo = $China->getinfobyid($city);
            $areaInfo = $China->getinfobyid($area);
            $provincename = $provinceInfo['Name'];
            $cityname = $cityInfo['Name'];
            $areaname = $areaInfo['Name'];
            $data['address'] = $provincename.$cityname.$areaname;
            $data['userid'] = $userInfo['Id'];
            $data['linker'] = $linker;
            $data['isdefault'] = $isdefault;
            $data['phone'] = $phone;
            $data['detail'] = $detail;
            $data['Id'] = $Id;
            $Address = new Address();
            $res = $Address->editaddress($data);
            if($res)
            {
                die("<script>alert('成功编辑地址！');history.go(-2);</script>");
            }
        }
    }
    public function actionGetaddress()
    {
        $Id = $_POST['Id'];
        $Address = new Address();
        $addressinfo = $Address->getinfobyid($Id);
        die(json_encode($addressinfo));
    }
    //删除地址
    public function actionDelete()
    {
        $Id = $_POST['Id'];
        $address = new Address();
        $address->deletedata($Id);
    }
}



