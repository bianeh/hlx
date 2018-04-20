<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>海岚香-订单支付</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzOrder.css">
                <style>
                    input[type="radio"]{
                        content: "\a0"; /*不换行空格*/
                        display: inline-block;
                        vertical-align: middle;
                        font-size: 18px;
                        width: 1em;
                        height: 1em;
                        margin-right: .4em;
                        border-radius: 50%;
                        border: 1px solid #01cd78;
                        text-indent: .15em;
                        line-height: 1; 
                    }
                    .radiobt{
                        text-align:right;
                    }
                </style>
	</head>
	<body>
		<!--header start-->
		<header class="mui-bar mui-bar-nav" style="box-shadow: none;height: 1rem;background: #fff">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color:#1b1835"></a>
			<h1 class="mui-title" style="color:#1b1835;">支付订单</h1>
		</header>
		<!--header end-->
		<!--main start-->
		<div class="pay">
			<div class="times">
				<span style=" text-align: center;font-size: 0.3rem">支付剩余时间</span>
				<div class="time setTimeId">
					<span>1</span>&nbsp;<span>0</span>&nbsp;:&nbsp;<span>1</span>&nbsp;<span>5</span>
				</div>
			</div>

			<div class="pays">

				<p class="sum">￥<span id="orderSum"><?= $paymoney ?></span></p>
				<div class="number">
					支付订单&nbsp;<span id="orderno"><?= $orderno ?></span>
				</div>
			</div>
		</div>
		<div class="payStyle">
			<ul class="payMethod">
				<li class="wechat method" payId = "wxpay" id="wx5">
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_payment_wechat.png" alt="" class="icon">
					<div class="pays">                       
						<p style="color: #333333;font-size: 0.32rem">微信支付</p>
						<p>推荐已安装微信的用户使用</p>
					</div>
					<div class="radiobt"><input name="payment" value="1" type="radio"  value="微信支付" /></div>
				</li>
				<li class="wechat method" payId = "wxpay" id="wxg">
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_payment_wechat.png" alt="" class="icon">
					<div class="pays">
                                                
						<p style="color: #333333;font-size: 0.32rem">微信支付</p>
						<p>推荐已安装微信的用户使用</p>
					</div>
					<div class="radiobt"><input name="payment" value="3" checked type="radio" value="微信支付" /></div>
				</li>
				<li class="zhi method" payId = "alipay" id="zfb">
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_payment_alipay.png" alt="" class="icon">
					<div class="pays">
						<p style="color:#333333;font-size: 0.32rem">支付宝支付</p>
						<p>推荐已安装支付宝的用户使用</p>
					</div>
					<div class="radiobt"><input name="payment" value="2" type="radio" value="支付宝支付" /></div>
				</li>
			</ul>
		</div>
		<a class="paycode qzzPayId">
                    <span id="deal">支付</span>
		</a>
		<!--main end-->
	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
	<script>
		mui.init();
		//获取当前时间
		var now = new Date();
		var year = now.getFullYear();
		var month = now.getMonth() + 1;
		now.setMinutes(now.getMinutes() + 15);
		var day = now.getDate();
		var hour = now.getHours();
		var minute = now.getMinutes();
		var second = now.getSeconds();
		leftTimer(year, month, day, hour, minute, second);

		function leftTimer(year, month, day, hour, minute, second) {
			var leftTime = (new Date(year, month - 1, day, hour, minute, second)) - (new Date()); //计算剩余的毫秒数
			var days = parseInt(leftTime / 1000 / 60 / 60 / 24, 10); //计算剩余的天数
			var hours = parseInt(leftTime / 1000 / 60 / 60 % 24, 10); //计算剩余的小时
			var minutes = parseInt(leftTime / 1000 / 60 % 60, 10); //计算剩余的分钟
			var seconds = parseInt(leftTime / 1000 % 60, 10); //计算剩余的秒数
			var h1, h2, s1, s2;
			days = checkTime(days);
			hours = checkTime(hours);
			minutes = checkTime(minutes);
			seconds = checkTime(seconds);
			if(seconds >= 0) {
				setTimeout("leftTimer(" + year + "," + month + "," + day + "," + hour + "," + minute + "," + second + ")", 1000);
			} else {
				// alert("请求超时");
				mui.alert('订单支付超时', '', function() {
					window.location.href = ".html";
				})
			}
			if($(".setTimeId")[0]) {
				minutes = minutes.toString();
				h1 = minutes.substring(0, 1);
				h2 = minutes > 0 ? minutes.substring(1, 2) : 0;
				seconds = seconds.toString();
				s1 = seconds.substring(0, 1);
				s2 = seconds > 0 ? seconds.substring(1, 2) : 0;

				$(".setTimeId").html("<span>" + h1 + "</span>&nbsp;<span>" + h2 + "</span>&nbsp;:&nbsp;<span>" + s1 + "</span>&nbsp;<span>" + s2 + "</span>");
			}

			if($(".dateId")[0]) {
				$(".dateId").html(days + "天 " + hour + " : " + minutes + " : " + seconds);
			}
		}
		function checkTime(i) { 
			if(i < 10) {
				i = "0" + i;
			}
			return i;
		}
	</script>
        <script>
          

            //判断是否微信登陆
			function isWeiXin() {
			var ua = window.navigator.userAgent.toLowerCase();
			console.log(ua);//mozilla/5.0 (iphone; cpu iphone os 9_1 like mac os x) applewebkit/601.1.46 (khtml, like gecko)version/9.0 mobile/13b143 safari/601.1
			if (ua.match(/MicroMessenger/i) == 'micromessenger') {
			return true;
			} else {
			return false;
			}
			}
			if(isWeiXin()){
			    var wx5 = document.getElementById("wx5");
			    var wxg = document.getElementById("wxg");
			    var zfb = document.getElementById("zfb");
			    wxg.style.display = "block";
			    wx5.style.display = "none";
			    zfb.style.display = "none";
			    wxg.style.checked = true;
			    wx5.style.checked = false;
			    $(document).ready(function(){
                $("#deal").click(function(){
                    var paymentval = $('input[name="payment"]:checked').val();
                    if(paymentval == 2)
                    {
                        window.location.href ="/payment/deal?orderno=<?= $orderno ?>";
                    }
                    if(paymentval == 1)
                    {
                        window.location.href ="/paymentsrc/wechat/index.php?orderno=<?= $orderno ?>&paymoney=<?= $paymoney ?>";
                    }
                    if(paymentval == 3)
                    {
                    	window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa28f032b95868e92&redirect_uri=http://m.hailanxiang.cn/ele/Pay?orderno=<?= $orderno ?>&paymoney=1&response_type=code&scope=snsapi_base#wechat_redirect";
                    }

                     
                })
            })
			}else{
				var wx5 = document.getElementById("wx5");
			    var wxg = document.getElementById("wxg");
			    var zfb = document.getElementById("zfb");
			    wxg.style.display = "none";
			    wx5.style.display = "block";
			    zfb.style.display = "block";
			      $(document).ready(function(){
                $("#deal").click(function(){
                    var paymentval = $('input[name="payment"]:checked').val();
                    if(paymentval == 2)
                    {
                        window.location.href ="/payment/deal?orderno=<?= $orderno ?>&paymoney=<?= $paymoney ?>";
                    }
                    if(paymentval == 1)
                    {
                        window.location.href ="/paymentsrc/wechat/index.php?orderno=<?= $orderno ?>&paymoney=<?= $paymoney ?>";
                    }
                    if(paymentval == 3)
                    {
                    	alert("请选择支付方式！")
                    }

                     
                })
            })
			  
			}
        </script>
</html>
