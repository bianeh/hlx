<?php
//FROM FUIOU_LEO
class SignUtil {
	 /** 
     * RSA加签 
     * @param $paramStr 
     * @param $priKey 
     * @return string 
     */  
    public static function sign($paramStr, $priKey){		
		$dataGBK = iconv('UTF-8', 'GBK', $paramStr);
        $sign = '';
        //将字符串格式公私钥转为pem格式公私钥
        $priKeyPem = SignUtil::format_secret_key($priKey, 'pri');
        //转换为openssl密钥，必须是没有经过pkcs8转换的私钥
        $res = openssl_get_privatekey($priKeyPem);
        //调用openssl内置签名方法，生成签名$sign
        openssl_sign($dataGBK, $sign, $res,OPENSSL_ALGO_MD5);
        //释放资源
        openssl_free_key($res);
        //base64编码签名
        $signBase64 = base64_encode($sign);
        //url编码签名
        // $signs = urlencode($signBase64);
        return  $signBase64;		
    }  
	
     /** 
     * RSA验签 
     * @param $paramStr 
     * @param $sign 
     * @param $pubKey 
     * @return bool 
     */  
    public static function verify($paramStr, $sign, $pubKey)  {
		$dataGBK = iconv('UTF-8', 'GBK', $paramStr);		
        //将字符串格式公私钥转为pem格式公私钥  
        $pubKeyPem = SignUtil::format_secret_key($pubKey, 'pub');  
        //转换为openssl密钥，必须是没有经过pkcs8转换的公钥  
        $res = openssl_get_publickey($pubKeyPem);  
        //url解码签名  
        //$signUrl = urldecode($sign);  
        //base64解码签名  
        $signBase64 = base64_decode($sign);  
        //调用openssl内置方法验签，返回bool值  
        $result = (bool)openssl_verify($dataGBK, $signBase64, $res,OPENSSL_ALGO_MD5);  
        //释放资源  
        openssl_free_key($res);  
        //返回资源是否成功  
        return $result;  
    }  
    
	 /** 
     * 将字符串格式公私钥格式化为pem格式公私钥 
     * @param $secret_key 
     * @param $type 
     * @return string 
     */  
    public static function format_secret_key($secret_key, $type){  
        //64个英文字符后接换行符"\n",最后再接换行符"\n"  
        $key = (wordwrap($secret_key, 64, "\n", true))."\n";  
        //添加pem格式头和尾  
        if ($type == 'pub') {  
            $pem_key = "-----BEGIN PUBLIC KEY-----\n" . $key . "-----END PUBLIC KEY-----\n";  
        }else if ($type == 'pri') {  
            $pem_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $key . "-----END RSA PRIVATE KEY-----\n";  
        }else{  
            echo('公私钥类型非法');  
            exit();  
        }  
        return $pem_key;  
    }  
}

$keyStr='MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBAJMr8NnRV7ve7Y5FEBium/TsU0fK5NvzvFpsYxPAQhBXY+EN0Bi2JEg790C1njk9Q3U36u2JBDHAiDIomlgh6wWkJsFn7dghV/fCWSX1VVJ+dRINZy1432fRaJ8GqspvMneBpeLjBe94IwlWKpN+AOR+BNX8QL/uHmfCPlVQXos9AgMBAAECgYAzqbMs434m50UBMmFKKNF6kxNRGnpodBFktLO7FTybu/HF6TFp21a1PMe5IYhfk5AAsBZ6OCUOygWFhhdYZN+5W+dweF3kp1rLE4y5CjwqNlk/g22TAndf9znh/ltHFLvITToqu/eh/34tE1gyNxRbsi1olw/1wv8ZRjM3vtM9QQJBANvNwFq+CJHUyFzkXQB7+ycQFnY8wDq8Uw2Hv9ZMjgIntH7FSlJtdu5mAYPPo6f74slO5tFUMNP7EVppqsjYaNkCQQCraD6iKHo+OIlvvYIKiMXatJGD7N1GNhq5CrhUNPWLHwv/Ih2D3JJdF8IUZOPIJfUxTfM2fZYI+EVdsv6s4RcFAkAGjNYbnighOGcUJZYD6q3sVxVkRqEv3ubWs2HrH/Lna4l8caKqXCq8JfwLkod8/QugFiLYwBqIZqX4vMdjHtfZAkBsAl9dbWZCaPvpxp/4JWGPxDLhz9NLV/KU4bVvkoObq++yUHwKyGYOdVcd5MlIKOsNq5Hzp0Vw14lWVuF2bMxFAkBuNrZksvUULNIaWDKd4rQ6GVzUxXuIZW0ZE6atHYDiXPB4jVAjKRtLxZAV1qH9cr1zNJlcg+RbGYUdF9t4A9n5';
$pubKey='MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCTK/DZ0Ve73u2ORRAYrpv07FNHyuTb87xabGMTwEIQV2PhDdAYtiRIO/dAtZ45PUN1N+rtiQQxwIgyKJpYIesFpCbBZ+3YIVf3wlkl9VVSfnUSDWcteN9n0WifBqrKbzJ3gaXi4wXveCMJViqTfgDkfgTV/EC/7h5nwj5VUF6LPQIDAQAB';
$dataStr='0002230F0348879|13512450021|18010218135650417688|1|||1||http://www-1.fuiou.com:18888/pay_test/dirpay_result.jsp|http://www-1.fuiou.com:18888/pay_test/dirpay_result.jsp';

$signStr=SignUtil::sign($dataStr,$keyStr);

echo "signStr=>".$signStr,"\n";
$res=SignUtil::verify($dataStr,$signStr,$pubKey);
if($res==1){
	print_r($dataStr);
echo 'verify====OK';
}else{
echo 'verify====Fail';	
}
?>