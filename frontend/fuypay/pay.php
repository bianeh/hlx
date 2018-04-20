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
    	<form action="process.php" method="post">
            <table>
                <tr>
                    <td>
                        订单号码：<input type="text" name="order_id" value="<?php echo str_replace('.', '', microtime(TRUE)); ?>" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        支付金额：<input type="text" name="order_amt" value="1" size="50" /> 元
                    </td>
                </tr>
                <tr>
                    <td>
                        银行卡号：<input type="text" name="card_no" value="" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        真实姓名：<input type="text" name="cardholder_name" value="" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        身份证号：<input type="text" name="cert_no" value="" size="50" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="确认支付">
                    </td>
                </tr>            		
            </table>
		</form>
	</body>
</html>