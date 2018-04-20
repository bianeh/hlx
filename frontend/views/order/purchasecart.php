<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>确认订单</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/recycle_inventory.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/iconfont.css">
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
		<style>
			.up-bar-nav{
				border-bottom:none;
			}
			.mui-table-view:before{
				background-color: #fff;
			}
			.flex_0 span{
				display:block;line-height: 0.6rem;
			}
			.icon{
				font-family: Muiicons;
				font-size: 24px;
				font-weight: 400;
				font-style: normal;
				line-height: 1;
				display: inline-block;
				text-decoration: none;
				-webkit-font-smoothing: antialiased;
			}
			.mui-ellipsis-2{
				margin-top: 0.4rem;
			}
			.flex_1.address-box{
				margin-left: 0.35rem;
			}
			.flex_0{
				display: flex;
				box-orient:vertical;
				flex-direction:column;
			}
			.flex_1.address-box .name{
				line-height: 0.3rem;
			}
			.mui-ellipsis-2{
				margin-top: 0;
			}
			.flex_0 .iconfont{
				font-family: Muiicons;
				font-size: 0.32rem;
				font-style: normal;
				line-height: 1;
				text-align: center;
			}
			.flex_1 .name{
				margin-top: -10px;
			}
			.cell:after{
				background-color: #fff;
			}
			.mui-table-view-cell{
				padding: 14px;
			}
			.mui-navigate-right:after, .mui-push-left:after, .mui-push-right:after{
				color:  #4f95ca;
			}
			.address-icon{
				font-size: .2rem; 
				padding:0px 5px; 
				border-radius:3px; 
				margin-left:10px; 
				color: #FFFFFF;
				background: #4f95ca;
			}
			.mui-bar{
				background: #fff;
			}
			.mui-table-view-cell:after{
				background-color: #fff;
			}
			.mui-table-view-cell.mui-collapse>.paperReceipt:after{
				font-size: 0.45rem;
				left:0;
				content:'\e411';
				color:#000;
			}
			.mui-table-view-cell.mui-collapse.mui-active>.paperReceipt:after{
				content: '\e442';
			}
			.mui-table-view-cell.mui-collapse.mui-active>.paperReceipt{
				background: #fff;
			}
			.mui-input-group .mui-input-row:after{
				background-color: #fff;
			}
			.mui-input-group:before{
				background-color: #fff;
			}
			.receipt:before{
				background-color: #efeff4;
			}
			.mui-input-row label:nth-child(1){
				color: #777;
				font-size: 0.28rem;
			}
			.mui-input-group input:last-child{
				background: #f6f6f8;
				padding-left: 0.2rem;
			}
			.mui-input-group input:first-child{
				background: #f6f6f8;
				padding-left: 0.2rem;
			}
			.mui-input-group .mui-input-row{
				margin-bottom: 0.2rem;
				margin-right: 3%;
			}
			.mui-input-group:after{
				background-color: #fff;
			}
			.mui-input-row label~input{
				width: 69%;
			}
			.mui-input-row label{
				width: 28%;
			}
			.mui-table-view-cell.mui-active{
				background-color: #fff;
			}
			.h2-title span{
				font-size: 0.26rem;
				color: #999;
			}
		</style>
	</head>

	<body>
		<!--header start-->
		<header class="mui-bar mui-bar-nav up-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title up-title">确认订单</h1>
		</header>
		<!--header end-->
				<!--cont start-->
				<div class="mui-content my-cart-content pad50 mui-scroll-wrapper" style="margin-bottom: 50px">
					<div class="mui-scroll">

					<!--cont-list start-->
					<div class="cart-list-group ">
						<div id="cartList">
							<div class="list" style="margin-bottom:20px">
								<ul class="mui-table-view addressId" id="addAddress" >
									<li class="mui-table-view-cell">
										<a class="mui-navigate-right" href="/order/orderaddress">
											<div class="display_flex">
												<div class="flex_0">
													<span class=" iconfont icon icon-yonghuming1"></span>
													<span class="mui-icon mui-icon-location"></span>
												</div>
												<div class="flex_1 address-box">
													<h1 class="name"><span id="addressName" addressid="17" style="font-size: 0.24rem"><?= $addressinfo['linker'] ?></span><span class="phone" id="addressPhone" style="font-size: 0.24rem;margin-left: 0.29rem"><?= $addressinfo['phone'] ?></span> </h1>
													<p class="address mui-ellipsis-2">
														地址：<span id="addressText"><?= $addressinfo['address']?><?= $addressinfo['detail'] ?></span>
													</p>
												</div>
											</div>
										</a>
									</li>
								</ul>
                                                            <input type="hidden" value="<?= $addressinfo['Id']?>" id="addressid"/>
							</div>
                                           <?php foreach ($listinfo as $key => $value) { ?>
                        		        	<div class="list">
								<ul class="mui-table-view up-table-wiew">
									<li class="my-table-view-cell mui-media notarize_table-view-cell">
										<a href="javascript:;">
											<div class="row display_flex">
												<div class="content">
													<img class="mui-media-object mui-pull-left" src="/images/getpic?goodsid=<?= $value['goodsid'] ?>">
													<div class="mui-media-body">
														<h1 class="title mui-ellipsis-2"><?= $value['goodsname'] ?></h1>
														<p class="mui-ellipsis style"><span><?= $value['specname'] ?></span></p>
														<div class="price-group">
															<h1 class="price">
																<i class="price-icon">￥</i><?= $value['discountprice'] ?>
																<span class="decoration">原价：<?= $value['price'] ?></span>
																<span style="color: #ea4a4a">礼盒</span>
																<i class="price-icon">￥</i><?= $value['boxprice'] ?>&nbsp;&nbsp;
																<span class="amount" style="float: right">x<?= $value['num'] ?></span>
															</h1>
														</div>
													</div>
												</div>
										</div>
										</a>
									</li>
									<li class="order-table-view-cell"><h2 class="order-title"><em>(包含礼盒价)</em> 合计：<i class="price-icon">￥</i><span class="price"><?= $value['total_price'] ?>.00</span></h2></li>
                                                                </ul>
							</div>
                                           <?php } ?>
						</div>
						<div class="list" style="margin-bottom: 0;display:none">
							<ul class="mui-table-view up-table-wiew">
								<li class="mui-table-view-cell mui-collapse">
									<a class="mui-navigate-right paperReceipt" href="#">
										<span style="margin-left: 0.2rem">开具纸质发票</span>
										<span style="float: right;font-size: 0.24rem;color:#777">仅支持开单位发票</span>
									</a>
									<div class="mui-collapse-content">
										<form class="mui-input-group receipt">
											<div class="mui-input-row">
												<label>发票抬头</label>
												<label>单位</label>
											</div>
											<div class="mui-input-row">
												<label>公司名称</label>
												<input type="text" placeholder="请填写公司名称">
											</div>
											<div class="mui-input-row">
												<label>税务登记号</label>
												<input type="text" placeholder="请填写税务登记号">
											</div>
										</form>
									</div>
								</li>
							</ul>
						</div>
						<div class="list" style="display:none">
							<ul class="mui-table-view up-table-wiew notarize-cost  cell">
								<li class="my-table-view-cell ">
									<a class="mui-navigate-right">
										<h2 class="h2-title">优惠券<span style="float: right;margin-right: 0.6rem;font-size: 0.3rem;color: #ea4a4a">0.00</span></h2>
									</a>
								</li>
								<li class="my-table-view-cell">
									<label style="font-size:0.3rem;font-weight: bold">留言</label>
									<input type="text" placeholder="请控制在100字内" style="width: 80%;border: none;font-size: 0.3rem;margin-bottom: 0">
								</li>
							</ul>

						</div>
						<div class="list">
							<ul class="mui-table-view up-table-wiew notarize-cost  cell">
								<li class="my-table-view-cell">
									<a>
										<h2 class="h2-title">实付款<span class="cont" id="sum" style="font-size: .4rem">
										<?= $totalmoney ?>.00</span></h2>
									</a>
								</li>
								<li class="my-table-view-cell">
									<a>
										<h2 class="h2-title"><span>合计</span><span class="cont" id="dicount"><?= $count ?><i style="color: #000">件商品</i> ￥<?= $totalmoney ?>.00</span></h2>
									</a>

								</li>
								<li class="my-table-view-cell">
									<a>
										<h2 class="h2-title"><span>优惠</span><span class="cont" id="dicount">0</span></h2>
									</a>

								</li>
								<li class="my-table-view-cell">
									<a>
										<h2 class="h2-title"><span>运费</span><span class="cont" id="freight">0.00</span></h2>
									</a>
								</li>
								
							</ul>
						</div>

					</div>
				</div>
				<!--cont end-->
				</div>
				<div class="submit-group display_flex">
			<div class="flex_1">
				<h1 class="cont">合计 <i class="price-icon">￥</i><span id="orderSum"><?= $totalmoney ?>.00</span></h1>
				<span class="fee">含运费</span>
			</div>
			<a class="submit-btn qzzOrderId submit_accountId" id="payment" >结算(<?= $count ?>)</a>
		</div>

	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/tools.js" ></script>-->
	<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/url_list.js" ></script>-->
	<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/notarize_order.js" ></script>-->
