<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Goods;
use frontend\models\Images;
use frontend\models\Goodsmodel;
use frontend\models\Orderinfo;
header("Content-type: text/html; charset=utf-8");
class PaymentController extends Controller
{
    /**
     * 支付宝支付
     */
    public $enableCsrfValidation=false;
    public $layout = 'main1';
    public function actionDeal()
    {      
           $orderno = $_GET['orderno'];
           $paymoney = $_GET['paymoney'];
           require_once dirname ( dirname ( __FILE__ ) ).'/web/paymentsrc/zhifubao/wappay/service/AlipayTradeService.php';
           require_once dirname ( dirname ( __FILE__ ) ).'/web/paymentsrc/zhifubao/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
           require dirname ( dirname ( __FILE__ ) ).'/web/paymentsrc/zhifubao/config.php';
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = $orderno;
            //订单名称，必填
            $subject = '福建茶叶订单支付';
            //付款金额，必填
            $total_amount = $paymoney;
            //商品描述，可空
            $body = '福建茶叶订单支付';
            //超时时间
            $timeout_express="1m";
            $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);
            $payResponse = new \AlipayTradeService($config);
            $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
            return ;
     }
     /**
      * 支付宝支付成功回调
      */
     public function actionNotify()
     {
            require_once dirname ( dirname ( __FILE__ ) ).'/web/paymentsrc/zhifubao/wappay/service/AlipayTradeService.php';
            require dirname ( dirname ( __FILE__ ) ).'/web/paymentsrc/zhifubao/config.php';
            $arr=$_POST;
            $alipaySevice = new \AlipayTradeService($config); 
            $alipaySevice->writeLog(var_export($_POST,true));
            $result = $alipaySevice->check($arr);
            if($result) {
                    //商户订单号
                    $out_trade_no = $_POST['out_trade_no'];
                    //支付宝交易号
                    $trade_no = $_POST['trade_no'];
                    //交易状态
                    $trade_status = $_POST['trade_status'];

                   if($_POST['trade_status'] == 'TRADE_FINISHED') {

                    }
                   else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {  
                       $Orderinfo = new Orderinfo();
                       $data['state'] = 0;
                       $Orderinfo->updatestate($data,$out_trade_no);
                   }
                   echo "success";

            }else {
                //验证失败
                echo "fail";

            }
     }
     //h5微信支付回调
     public function actionWechatnotify()
     {
           $postStr = file_get_contents("php://input");
           $responseinfo = json_decode(json_encode(simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
           $result_code = $responseinfo['result_code'];
           $return_code = $responseinfo['return_code'];
           $out_trade_no = $responseinfo['out_trade_no'];
           if($result_code == 'SUCCESS' && $return_code == 'SUCCESS')
           {    
                 
                 $Orderinfo = new Orderinfo();
                 $Orderinfo = $Orderinfo->getoneinfo($out_trade_no);
                 $state = $Orderinfo['state'];
                 if($state == 100)
                 {   
                     $Orderinfo = new Orderinfo();
                     $data['state'] = 0;
                     $Orderinfo->updatestate($data,$out_trade_no);
                 }
                
           }
     }
    
}