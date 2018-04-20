<?php
//FROM FUIOU_LEO
class SignUtil {
	 /** 
     * RSA��ǩ 
     * @param $paramStr 
     * @param $priKey 
     * @return string 
     */  
    public static function sign($paramStr, $priKey){		
		$dataGBK = iconv('UTF-8', 'GBK', $paramStr);
        $sign = '';
        //���ַ�����ʽ��˽ԿתΪpem��ʽ��˽Կ
        $priKeyPem = SignUtil::format_secret_key($priKey, 'pri');
        //ת��Ϊopenssl��Կ��������û�о���pkcs8ת����˽Կ
        $res = openssl_get_privatekey($priKeyPem);
        //����openssl����ǩ������������ǩ��$sign
        openssl_sign($dataGBK, $sign, $res,OPENSSL_ALGO_MD5);
        //�ͷ���Դ
        openssl_free_key($res);
        //base64����ǩ��
        $signBase64 = base64_encode($sign);
        //url����ǩ��
        // $signs = urlencode($signBase64);
        return  $signBase64;		
    }  
	
     /** 
     * RSA��ǩ 
     * @param $paramStr 
     * @param $sign 
     * @param $pubKey 
     * @return bool 
     */  
    public static function verify($paramStr, $sign, $pubKey)  {
		$dataGBK = iconv('UTF-8', 'GBK', $paramStr);		
        //���ַ�����ʽ��˽ԿתΪpem��ʽ��˽Կ  
        $pubKeyPem = SignUtil::format_secret_key($pubKey, 'pub');  
        //ת��Ϊopenssl��Կ��������û�о���pkcs8ת���Ĺ�Կ  
        $res = openssl_get_publickey($pubKeyPem);  
        //url����ǩ��  
        //$signUrl = urldecode($sign);  
        //base64����ǩ��  
        $signBase64 = base64_decode($sign);  
        //����openssl���÷�����ǩ������boolֵ  
        $result = (bool)openssl_verify($dataGBK, $signBase64, $res,OPENSSL_ALGO_MD5);  
        //�ͷ���Դ  
        openssl_free_key($res);  
        //������Դ�Ƿ�ɹ�  
        return $result;  
    }  
    
	 /** 
     * ���ַ�����ʽ��˽Կ��ʽ��Ϊpem��ʽ��˽Կ 
     * @param $secret_key 
     * @param $type 
     * @return string 
     */  
    public static function format_secret_key($secret_key, $type){  
        //64��Ӣ���ַ���ӻ��з�"\n",����ٽӻ��з�"\n"  
        $key = (wordwrap($secret_key, 64, "\n", true))."\n";  
        //���pem��ʽͷ��β  
        if ($type == 'pub') {  
            $pem_key = "-----BEGIN PUBLIC KEY-----\n" . $key . "-----END PUBLIC KEY-----\n";  
        }else if ($type == 'pri') {  
            $pem_key = "-----BEGIN RSA PRIVATE KEY-----\n" . $key . "-----END RSA PRIVATE KEY-----\n";  
        }else{  
            echo('��˽Կ���ͷǷ�');  
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