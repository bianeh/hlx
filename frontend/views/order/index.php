<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>我的订单</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/recycle_inventory.css" />
		<style>
			.service-btn{
				margin-left: 0.2rem;
			}
			.mui-bar{
				background: #fff;
			}
                        .orderno
                        {
                            padding:5px;
                            float:left;
                            font-size: 0.3rem;
                        }
                        .state
                        {
                            padding:5px;
                            float:right;
                            font-size: 0.3rem;
                        }
		</style>
	</head>
        <?php $strstate=['待付款','待发货','待收货','待评价','超时未支付']; ?>
	<body>
		<!--header start-->
		<header class="mui-bar mui-bar-nav up-bar-nav">
			<a href="/usercenter/index" class="mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title up-title">我的订单</h1>
			<a class=" nav_button_search" style="display:none"></a>
		</header>
		<div class="order-nav">
				<div class="nav">
					<div id="segmentedControl" class="mui-segmented-control">
						<span class="mui-control-item mui-active allorder">全部</span>
						<span class="mui-control-item payment">待付款</span>
						<span class="mui-control-item haspayment">待发货</span>
						<span class="mui-control-item express">待收货</span>
						<span class="mui-control-item getgoods">待评价</span>
					</div>
				</div>
		</div>
		<!--header end-->
		<!--cont start-->
		<div class="mui-content my-cart-content mui-scroll-wrapper" style="margin-top: 45px;">
			<div class="mui-scroll">
				<?php foreach ($orderinfo as $key => $value) { ?>
				<!--cont-list start-->
				<div class="cart-list-group mui-control-content mui-active" id="item1">
					<div class="list orderId" type="1 ">
						<div class="list-head display_flex">
							<div class="flex_1">
                                <span class="orderno">订单号：<?= $value['orderid'] ?></span>
                                <span class="state">
                                <?php 
                                    if($value['state'] == 100){ echo $strstate[0]; }
                                    if($value['state'] == 0){ echo $strstate[1]; }
                                    if($value['state'] == 1){ echo $strstate[2]; }
                                    if($value['state'] == 2){ echo $strstate[3]; }
                                    if($value['state'] == 200){ echo $strstate[4]; }
                                ?>
                                </span>
							</div>
						</div>
						<ul class="mui-table-view up-table-wiew">
                          <?php $detailinfo=$value['detailinfo'];foreach ($detailinfo as $k => $v){ ?>
							<li class="my-table-view-cell mui-media">
								<a href="javascript:;">
									<div class="row display_flex">
										<div class="content">
											<img class="mui-media-object mui-pull-left" src="/images/getpic?goodsid=<?= $v['productId'] ?>">
											<div class="mui-media-body">
												<h1 class="title mui-ellipsis-2"><?= $v['name'] ?></h1>
												<p class="mui-ellipsis style"><span><?= $v['regularname']?></span></span></p>
												<div class="price-group">
													<h1 class="price">
														<i class="price-icon">￥</i><?= $v['unitPrice'] ?>
														<span class="decoration">
															<i class="price-icon"></i>
															</span>
														<span style="color: #ea4a4a">礼盒</span>
														<i class="price-icon">￥</i>50
														<span class="amount" style="float: right">x<?= $v['buyNum'] ?></span>
													</h1>
												</div>
											</div>
										</div>
									</div>
								</a>
							</li>
                          <?php } ?>
							<li class="order-table-view-cell">
								<h2 class="order-title"><em>(包含礼盒价)</em> 合计：<i class="price-icon">￥</i>
									<span class="price"><?= $value['price'] ?>.00</span>
								</h2>
							</li>
							<li class="order-table-view-cell clearfix" orderno="2017121352481005">
                                <?php if($value['state'] == 100) { ?>
	                                <a class="service-btn customerId" href="tel:0278766188" mce_href="tel:0278766188">客服热线</a>
	                                <a id="gopayment" class="service-btn method-btn methodId" style="margin-left: 0.2rem" remindstatus="0">前去付款</a>
									<input type="hidden" value="<?= $value['orderid'] ?>" >
									<input type="hidden" value="<?= $value['price'] ?>" />
	                            <?php } ?>
	                            <?php if($value['state'] == 1) { ?>
	                                <a class="service-btn customerId" href="tel:0278766188" mce_href="tel:0278766188">客服热线</a>
	                                <a id="gopayment" class="service-btn method-btn methodId" style="margin-left: 0.2rem" remindstatus="0">确认收货</a>
									<input type="hidden" value="<?= $value['orderid'] ?>" >
									<input type="hidden" value="<?= $value['price'] ?>" />
	                            <?php } ?>
	                            <?php if($value['state'] == 0) { ?>
	                                <a class="service-btn customerId" href="tel:0278766188" mce_href="tel:0278766188">客服热线</a>
	                            <?php } ?>
	                            <?php if($value['state'] == 2) { ?>
	                                <a class="service-btn customerId" href="tel:0278766188" mce_href="tel:0278766188">客服热线</a>
	                            <?php } ?>
	                            <?php if($value['state'] == 200) { ?>
	                                <a class="service-btn customerId" href="tel:0278766188" mce_href="tel:0278766188">客服热线</a>
	                            <?php } ?>

							</li>
						</ul>
					</div>
				</div>
                                <?php } ?>
			</div>
		</div>
		<!--cont end-->
	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script type="text/javascript">
		mui.init();
		(function($) {
			$(".mui-scroll-wrapper").scroll({
				bounce: false, //滚动条是否有弹力默认是true
				indicators: false, //是否显示滚动条,默认是true
                                deceleration: .8

                            });
                        mui(".nav").on('tap', '.allorder', function(event){ window.location.href="/order/index" });
                        mui(".nav").on('tap', '.payment', function(event){ window.location.href="/order/paymenting" });
                        mui(".nav").on('tap', '.haspayment', function(event){ window.location.href="/order/haspayment" });
                        mui(".nav").on('tap', '.express', function(event){ window.location.href="/order/express" });
                        mui(".nav").on('tap', '.getgoods', function(event){ window.location.href="/order/getgoods" });

		})(mui);
		$("#gopayment").click(function(){
			var orderno = $(this).next().val();
			var paymoney = $(this).next().next().val();
			window.location.href="/order/gopayment?orderno="+orderno+"&paymoney="+paymoney;
		})
	</script>

</html>