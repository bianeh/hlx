<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<title>海岚香--个人中心</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzmy.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
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
			.photo{border-radius:1.78rem;}
		</style>
	</head>

	<body>
				<!--header start-->
				<header>
					<div class="header-main">
						<div class="news img">
                                  <a href="/wbinfo/index"><img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_news@2x.png" alt=""></a>
						</div>
						<div class="research">
							我的
						</div>
						<div class="scanCode img">
						</div>
					</div>

				</header>

				<!--header end-->
				<!--banner start-->
				<!--if 已登录开始-->
				<div class="banner introId" style="display:block;width:40px;height:40px;background:blue;">
					<div class="left">
						<a href="/usercenter/userdetail">
						   <img src="<?php echo Yii::$app->params['common_url'];?>/images/head@2x.png" alt="" class="introId">
						</a>
					</div>
					<ul class="right introId">
						<li></li>
						<li>
							<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_phone1@2x.png" alt="">
							<span style="color:#FFFFFF"><?= $userinfo['phone'] ?></span>
						</li>
						<li class="renzheng">认证会员</li>
					</ul>
				</div>
				<!--if 已登录结束-->
				<!--if未登录开始-->
                <div class="mui-content mui-scroll-wrapper" style="margin-bottom: 50px">
                    <div class="mui-scroll">
                        <div class="banner loginId">
                            <a href="/usercenter/userdetail">
                            <div class="left">
                                <?php $head = $userinfo['head'];if($head == '') { ?>
                                <img src="<?php echo Yii::$app->params['common_url'];?>/images/weidenglu@2x.png" alt="" class="introId photo">
                                <?php } ?>
                                <?php $Id=$userinfo['Id'];$head = $userinfo['head'];if($head != '') { ?>
                                <img src="/images/getuserphoto?Id=<?= $userinfo['Id'] ?>" alt="" class="introId photo">
                                <?php } ?>
                            </div>
                            </a>
                            <ul class="right">
                               <li></li>
								<li>
									<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_phone1@2x.png" alt="">
									<span style="color:#FFFFFF !important"><?= $userinfo['phone'] ?></span>
								</li>
								<?php $code = $userinfo['code'];if(!empty($code)) { ?>
								<li class="renzheng">认证会员</li>
								<?php } ?>
		                    </ul>
                        </div>
                        <!--if 未登录结束-->
                        <!--banner end-->
                        <!--会员状态开始-->
                        <div class="state">
                            <div class="s-bottom memberId">
                                <div class="xing clearfix">
                                    <span>会员状态</span>
                                    <a href="javascript:;" class="back">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png" alt="">
                                    </a>
                                   <div class="grade vip_lv">
								        <a href="/usercenter/recoginize">认证会员可享受全场八折优惠</a>
								        <!-- <a href="/account/loginout">认证会员可享受全场八折优惠</a> -->
							       </div>
                                </div>
                            </div>
                        </div>
                        <!--会员状态结束-->
                        <div class="interval"></div>
                        <!--我的订单开始-->
                        <div class="order">
                                <div class="s-bottom ordersId">
                                    <div class="xing">
                                        <div class="statu iconfont icon-dingdan" style="line-height: 0.27rem"></div>
                                        <span>我的订单</span>
                                        <a href="javascript:;" class="back">
                                            <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png" alt="">
                                        </a>
                                        <div class="grade">
                                                                            <a href="/order/index">查看全部订单</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="s-top">
                                    <li class="order_commodityId ordersId" type="#item2">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_payment@2x.png" alt="">
                                                                        <span><a href="/order/paymenting">待付款</a></span>
                                        <i class="my-icon my-icon1">0</i>
                                    </li>
                                    <li class="order_commodityId ordersId" type="#item3">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_deliver@2x.png" alt="">
                                        <span><a href="/order/haspayment">待发货</a></span>
                                        <i class="my-icon my-icon2">0</i>
                                    </li>
                                    <li class="order_commodityId ordersId" type="#item4">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_collect@2x.png" alt="">
                                        <span><a href="/order/express">待收货</a></span>
                                        <i class="my-icon my-icon3">0</i>
                                    </li>
                                    <li class="order_commodityId ordersId" type="#item5">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_evaluate@2x.png" alt="">
                                        <span><a href="/order/getgoods">待评价</a></span>
                                        <i class="my-icon my-icon4">0</i>
                                    </li>
                                </ul>
                            <div class="interval"></div>
                                <ul class="s-top">
                                    <li class="order_commodityId addressId" type="#item2">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_dizhi@2x.png" alt="">
                                                                        <span><a href="/address/index">地址</a></span>
                                        <i class="my-icon my-icon1">0</i>
                                    </li>
                                    <li class="order_commodityId cashId" type="#item3">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_youhuiquan@2x.png" alt="">
                                                                        <span><a onclick="javascript:alert('该模块在开发中')">优惠券</a></span>
                                        <i class="my-icon my-icon2">0</i>
                                    </li>
                                    <li class="order_commodityId collectionId" type="#item4">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_shoucang@2x.png" alt="">
                                                                        <span><a href="/goods/collection">收藏</a></span>
                                        <i class="my-icon my-icon3">0</i>
                                    </li>
                                    <li class="order_commodityId evaluateId" type="#item5">
                                        <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_evaluate1@2x.png" alt="">
                                                                        <span><a href="javascript:alert('该模块在开发中')">评价</a></span>
                                        <i class="my-icon my-icon4">0</i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--我的订单结束-->
                    </div>
                </div>
	<!--footer start-->
	<footer>
		<div class="footer-main">
			<a href="/index/index" class="setting">
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
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
	<script>
		mui.init();
		(function($) {
			$(".mui-scroll-wrapper").scroll({
				bounce: false, //滚动条是否有弹力默认是true
				indicators: false, //是否显示滚动条,默认是true
				deceleration: .8
			});
		})(mui);

	</script>

</html>