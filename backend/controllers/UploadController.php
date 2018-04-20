<?php
namespace backend\controllers;
use Yii;
use yii\web\UploadedFile;
use backend\controllers\BaseController;
class UploadController extends BaseController
{  
    public $enableCsrfValidation=false;
    public function actionUploadimage()
    {
        $upload = new UploadedFile();
        $tmpFile  = $upload->getInstanceByName($_GET['file_id']);//读取图像上传域,并使用系统上传组件上
        $file_id = $_GET['file_id'];
        $ext = $tmpFile->getExtension();//上传文件的扩展名      
        $file_path = $_SERVER['DOCUMENT_ROOT'].'/data/' . date('Y-m-d') . '/';
        $mode = 0777;
        if (!is_dir($file_path)) 
        {
            $re = mkdir($file_path, 0777, true);
            if (!$re) {
                $result['state'] = '10001';
                $result['message'] = '创建保存图片文件夹失败';
                print_r($result);
            }
        }
        $rename = md5(strtotime(date('Y-m-d H:i:s'),time()));
        $re = $tmpFile->saveAs($file_path.$rename.".".$ext);
        if($re)
        {
            $response['code'] = '000008';
            $response['msg'] = '图片上传成功！';
            $response['img_url'] = $rename.".".$ext;
            $response['rel_img_url'] = '/data/'.date('Y-m-d').'/'.$rename.".".$ext;
            die($this->xml_encode($response));
        }
    }
    
     public function xml_encode($data, $encoding='utf-8', $root='think') 
    {
        $xml    = '<?xml version="1.0" encoding="' . $encoding . '"?>';
        $xml   .= '<' . $root . '>';
        $xml   .= $this->data_to_xml($data);
        $xml   .= '</' . $root . '>';
        return $xml;
    }
    public function data_to_xml($data) 
    {
        $xml = '';
        foreach ($data as $key => $val) 
        {
            is_numeric($key) && $key = "item id=\"$key\"";
            $xml    .=  "<$key>";
            $xml    .=  ( is_array($val) || is_object($val)) ? data_to_xml($val) : $val;
            list($key, ) = explode(' ', $key);
            $xml    .=  "</$key>";
        }
        return $xml;
     }
}

