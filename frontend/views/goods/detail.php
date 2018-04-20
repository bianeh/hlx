<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<title>商品详情</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/iconfont.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/detail.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/detailbottomn.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/common.css">
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script>
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
                <script src="<?php echo Yii::$app->params['common_url'];?>/js/NativeShare.js"></script>
		<style>
			body 
                        {
				background-color: #fff;
			}
			
			.mui-content 
                        {
				background: #fff;
			}
			
			.swiper-container 
                        {
			    width: 100%;
			    height: 4.9rem;
			}
			
			.swiper-wrapper 
                        {
			    width: 100%;
			    height: 100%;
			}
			
			.swiper-wrapper img 
                        {
			     width: 100%;
			     height: 100%;
			}
			
			.mui-scroll-wrapper 
                        {
			    overflow: inherit;
			    height: auto;
			}
                        .head
                        {
                            font-size:0.4rem;
                        }
                        .spec
                        {
                            font-size:0.3rem;
                        }
		</style>
	</head>
	<body>
		<!--header start-->
		<header class="mui-bar-transparent">
			<div class="header-main">
				<span class="back iconfont icon-fanhuiico mui-action-back" style="font-size: 0.4rem;"></span>
				<span class="head">商品详情</span>
				<div class="iconfont service shopId">
                                    <a href="/cart/index"><img src="<?php echo Yii::$app->params['common_url'];?>/img/btn_shopcar@2x.png" alt=""></a>
				</div>
				<div class="iconfont messageId">
                                    <a href="/wbinfo/index"><img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_news@2x.png" alt=""></a>
				</div>
			</div>
		</header>	
		<!--header end-->
		<div class=" mui-content mui-scroll-wrapper" style="margin-top: 50px">
			<div class="mui-scroll">
				<!--banner start-->
				<div id="slider" class="mui-slider" style="height: 7.49rem">
					<div class="mui-slider-group mui-slider-loop">
				       <?php foreach ($imagesinfo as $key => $value) { ?>
						<!-- 第一张 -->
						<div class="mui-slider-item">
							<a href="#">
								<img src="/images/getdetailpic?Id=<?= $value['Id'] ?>">
							</a>
						</div>
                        <?php } ?>	
					</div>

				</div>
				<!--banner end-->
				<div class="detail">
					<div class="names">
						<div class="name" id="orderName"><?= $goodsinfo['name'] ?></div>
						<div class="shares" >
							<img class="shareId" src="<?php echo Yii::$app->params['common_url'];?>/img/btn_share@2x.png" alt="">
							<span class="shareId">分享</span>
						</div>
					</div>
					<div class="intro">
						<!--市场价-->
						<p class="sale">折扣价 <span class="iconfont icon-qian" style="color: #000"></span><span style="color:#000;font-size: 0.38rem"  id="goods_price"><?= $goodsmodelinfo[0]['discountprice'] ?></span><span class="giftP">礼盒 ￥<?= $boxprice ?>.00</span></p>
						<p class="marketprice">原价<del style="text-decoration:line-through;">￥<?= $goodsmodelinfo[0]['price'] ?></del></p>
					</div>

					<!--说明-->
					<div class="state">
						<span>快递：0.00</span>
						<span>月销 <?= $goodsinfo['month_sell'] ?></span>
						<span>收藏<?= $collectnum ?></span>
					</div>
				</div>
				<div class="interval"></div>
				<!--商品详情-->
				<div class="like likes">
					<ul class="tab tabs">
						<li class="active">详情</li>
						<li>参数</li>
<!--						<li>评价</li>-->
					</ul>
					<div class="pro pros" style="padding-bottom: 50px;">
						<ul class="content">
							<li class="description active particulars">
