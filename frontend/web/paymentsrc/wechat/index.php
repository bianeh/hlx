<?php
// $money= $_GET['paymoney']*100;//充值金额
$money = 1;
$orderno = $_GET['orderno'];
$userip = $_SERVER['REMOTE_ADDR'];          //获得用户设备IP 自己网上百度去
$appid  = "wxc421c396af4aac54";                  //应用APPID
$mch_id = "1487864552";                  //微信支付商户号
$key    = "wuchunjin12251225122512251225122";                 //微信商户API密钥
$rand = rand(00000,99999);
$out_trade_no = $orderno;//平台内部订单号
$nonce_str = createNoncestr();//随机字符串
$body = "福建大南山茶业微信支付";//内容
$total_fee = $money; //金额
$spbill_create_ip = $userip; //IP
$notify_url = "http://m.hailanxiang.cn:8082/payment/wechatnotify"; //回调地址
$trade_type = 'MWEB';//交易类型 具体看API 里面有详细介绍
$scene_info ='{"h5_info":{"type":"Wap","wap_url":"http://www.baidu.com","wap_name":"支付"}}';//场景信息 必要参数
$signA ="appid=$appid&attach=$out_trade_no&body=$body&mch_id=$mch_id&nonce_str=$nonce_str&notify_url=$notify_url&out_trade_no=$out_trade_no&scene_info=$scene_info&spbill_create_ip=$spbill_create_ip&total_fee=$total_fee&trade_type=$trade_type";
$strSignTmp = $signA."&key=$key"; //拼接字符串  注意顺序微信有个测试网址 顺序按照他的来 直接点下面的校正测试 包括下面XML  是否正确

$sign = strtoupper(MD5($strSignTmp)); // MD5 后转换成大写

$post_data = "<xml>
                   <appid>$appid</appid>
                   <mch_id>$mch_id</mch_id>
                   <body>$body</body>
                   <out_trade_no>$out_trade_no</out_trade_no>
                   <total_fee>$total_fee</total_fee>
                   <spbill_create_ip>$spbill_create_ip</spbill_create_ip>
                   <notify_url>$notify_url</notify_url>
                   <trade_type>$trade_type</trade_type>
                   <scene_info>$scene_info</scene_info>
                   <attach>$out_trade_no</attach>
                   <nonce_str>$nonce_str</nonce_str>
                   <sign>$sign</sign>
               </xml>";//拼接成XML 格式
$url = "https://api.mch.weixin.qq.com/pay/unifiedorder";//微信传参地址

// echo $post_data;
// echo $url;
// exit();
$dataxml = postXmlCurl($post_data,$url);//后台POST微信传参地址  同时取得微信返回的参数    POST 方法我写下面了

$objectxml = (array)simplexml_load_string($dataxml,'SimpleXMLElement', LIBXML_NOCDATA); //将微信返回的XML 转换成数组

function createNoncestr( $length = 32 ){
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $str ="";
    for ( $i = 0; $i < $length; $i++ )  {
        $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
    }
    return $str;
}
function postXmlCurl($xml,$url,$second = 30){
    $ch = curl_init();
    //设置超时
    curl_setopt($ch, CURLOPT_TIMEOUT, $second);
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    //设置header
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //post提交方式
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    //运行curl
    $data = curl_exec($ch);
    //返回结果
    if($data){
        curl_close($ch);
        return $data;
    }else{
        $error = curl_errno($ch);
        curl_close($ch);
        echo "curl出错，错误码:$error"."<br>";
    }
}
function get_client_ip($type = 0) {
    $type       =  $type ? 1 : 0;
    $ip         =   '59.110.234.49';

    if ($ip !== 'unknown') return $ip[$type];
    if($_SERVER['HTTP_X_REAL_IP']){//nginx 代理模式下，获取客户端真实IP
        $ip=$_SERVER['HTTP_X_REAL_IP'];
    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {//客户端的ip
        $ip     =   $_SERVER['HTTP_CLIENT_IP'];
    }elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {//浏览当前页面的用户计算机的网关
        $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos    =   array_search('unknown',$arr);
        if(false !== $pos) unset($arr[$pos]);
        $ip     =   trim($arr[0]);
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];//浏览当前页面的用户计算机的ip地址
    }else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }

    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);

    return $ip[$type];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>微信h5支付</title>
    <link rel="stylesheet" href="">
    <style>
        body{
            padding:0px;
            margin:0px auto;
        }
        h3{
            text-align:center;
            color:#e0e0e0;
            margin:0px;
            background:#1c6a9e;
            padding:5px;
        }
        p{
            margin:20px auto;
            text-align:center;
            font-size:20px;
            color: #165565;
        }
        p span{
            font-size:17px;
            color:#00CC33;
        }
        a{
            text-decoration:none;
            display:block;
            text-align:center;
            color:#fff;
            font-size:16px;
            font-weight:bold;
            background:#00CC00;
            padding:5px;
            height:40px;
            line-height:40px;
        }
    </style>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
   <!-- <form id="form1" name="form1" action="<?php echo $objectxml['mweb_url'] ?>" method="get"> -->
    <!-- <p>支付金额：<span><?php echo $total_fee/100 ?></span></p>
    <a href="<?php echo $objectxml['mweb_url'] ?>">去支付</a>
    <br>
    <a href="http://m.hailanxiang.cn:8082/usercenter/index">返回用户中心</a> -->
  <!--  </form> -->
   <!-- <script language='javascript'>document.form1.submit();</script> -->
</body>
</html>
<script type="text/javascript">
    window.onload=function(){
        window.location.href="<?php echo $objectxml['mweb_url'] ?>";
    }
</script>
