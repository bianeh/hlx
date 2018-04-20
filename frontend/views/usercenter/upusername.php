<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<title>个人中心</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzmy.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/iconfont.css" />
		<style type="text/css">
			.state .content .s-bottom {
				padding: 10px 0px;
			}
			.clearfix {
				/*兼容 IE*/
				zoom: 1;
			}
			.clearfix:after {
				/*最简方式*/
				content: '';
				display: block;
				clear: both;
			}
			.state .content .s-bottom .xing .statu {
				margin-top: 6px;
			}
			.state .content .s-bottom .xing span {
				margin-top: 6px;
			}
			.state .content .s-bottom .xing .grade.vip_lv {
				width: 50%;
				text-align: right;
				font-size: .24rem;
				margin-right: 0;
			}
			.state .content .s-bottom .xing .back {
				margin-top: 6px;
			}
			.icon-tuichu {}
			.state .content .s-bottom .xing .grade {
				display: block;
			}
			.my-icon {
				position: absolute;
				height: 15px;
				min-width: 15px;
				font-size: 10px;
				line-height: 15px;
				text-align: center;
				background: red;
				color: #FFFFFF;
				top: -5px;
				right: -5px;
				border-radius: 100%;
				-webkit-text-size-adjust: none;
				display: none;
			}
			.my-icon-on {
				display: block;
			}
			header .header-main .research{
				text-align: center;
				font-size: 0.3rem;
				line-height: 0.6rem;
			}
			body{
				background:#EDEDED;
				opacity:0.8;
			}
			.content{width:100%;height:1rem;}
            .username{margin-top:1.0rem;}
            .username>input{width:100%;display:inline-block;height:0.75rem;}
            .upusername{margin-top:2px;text-align:center;height:1rem;font-weight:bold;color:#FFFFFF;background:#CD5555;line-height:1rem;}
            .photoa{border-radius:0.8rem;}
        </style>
	</head>
	<body>
				<header>
					<div class="header-main">
						<span class="back iconfont icon-fanhuiico mui-action-back" style="font-size: 0.4rem;"></span>
						<div class="research">
							修改昵称
						</div>
						<div class="scanCode img">
						</div>
					</div>
				</header>
				       <?php $username = $userinfo['username'];$phone = $userinfo['phone']; if($username == '') { ?>
				        <div class="username"><input type="text" id="username" value="<?= $userinfo['phone'] ?>" /></div>
				       <?php } ?>
				       <?php $username = $userinfo['username'];$phone = $userinfo['phone']; if($username != '') { ?>
				        <div class="username"><input type="text" id="username" value="<?= $userinfo['username'] ?>" /></div>
				       <?php } ?>
                        <div class="upusername" id="upusername"><span>修改昵称</span></div>

	<!--footer end-->
	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js"></script>
	<script>
		mui.init();
		(function($) {
			$(".mui-scroll-wrapper").scroll({
				bounce: false,
				indicators: false,
				deceleration: .8

			});

		})(mui);
		var upusername = document.getElementById("upusername");
		upusername.onclick=function(){
			var username = document.getElementById("username");
			var username_val = username.value;
			$.ajax({
				type:"POST",
				dataType:"json",
				url:"/usercenter/upusername",
				data:{username:username_val},
				success:function(str){
					var code = str.code;
					if(code == '000000')
					{
						alert("成功修改用户昵称！");
					}
				},
				error:function(str){},
			})
		}
	</script>

</html>