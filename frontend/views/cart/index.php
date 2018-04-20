<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>海岚香--购物车</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/cart.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
		<style> 
            .mui-bar-nav.mui-bar .mui-icon
            {
                margin-top:0px !important;
            }
			.mui-bar-nav{
				border-bottom: none;
			}
			.mui-table-view:before{
				background-color: #fff;
			}
			.mui-checkbox label, .mui-radio label{
				text-align: right;
			}
			.up-table-wiew .row .up-checkbox{
				width: 0.86rem;
			}
			.mui-checkbox.mui-left input[type=checkbox], .mui-radio.mui-left input[type=radio]{
				left: 0.2rem;
			}
			.mui-numbox{
				width: 90px;
				padding: 0 30px;
				border: none;
				background-color: #fff;
			}
			.mui-numbox [class*=btn-numbox], .mui-numbox [class*=numbox-btn]{
				width: 30px;
			}
			.mui-numbox .mui-input-numbox, .mui-numbox .mui-numbox-input{
				border-left:none!important;
				border-right: none!important;
				color: #666;
			}
			.vedio{
				margin-top:0px !important;
			}
			.mui-scroll-wrapper{
				overflow:scroll !important;
				margin-bottom:120px !important;
			}

		</style>
	</head>
	<body>
		<!--header start-->
		<header class="mui-bar mui-bar-nav up-bar-nav">
			<a href="javascript:history.back()" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">购物车</h1>
