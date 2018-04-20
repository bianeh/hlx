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
			.photo{margin-top:1rem;background:#FFFFFF;height:1.2rem;}
            .photo>span{display:inline-block;line-height:1.2rem;width:3rem;margin-left:0.3rem;}
            .photo>img{display:inline-block;float:right;height:0.8rem;width:0.8rem;margin-top:0.2rem;margin-right:0.3rem}
            .username{height:1rem;background:#FFFFFF;margin-top:6px;}
            .us1{display:inline-block;line-height:1rem;margin-left:0.3rem;}
            .username>img{width:0.25rem;height:0.2rem;display:inline-block;margin-top:0.4rem;float:right;margin-right:0.3rem;}
            .us2{display:inline-block;line-height:1rem;float:right;margin-right:0.1rem;}
            .aboutus{margin-top:6px;height:1rem;background:#FFFFFF;}
            .aboutus>span{display:inline-block;line-height:1rem;width:3rem;margin-left:0.3rem;}
            .aboutus>img{width:0.25rem;height:0.2rem;display:inline-block;margin-top:0.4rem;float:right;margin-right:0.3rem;}
            .copyright{height:1rem;background:#FFFFFF;margin-top:6px;}
            .cp1{display:inline-block;line-height:1rem;width:3rem;margin-left:0.3rem;}
            .cp2{display:inline-block;line-height:1rem;float:right;margin-right:0.3rem;}
            .userid{height:1rem;background:#FFFFFF;margin-top:6px;}
            .us1{display:inline-block;line-height:1rem;width:3rem;margin-left:0.3rem;}
            .us2{display:inline-block;line-height:1rem;margin-right:0.3rem;float:right;}
            .loginout{margin-top:6px;text-align:center;height:1rem;font-weight:bold;color:#FFFFFF;background:#CD5555;line-height:1rem;}
            .photoa{border-radius:0.8rem;}
        </style>
	</head>
	<body>
				<header>
					<div class="header-main">
						<span class="back iconfont icon-fanhuiico mui-action-back" style="font-size: 0.4rem;"></span>
						<div class="research">
							个人资料
						</div>
						<div class="scanCode img">
						</div>
					</div>
				</header>
                        <div class="photo">
                            <span>头像</span>
                            <?php $head = $userinfo['head'];if($head == '') { ?>
                            <img src="<?php echo Yii::$app->params['common_url'];?>/images/weidenglu@2x.png" id="upuserp" alt="" class="photoa">
                            <?php } ?>
                            <?php $Id=$userinfo['Id'];$head = $userinfo['head'];if($head != '') { ?>
                            <img src="/images/getuserphoto?Id=<?= $userinfo['Id'] ?>" id="upuserp" alt="" class="photoa">
                            <?php } ?>
                        </div>
                        <div class="username">
                            <span class="us1">昵称</span><img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png" /><span class="us2" id="us2">
                            	<?php
	                                $username = $userinfo['username'];
	                                $phone = $userinfo['phone'];
	                                if($username == ''){echo $phone; }
	                                else{echo $username;}
                            	?>
                            </span>
                        </div>
                        <div class="userid">
                        	<span class="us1">用户id</span><span class="us2"><?= $userinfo['Id'] ?></span>
                        </div>
                        <div class="aboutus">
                        	<span>关于我们</span><img id="introinfo" src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png"/>
                        </div>
                        <div class="copyright">
                        	<span class="cp1">当前版本</span><span class="cp2">当前版本1.0.0</span>
                        </div>
                        <div class="loginout" id="loginout"><span>退出登陆</span></div>
	<footer>
		<div class="footer-main">
			<a href="/" class="setting">
				<div class="pics a">
				</div>
				<div class="intros">首页</div>
			</a>
			<a href="/tea/index" class="setting tea">
				<div class="pics b">
				</div>
				<div class="intros">茶园</div>
			</a>
			<a href="/store/index" class="setting">
				<div class="pics c">
				</div>
				<div class="intros">体验店</div>
			</a>
			<a href="/cart/index" class="setting">
				<div class="pics d">
				</div>
				<div class="intros">购物车</div>
			</a>
			<a href="/usercenter/index" class="setting">
				<div class="pics e  active">
				</div>
				<div class="intros  active">我的</div>
			</a>
		</div>
	</footer>
	<!--footer end-->
	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
	<script>
		mui.init();
		(function($) {
			$(".mui-scroll-wrapper").scroll({
				bounce: false,
				indicators: false,
				deceleration: .8

			});

		})(mui);
		var loginout = document.getElementById("loginout");
		loginout.onclick=function(){
			window.location.href="/account/loginout";
		}
		var us2 = document.getElementById("us2");
		us2.onclick=function(){
			window.location.href="/usercenter/upusername";
		}
		var upuserp = document.getElementById("upuserp");
		upuserp.onclick=function(){
			window.location.href="/usercenter/upuserphoto";
		}
		var introinfo = document.getElementById("introinfo");
		introinfo.onclick=function(){
			window.location.href="/usercenter/introinfo";
		}
	</script>

</html>