<!--	<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js" ></script>-->
	<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/old_back.js" ></script>-->
	<script type="text/javascript">
		mui.init();

        (function($) {
            $(".mui-scroll-wrapper").scroll({
                bounce: false, //滚动条是否有弹力默认是true
                indicators: false, //是否显示滚动条,默认是true
            });

        })(mui);
	</script>
        <script>
            $(document).ready(function(){
                $("#payment").click(function(){
                    var paymoney = <?= $totalmoney ?>;
                    var data = <?= $data ?>;
                    var addressid = $("#addressid").val();
                    var nums = <?= $nums ?>;
                    window.location.href ="/order/cartpayment?paymoney="+paymoney+"&addressid="+addressid+"&nums="+nums+"&data="+data;
                });
            });
            window.addEventListener("storage", function (e) 
           {
            var a = localStorage.getItem("addressid");
            if(a != '')
            {
                    $(document).ready(function(){
                           $.ajax({
                            method:"POST",
                            url:"/address/getaddress",
                            data:{'Id':a}
                            }).done(function(msg){
                                   var data = JSON.parse(msg);
                                   var address = data['address'];
                                   var phone = data['phone'];
                                   var Id = data['Id'];
                                   $("#addressid").val(Id);
                                   $("#addressText").html(address);
                                   $("#addressPhone").html(phone);
                                   localStorage.removeItem("addressid");
                                   
                            });
                    })
            }      
            });
            alert(a);
        </script>
</html>