<!--			<a href="shopcart.html" style="float: right;line-height: 0.9rem;color: #000;font-size:0.3rem">编辑</a>-->
		</header>
		<!--header end-->
		<div class="mui-content my-cart-content pd100 mui-scroll-wrapper">
			<div class="mui-scroll">
				<!--cont-list start-->
				<div class="cart-list-group" id="cartList">
                                    <?php foreach ($cartinfo as $key => $value) { ?>
					<div class="list">
						<ul class="mui-table-view up-table-wiew">
							<li class="my-table-view-cell mui-media">
								<a href="javascript:;">
									<div class="row">
										<div class="mui-input-row mui-checkbox mui-left up-checkbox">
											<input class="checkbox cart" checked="checked" value="<?= $value['id'] ?>" name="checkbox1" type="checkbox">
											<input type="hidden" value="<?= $value['total_price'] ?>" id="u<?= $value['id'] ?>">
                                                                                        <input type="hidden" name="num" class="num" />
										</div>
										<div class="content">
											<img class="mui-media-object mui-pull-left" src="/images/getpic?goodsid=<?= $value['productId'] ?>">
											<div class="mui-media-body">
												<h1 class="title mui-ellipsis"><?= $value['name'] ?></h1>
												<!-- <p class="mui-ellipsis style"><span></span></p> -->
												<div class="price-group add-sum-group display_flex price-action">
													<h1 class="price flex_1">
														<i class="price-icon">￥</i><span style="font-size:14px"><?= $value['price']?></span>
														<span class="decoration">原价：<?= $value['yprice']?></span>
														<span style="font-size:14px"><?= $value['specname']?></span>
														<span style="color:#ea4a4a;font-size: 0.24rem">礼盒</span>
														<i class="price-icon">￥</i><span style="font-size:14px"><?= $value['boxprice'] ?>.00</span>
													</h1>
													<div style="display:block;" class="mui-numbox" data-numbox-min='1' data-numbox-max='100'>
													    <input type="hidden" value="<?= $value['id'] ?>" />
														<button class="mui-btn mui-btn-numbox-minus minus" type="button">-</button>
														<input id="test" value="<?= $value['num'] ?>" class="mui-input-numbox" type="number"/>
														<button  class="mui-btn mui-btn-numbox-plus plus" type="button">+</button>
														<input type="hidden" value="<?= $value['id'] ?>" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
							</li>

						</ul>
						<div class="list-head">
							<div class="mui-input-row mui-checkbox mui-left">
								<label>包含礼盒价 合计  ￥<span id="<?= $value['id'] ?>" class="tjprice"><?= $value['total_price'] ?></span></label>
							</div>
						</div>
					</div>
                                    <?php } ?>

				</div>
			</div>
		</div>
		<!--合计-->
		<div class="summation-group display_flex">
			<div class="flex_1">
				<div class="mui-input-row mui-checkbox mui-left">
					<label>全选</label>
					<input name="checkbox" type="checkbox" id="allCheckbox" checked>
				</div>

			</div>
			<div class="flex_2">
				<div class="summation">
					<h2 class="summation-price">
							<span class="text"></span>
							合计:
							￥<span id="cartSum"><?= $totalmoney ?></span>.00
						</h2>

				</div>
			</div>
			<div class="flex_1">
				<a id="purchasecart" class="summation-btn submit_accountId">结算(<span id="submitSum"><?= $totalmoney ?>.00</span>)</a>
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
					<div class="pics d  active">
					</div>
					<div class="intros  active">购物车</div>
				</a>
				<a href="/usercenter/index" class="setting">
					<div class="pics e">
					</div>
					<div class="intros">我的</div>
				</a>
			</div>
		</footer>
		<!--footer end-->
	</body>
	<!-- <script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script> -->
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script type="text/javascript">
        var purchasecart = document.getElementById("purchasecart");
        purchasecart.onclick = function(){
            var cart = document.querySelectorAll(".cart");
            var cartid = [];
            for(var i=0;i<cart.length;i++)
            {
                if(cart[i].checked == true)
                {   
                    cartid.push(cart[i].value);
                }
            }
           window.location.href="/order/purchasecart?cartids="+cartid;
        }
        var _index = 0; //记录上一次点击下标
        $("footer .footer-main .setting").click(function() {
            var index = $(this).index();
            $("footer .footer-main .setting .pics").filter(".active").removeClass('active').end().eq(index).addClass('active');
            $("footer .footer-main .setting .intros").filter(".active").removeClass('active').end().eq(index).addClass('active');
            setLocation.setHref(index);
        });
        var setLocation = {

            setHref: function(id) {
                console.log(_index + "=" + id);
                var url = "",
                    type = false;
                switch (parseInt(id)) {
                    case 0:
                        url = "/index/index";
                        break;
                    case 1:
                        type = true;
                        url = "/tea/index";
                        break;
                    case 2:
                        type = true;
                        url = "/store/index";
                        break;
                    case 3:
                        type = true;
                        url = "/cart/index";
                        break;
                    default:
                        type = true;
                        url = "/usercenter/index";
                }
                setLocation.openWindow(url);
            },
            openWindow: function (url) {
                window.location.href = url;
            }
        }
        var i=0;
        var allCheckbox = document.getElementById("allCheckbox");
        var checkbox = document.getElementsByClassName("checkbox");
        allCheckbox.onclick=function(){
        	switch(i){
        		case 0:
        		meth.selectAll();
        		break;
        		case 1:
        		meth.cancelAll();
        		break;
        	}
        }
        var meth = {
        	selectAll:function(){
        		i = 1;
        		for(var j=0;j<checkbox.length;j++)
	        	{   
	        		if(checkbox[j].checked == true)
	        		{
	        			checkbox[j].checked = false;
	        		}
	        	}
	        	getselectPrice();

        	},
        	cancelAll:function(){
        		i = 0;
        		for(var j=0;j<checkbox.length;j++)
            	{
            		if(checkbox[j].checked == false)
            		{
            			checkbox[j].checked = true;
            		}
            	}
            	getselectPrice();
        	}
        }
        $(".mui-input-numbox").blur(function(){
        	var num = $(this).val();
        	var cartid = $(this).next().next().val();
        	if(num <= 0)
        	{
        		$(this).val(1);
        	}
        	$.ajax({
        		type:"POST",
        		url:"/order/updatecart",
        		dataType:"json",
        		data:{num:num,cartid:cartid},
        		success:function(str){
        			var total_price = str.total_price;
        			$("#"+cartid).html(total_price);
        			$("#u"+cartid).val(total_price);
        		},
        		error:function(str){},
        	})
        	getselectPrice();
        })
        $(".plus").click(function(){
        	var num = $(this).prev().val();
        	num++;
        	$(this).prev().val(num);
        	var cartid = $(this).next().val();
        	$.ajax({
        		type:"POST",
        		url:"/order/updatecart",
        		dataType:"json",
        		data:{num:num,cartid:cartid},
        		success:function(str){
        			var total_price = str.total_price;
        			$("#"+cartid).html(total_price);
        			$("#u"+cartid).val(total_price);
        		},
        		error:function(str){},
        	})
        	getselectPrice();
        	
        })
        $(".minus").click(function(){
        	var num = $(this).next().val();
        	
        	num--;
        	if(num == 0)
        	{
        		$(this).next().val(1);
        	}else{
        		$(this).next().val(num);
	        	var cartid = $(this).prev().val();
	        	$.ajax({
	        		type:"POST",
	        		dataType:"json",
	        		data:{num:num,cartid:cartid},
	        		url:"/order/updatecart",
	        		success:function(str){
	        			var total_price = str.total_price;
	        			$("#"+cartid).html(total_price);
	        			$("#u"+cartid).val(total_price);
	        		},
	        		error:function(str){},
	        	})
        	}
        	getselectPrice();

          })
        $(".checkbox").click(function(){
        	getselectPrice();

        })
        function getselectPrice()
        {
        	 var cartselected = document.getElementsByClassName("checkbox");
        	 var cartids = '';
        	 for(var k=0;k<cartselected.length;k++)
	        	{   
	        		if(checkbox[k].checked == true)
	        		{
	        			var checkbox_val = checkbox[k].value;
	        			if(cartids == '')
	        			{
	        				cartids = checkbox_val
	        			}else{
	        			    cartids = checkbox_val+","+cartids;
	        	     	}
	        		}
	        	}
        	 console.log(cartids);
        	 $.ajax({
        	 	type:"POST",
        	 	dataType:"json",
        	 	url:"/order/getcartprice",
        	 	data:{cartids:cartids},
        	 	success:function(str){
        	 		var cartprice = str.cartprice;
        	 		console.log(cartprice);
        	 		document.getElementById('cartSum').innerText = cartprice;
        	 	},
        	 	error:function(str){},
        	 })
        }
	</script>

</html>