<!--								<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
								<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
								<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">-->
                                                                <?= $goodsinfo['description'] ?>
							</li>
							<li class="description params">
								<div class="par"><div>品名</div><div><?= $goodsinfo['name'] ?></div></div>
								<div class="par"><div>原料</div><div><?= $goodsinfo['material'] ?></div></div>
								<div class="par"><div>产品标准</div><div><?= $goodsinfo['standard'] ?></div></div>
                                                                <div class="par"><div>储存方法</div><div><?= $goodsinfo['storagemethod'] ?></div></div>
                                                                <div class="par"><div>公司名称</div><div><?= $goodsinfo['productcompany'] ?></div></div>
                                                                <div class="par"><div>生产地址</div><div><?= $goodsinfo['productaddress'] ?></div></div>
                                                                <div class="par"><div>生产日期</div><div><?= $goodsinfo['productdate'] ?></div></div>
								<div class="par"><div>生产许可证号</div><div><?= $goodsinfo['licensenum'] ?></div></div>
							</li>
							<li class="description assesment">
								<p><span>此商品</span><span>好评度 99%</span></p>
								<div class="interval"></div>
								<ul class="eve">
									<li>
										<a href="javascript:;" class="evaluateId">
											<div class="one">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
												<div class="name">
													<p>jia***嘻嘻</p>
													<p>2018-01-04 20:10:10</p>
												</div>
												<div class="ping">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/xuanzhong@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
												</div>
											</div>
											<div class="two">
												<p>茶收到了，味道很纯正，香味扑鼻，味道很纯正，香味扑鼻。</p>
											</div>
											<div class="three">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
											</div>
											<div class="four">
												<p class="time">购买日期 2018-01-02</p>
											</div>
									    </a>
									</li>
									<div class="interval"></div>
									<li>
										<a href="javascript:;"  class="evaluateId">
											<div class="one">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
												<div class="name">
													<p>jia***嘻嘻</p>
													<p>2018-01-04 20:10:10</p>
												</div>
												<div class="ping">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/xuanzhong@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
													<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
												</div>
											</div>
											<div class="two">
												<p>茶收到了，味道很纯正，香味扑鼻，味道很纯正，香味扑鼻。</p>
											</div>
											<div class="three">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
												<img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
											</div>
											<div class="four">
												<p class="time">购买日期 2018-01-02</p>
											</div>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!--商品详情结束-->
		    </div>
		</div>
		<!--footer start-->
		<footer>
			<a href="tel:400488888" class="setting kefuId">
				<div class="iconfont">
					<img src="<?php echo Yii::$app->params['common_url'];?>/img/btn_user_service@2x.png" alt="">
				</div>
				<div class="intros">客服</div>
			</a>
			<a href="/collect/collect?Id=<?= $goodsinfo['Id'] ?>" class="setting attentionId">
				<div class="iconfont">
				<?php if($iscollect == 0) { ?>
					<img src="<?php echo Yii::$app->params['common_url'];?>/img/weixuan@2x.png" alt="">
				<?php } ?>
				<?php if($iscollect == 1) { ?>
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_shoucang@2x.png" alt="">
				<?php } ?>
 				</div>
				<div class="intros">收藏</div>
			</a>
			<a class="set" id="shopCarBtn" style="background: #f7ae3c">
				加入购物车
			</a>
			<a class="set" id="shopBtn" style="background: #b71627">
				购买
			</a>
		</footer>
		<!--footer end-->
		<!--mask start-->
		<div class="mask">
		</div>
		<!--mask end-->
		<!--join shopping cart start-->
		<ul class="join">
			<li class="error">
				<img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_close.png" alt="">
			</li>
			<li class="intro">
                                <div class="specimg">
				    <img src="/images/getgoodsmodelpic?Id=<?= $goodsmodelinfo[0]['Id'] ?>" class='img getOrderId order-img-id' >
                                </div>
				<div class="priceless">

					<div id="prices">
						<div class="original original-id">
							<p class="ori" id="goodsprice" style="color: #b71627">￥ <strong class="goods_price" style="font-size: 0.32rem"><?= $goodsmodelinfo[0]['discountprice'] ?></strong> <span style="color: #999"></span></p>
						</div>
						<div class="count count-id">
							<span style="color: #b71627">￥<strong id="boxprice" style="font-size: 0.32rem"><?= $boxprice ?></strong>  &nbsp;&nbsp;礼盒价</span>
						</div>
					</div>
				</div>
				<p class="repertory">

				</p>
			</li>
			<li class="size same">
				<h5>参数选择</h5>
				<ul class="kind sizeId">
                                        <?php foreach ($goodsmodelinfo as $key => $value) { ?>   
                                               <?php if($key == 0) { ?>
					                           <li class="spec active"><?= $value['name'] ?></li>
					                           <?php } ?>
					                           <?php if($key!= 0) { ?>
					                           <li class="spec"><?= $value['name'] ?></li>
					                           <?php } ?>
                                        <?php } ?>
                                        <input type="hidden" id="specname" value="<?= $goodsmodelinfo[0]['name'] ?>" />
				</ul>
			</li>
			<li class="quality">
				<div class="qua">
					<h5>购买数量</h5>
					<div class="mui-numbox pur" data-numbox-step='1' data-numbox-min='1'>
						<button class="mui-btn mui-btn-numbox-minus" type="button" class="on">-</button>
						<input id="num" class="mui-input-numbox" type="number" class="num" />
						<button class="mui-btn mui-btn-numbox-plus" type="button" class="on">+</button>
					</div>
				</div>
			</li>
			<li class="shopping">
				<div>选择属性</div>
				<a class="set shopId"  id="shopcart" style="background: #f7ae3c">
					加入购物车
				</a>
				<a class="set purchaseId" id="purchase"  style="background: #b71627">
					购买
				</a>
			</li>
		</ul>
		<!--join shopping cart end-->
		<!--share start-->
		<div class="shareTo">
			<div class="p">分享到</div>
			<ul class="shareStyle">
				<li class="qq" onclick="call('qqFriend')">
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_qq.png" alt="">
					<span>QQ</span>
				</li>
				<li class="qq wechat" onclick="call('wechatTimeline')">
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_pyq.png" alt="">
					<span>朋友圈</span>
				</li>
				<li class="qq" onclick="call('wechatTimeline')">
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_weixing.png" alt="">
					<span >微信</span>
				</li>
				<li class="qq"  onclick="call('weibo')">
					<img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_wb.png" alt="">
					<span>微博</span>
				</li>
				</li>
			</ul>
			<div class="cancel">
				<span>取消</span>
			</div>
		</div>
		<!--share end-->
	</body>
	<!--<script src="<?php echo Yii::$app->params['common_url'];?>/js/swiper-3.4.2.jquery.min.js"></script>-->
