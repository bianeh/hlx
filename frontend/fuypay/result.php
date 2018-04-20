<?php
/**
 * 前台显示支付结果页面
 */
print_r($_POST);
// 获得返回的数据
$mchnt_cd = $_POST['mchnt_cd'];
$order_id = $_POST['order_id'];
$order_date = $_POST['order_date'];
$order_amt = $_POST['order_amt'];
$order_st = $_POST['order_st'];
$order_pay_code = isset($_POST['order_pay_code']) ? $_POST['order_pay_code'] : '';
$order_pay_error = isset($_POST['order_pay_error']) ? $_POST['order_pay_error'] : '';
$user_id = $_POST['user_id'];
$fy_ssn = $_POST['fy_ssn'];
$card_no = $_POST['card_no'];
$RSA = $_POST['RSA'];

$fy_date = $order_date;
$data = $mchnt_cd . '|' . $user_id . '|' . $order_id . '|' . $order_amt . '|' . $fy_date . '|' . $card_no . '|' . $fy_ssn;

$dataGBK = iconv('UTF-8', 'GBK', $data);

// 测试用公钥，在正式环境时，更换为正式公钥
$rsaKey = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCn26E6VU4mVfUlsaScZDuPyYTSszoFCS7ctk6K6kO4y6xZrrVSoGhrd6ej1PXa421uqvDEpmrrnZBaJO0y7S/6niWNzwZQ5ajWo929ZH0HrqsD4DENUEyBTj8U9etnxx7J1wZFtPzgHd3FrUSj1RVjpy5QA40ls29KD2DhJU/oFwIDAQAB';
$pemKey = chunk_split($rsaKey, 64, "\n");
$pem = "-----BEGIN PUBLIC KEY-----\n" . $pemKey . "-----END PUBLIC KEY-----\n";
$pubKey = openssl_pkey_get_public($pem);

$ret = openssl_verify($dataGBK, base64_decode($RSA), $pubKey, OPENSSL_ALGO_MD5);

?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
        input {
        	height: 20px;
        }
        </style>
		<title>支付平台</title>
	</head>
	<body>
	<?php
	if ($ret==1) {
	    if ($order_st=='11' && $order_pay_code=='0000') {
	        echo '恭喜你，支付成功：' . $order_amt * 0.01 . '元';
	        // 这里不需要对订单进行处理，在后台notify代码中处理即可
	        
	    } else {
	        echo '支付失败，原因：' . $order_pay_error;
	    }
	} else {
	    echo '';
	}
	?>
	66666666666666666
	</body>
</html>