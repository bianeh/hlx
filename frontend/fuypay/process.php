<?php
	//支付校验
	$order_id = trim($_POST['order_id']); // 商户订单号
	$order_amt = trim($_POST["order_amt"] * 100); // 交易金额，以分为单位
	$card_no = trim($_POST['card_no']);
	$cardholder_name = trim($_POST['cardholder_name']);
	$cert_no = trim($_POST['cert_no']);
	
	$_page_notify_url = "http://118.31.45.231:8090/fuypay/result.php"; // 页面跳转URL
	$_back_notify_url = "http://118.31.45.231:8090/fuypay/notify.php"; // 后台通知URL
	
	$_mchnt_cd = '0002230F0348879'; // 测试商户代码，在正式环境时，更换为正式的商户号
	$cert_type = 0;
	
	$user_id = 1; // 用户id
	
	$data = $_mchnt_cd . '|' . $user_id . '|' . $order_id . '|' . $order_amt . '|' . $card_no . '|' . $cardholder_name . '|' . $cert_type . '|'  . $cert_no . '|' . $_page_notify_url . '|' . $_back_notify_url;
	
	$dataGBK = iconv('UTF-8', 'GBK', $data);
	
	// rsa私钥，在正式环境时，更换为正式的私钥
	$rsaKey = 'MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBAJMr8NnRV7ve7Y5FEBium/TsU0fK5NvzvFpsYxPAQhBXY+EN0Bi2JEg790C1njk9Q3U36u2JBDHAiDIomlgh6wWkJsFn7dghV/fCWSX1VVJ+dRINZy1432fRaJ8GqspvMneBpeLjBe94IwlWKpN+AOR+BNX8QL/uHmfCPlVQXos9AgMBAAECgYAzqbMs434m50UBMmFKKNF6kxNRGnpodBFktLO7FTybu/HF6TFp21a1PMe5IYhfk5AAsBZ6OCUOygWFhhdYZN+5W+dweF3kp1rLE4y5CjwqNlk/g22TAndf9znh/ltHFLvITToqu/eh/34tE1gyNxRbsi1olw/1wv8ZRjM3vtM9QQJBANvNwFq+CJHUyFzkXQB7+ycQFnY8wDq8Uw2Hv9ZMjgIntH7FSlJtdu5mAYPPo6f74slO5tFUMNP7EVppqsjYaNkCQQCraD6iKHo+OIlvvYIKiMXatJGD7N1GNhq5CrhUNPWLHwv/Ih2D3JJdF8IUZOPIJfUxTfM2fZYI+EVdsv6s4RcFAkAGjNYbnighOGcUJZYD6q3sVxVkRqEv3ubWs2HrH/Lna4l8caKqXCq8JfwLkod8/QugFiLYwBqIZqX4vMdjHtfZAkBsAl9dbWZCaPvpxp/4JWGPxDLhz9NLV/KU4bVvkoObq++yUHwKyGYOdVcd5MlIKOsNq5Hzp0Vw14lWVuF2bMxFAkBuNrZksvUULNIaWDKd4rQ6GVzUxXuIZW0ZE6atHYDiXPB4jVAjKRtLxZAV1qH9cr1zNJlcg+RbGYUdF9t4A9n5';
	$pemKey = chunk_split($rsaKey, 64, "\n");
    $pem = "-----BEGIN PRIVATE KEY-----\n" . $pemKey . "-----END PRIVATE KEY-----\n";
	$priKey = openssl_pkey_get_private($pem);
	
    openssl_sign($dataGBK, $encrypted, $priKey, OPENSSL_ALGO_MD5); // 对数据进行签名
    $RSA = base64_encode($encrypted);
?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>支付平台</title>
		<style>
        input {
        	height: 20px;
        }
        </style>
	</head>
	<body>
    	你的订单号是 <?php echo $order_id; ?> 支付金额 <?php echo $order_amt*0.01; ?> 元 
    	<form action="http://www-1.fuiou.com:8888/wg1_run/dirPayGate.do" method="post">
            <input type="hidden" name="mchnt_cd" value="<?php echo $_mchnt_cd; ?>" />
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
            <input type="hidden" name="order_amt" value="<?php echo $order_amt; ?>" />
            <input type="hidden" name="user_type" value="0" />
            <input type="hidden" name="page_notify_url" value="<?php echo $_page_notify_url; ?>" />
            <input type="hidden" name="back_notify_url" value="<?php echo $_back_notify_url; ?>" />
            <input type="hidden" name="card_no" value="<?php echo $card_no; ?>" />
            <input type="hidden" name="cert_type" value="0" />
            <input type="hidden" name="cert_no" value="<?php echo $cert_no; ?>" />
            <input type="hidden" name="cardholder_name" value="<?php echo $cardholder_name; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <input type="hidden" name="RSA" value="<?php echo $RSA; ?>" />
            <input type="submit" value="确认支付" />
		</form>
	</body>
</html>