<!--	<script src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js"></script>-->
	<script>
		mui.init();
		(function($) {
			$(".mui-scroll-wrapper").scroll({
				bounce: true, //滚动条是否有弹力默认是true
				indicators: true, //是否显示滚动条,默认是true
			});
		})(mui);
		setTimeout(function(){
			    var gallery = mui('.mui-slider');
			    gallery.slider({
			         interval:3000//自动轮播周期，若为0则不自动播放，默认为0；
			    });
			},300);
        $(".like .tab li").click(function() {
            var index = $(this).index();
            $(".like .tab li").filter(".active").removeClass('active').end().eq(index).addClass('active');
            $(".like .pro .content li").filter(".active").removeClass('active').end().eq(index).addClass('active');
        });
		//分享
		$(".shareId").click(function(){
			$(".mask").show();
			$(".shareTo").show();
			$(".shareTo .cancel").click(function(){
				$(".mask").hide();
				$(".shareTo").hide();
			})
		})
		//.购物车
		$("#shopCarBtn").click(function(){
			$(".mask").show();
			$(".join").show();
			$(".join .error").click(function(){
				$(".mask").hide();
				$(".join").hide();
			})
			$(".size .kind li").click(function(){
				var index=$(this).index();
				$(".size .kind li").filter(".active").removeClass('active').end().eq(index).addClass('active');
			})
			$(".color .kind li").click(function(){
				var index=$(this).index();
				$(".color .kind li").filter(".active").removeClass('active').end().eq(index).addClass('active');
			})
		})
		//购买
		$("#shopBtn").click(function(){
			$(".mask").show();
			$(".join").show();
			$(".join .error").click(function(){
				$(".mask").hide();
				$(".join").hide();
			})
			$(".size .kind li").click(function(){
				var index=$(this).index();
				$(".size .kind li").filter(".active").removeClass('active').end().eq(index).addClass('active');
			})
			$(".color .kind li").click(function(){
				var index=$(this).index();
				$(".color .kind li").filter(".active").removeClass('active').end().eq(index).addClass('active');
			})
		})
	</script>
        <script>
            $(document).ready(function(){
                $(".spec").click(function(){
                    var specval = $(this).html();
                    var goodsid = <?= $goodsinfo['Id'] ?>;
                    $.ajax({
                        method:"POST",
                        url:"/goods/getspecinfo",
                        data:{'specval':specval,'goodsid':goodsid}
                    }).done(function(msg){
                        $(".img").remove();
                        var data = JSON.parse(msg);
                        var Id = data['Id'];
                        var price =data['price'];
                        var name = data['name'];
                        var boxprice = data['boxprice'];
                        $("#specname").val(name);
                        $("#boxprice").html(boxprice);
                        $(".goods_price").html(price);
                        var str = '<img src="/images/getgoodsmodelpic?Id='+Id+'" class="img getOrderId order-img-id" >';
                        $(".specimg").html(str);
                       
                    });
                });
                $("#purchase").click(function(){
                      var specname = $("#specname").val();
                      if(specname == '')
                      {
                          alert("请选择规格参数！");
                          return;
                      }
                      var goodsid = <?= $goodsinfo['Id'] ?>;
                      var num = $("#num").val();
                      window.location.href ="/order/purchase?specname="+specname+"&goodsid="+goodsid+"&num="+num;
                });
                $("#shopcart").click(function(){
                      var specname = $("#specname").val();
                      if(specname == '')
                      {
                          alert("请选择规格参数！");
                          return;
                      }
                      var goodsid = <?= $goodsinfo['Id'] ?>;
                      var num = $("#num").val();
                      window.location.href ="/cart/addshopcart?specname="+specname+"&goodsid="+goodsid+"&num="+num;
                });
                
            })
        </script>
        <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?d69321757dcfbfbe09dbddd4dca87b28";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
       </script>
    <script>
        var nativeShare = new NativeShare()
        var shareData = {
            title: '<?= $goodsinfo['name'] ?>',
            desc: '<?= $goodsinfo['name'] ?>',
            link: 'http://m.hailanxiang.cn:8082/goods/detail?goodsid=<?= $goodsinfo['Id'] ?>',
            icon: 'http://m.hailanxiang.cn:8082/images/getgoodsmodelpic?Id=<?= $goodsmodelinfo[0]['Id'] ?>',
            // 不要过于依赖以下两个回调，很多浏览器是不支持的
            success: function() {
                alert('success')
            },
            fail: function() {
                alert('fail')
            }
        }
        nativeShare.setShareData(shareData)

        function call(command) {
            try {
                nativeShare.call(command)
            } catch (err) {
                // 如果不支持，你可以在这里做降级处理
                //alert(err.message)
            }
        }

        function setTitle(title) {
            nativeShare.setShareData({
                title: title,
            })
        }
    </script>
</html>
