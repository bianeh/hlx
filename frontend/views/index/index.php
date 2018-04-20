<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>海岚香--首页</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
                <script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
                <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/index.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css">
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script>
		<style>
			body{
	            background: #fff;
			}
            .header-main .research img{
                right:30%;
            }  
            .mui-slider{
            	margin-top:0.9rem;
            }
            .mui-indicator{
            	width:10px;
            	height:10px;
            	border-radius:10px;
            }
            .mui-slider-indicator .mui-indicator{
            	width:12px !important;
            	height:12px !important;
            	margin-left: -9px !important;
            	opacity:0.7;
            }
		</style>
	</head>
	<body>
		<!--header start-->
		<header> <form id="search" action="" method="get">
			<div class="header-main">
                           
				<div class="news img messageId">
                                    <a href="/wbinfo/index"><img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_news@2x.png" alt=""></a>
				</div>
				<div class="research">
                                        <img onclick="search()" src="<?php echo Yii::$app->params['common_url'];?>/images/btn_search@2x.png" alt="">
					<input name="keywords" type="text" placeholder="关键字搜索">
				</div>
				<div class="scanCode img">
					<img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_scanning@2x.png" alt="">
				</div>
                           
			</div> </form>

		</header>
	    <!--header end-->
        <div class="mui-content mui-scroll-wrapper" style="background-color:#fff">
            <div class="mui-scroll">
		<!--banner start-->
		<div id="slider" class="mui-slider">
			<div class="mui-slider-group mui-slider-loop">
			<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
			<div class="mui-slider-item mui-slider-item-duplicate">
			<a href="<?= $wapadvinfo[0]['url'] ?>">
			<img src="/images/getbanner?id=<?= $wapadvinfo[0]['id'] ?>">
			</a>
			</div>
			<?php foreach ($wapadvinfo as $key => $value) { ?>
				<div class="mui-slider-item">
					<a href="<?= $value['url'] ?>" class="detailId">
						<img src="/images/getbanner?id=<?= $value['id'] ?>" alt="">
					</a>
				</div>
            <?php } ?>
			<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
			<div class="mui-slider-item mui-slider-item-duplicate">
			<a href="<?= $wapadvinfo[count($wapadvinfo)-1]['url'] ?>">
			   <img src="/images/getbanner?id=<?= $wapadvinfo[count($wapadvinfo)-1]['id'] ?>">
			</a>
			</div>
			</div>
			<div class="mui-slider-indicator">
			<div class="mui-indicator mui-active"></div>
			      <?php $length = count($wapadvinfo);for($i=0;$i<$length-1;$i++){ ?>
			        <div class="mui-indicator"></div>
			      <?php } ?>
			</div>
         </div>
		<!--banner end-->
		<!--classify start-->
		<div class="classifyList">
			<ul class="classify">
				<li>
					<a href="/category/index"  class="fenId">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/btn_oolong@2x.png" alt="">
						<span>寿宁高山乌龙茶</span>
					</a>
				</li>
				<li>
					<a href="/category/index"  class="fenId">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/btn_blacktea@2x.png" alt="">
						<span>寿宁高山红茶</span>
					</a>
				</li>
				<li>
					<a href="/category/index"  class="fenId">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/btu_green@2x.png" alt="">
						<span>寿宁高山绿茶</span>
					</a>
				</li>
				<li>
					<a href="/category/index"  class="fenId">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/btu_white@2x.png" alt="">
						<span>寿宁高山白茶</span>
					</a>
				</li>
				<li>
					<a href="/category/index"  class="fenId">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/btu_Catalog@2x.png" alt="">
						<span>分类</span>
					</a>
				</li>
			</ul>
		</div>
		<!--classify end-->
		<!--notice start-->
		<div class="noticeList">
			<a href="/wapnotify/index" class="noticeId messageId">
				<ul class="announce">
					<li class="anLeft">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/ioon_Notice@2x.png" alt="">
					</li>
					<li class="anRight">
						<div class="style">
							<div class="span">新</div>
							<div class="span">热</div>
						</div>
						<ul class="styles">
                                                    <?php foreach ($wapnoticeinfo as $key => $value) { ?>
                                                        <li class="anRightP winId"><?= $value['title']?>....</li>
                                                    <?php }?>
						</ul>
					</li>
				</ul>
			</a>
		</div>
		<!--notice end-->
		<!--displayImg start-->
		<div class="display">
			  <div class="pics">
                            <img height='100px' width="100%" src="/images/getbanner?id=<?= $wapzwinfo['id'] ?>" alt="">
			  </div>
		</div>
		<!--displayImg end-->
		<!--list start-->
		<ul class="list">
                         <?php foreach ($goodsinfo as $key => $value) { ?>
				<li class="every">
					<a href="/goods/detail?goodsid=<?= $value['Id']?>" class="detailId">
						<img src="/images/getpic?goodsid=<?= $value['Id'] ?>" alt="">
						<p class="intro"><?= $value['name']?></p>
						<p class="price">
							<strong>￥<?= $value['accountprice']?></strong>
							<span>销量<?= $value['total_sell'] ?></span>
						</p>
						<p class="giftBox">
							<strong>￥<?= $value['teaid']?></strong>
							<span>礼盒价</span>
						</p>
					</a>
				</li>
                         <?php } ?>

		</ul>
		<!--list end-->
            </div>
        </div>
		<!--footer start-->
		<footer>
			<div class="footer-main">
				<a href="/index/index"  class="setting">
					<div class="pics a active">
					</div>
					<div class="intros active">首页</div>
				</a>
				<a href="/tea/index" id="tea" class="setting tea">
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
					<div class="pics e">
					</div>
					<div id="usercenter" class="intros">我的</div>
				</a>
			</div>
		</footer>
	    <!--footer end-->
	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/l-slide.js"></script>
<!--	<script src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js"></script>-->
	<script>
        mui.init();
        (function($) {
            $(".mui-scroll-wrapper").scroll({
                bounce: false, //滚动条是否有弹力默认是true
                indicators: false, //是否显示滚动条,默认是true
            });
        })(mui);
        //轮播
        $(function() {
            //获取li每行的高度，动画移动的高度
            var liHeight = $('li').height();
            //调用插件
            $('.winId').lSlide({
                nTop: liHeight
            });
        })
        function search()
        {
            document.getElementById("search").submit();
        }
	</script>
<!--        <script>
            var usercenter = document.getElementById("usercenter");
            var tea = document.getElementById("tea");
            usercenter.onclick = function()
            {
                window.location.href="/usercenter/index";
            }
            tea.onclick = function(){
                window.location.href="/tea/index";
            }
       </script>-->
</html>
