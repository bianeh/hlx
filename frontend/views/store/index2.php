<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>海岚香--体验店</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/store.css">
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
    <style>
        .header-main .research input{
            text-align: left;
           padding-left: 0.2rem;
        }
        .conList
        {
            padding-top:20px;
        }
        .conList li{
            height:3rem;
        }
    </style>
</head>
<body>
    <!--header start-->
    <header>
        <div class="header-main">
            <div class="news img">
                <img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_news@2x.png" alt="">
            </div>
            <div class="research">
                <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_search@2x.png" alt="">
                <input type="text" placeholder="关键字搜索">
            </div>
            <div class="scanCode img">
                <img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_scanning@2x.png" alt="">
            </div>
        </div>
    </header>
    <!--header end-->
    <!--con start-->
    <div class="con">
        <ul class="conList">
            <?php foreach ($storeinfo as $key => $value) { ?>
            <li>
                <img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="" class="img">
                <h2 class="name"><?= $value['name'] ?></h2>
                <a href="javascript::" class="address">
                    <img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_dizhi@2x.png" alt="" class="icons">
                    <span class="left nav" data-mapx="121.234291" data-mapy="31.204833"><?= $value['province']?><?= $value['city']?></span>
                    <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png" alt="" class="jiantou">
                </a>
                <a href="" class="address phone">
                    <img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_touxiang@2x.png" alt="" class="icons">
                    <span class="left" style="color:#333332"><?= $value['linker'] ?></span>
                    <a class="right" href="tel:48888888">打电话预约</a>
                    <img src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png" alt="" class="jiantou">
                    
                </a>
                <div class="interval"></div>
            </li>
            <?php } ?>
           
        </ul>
    </div>
    <!--con end-->
    <!--footer start-->
    <footer>
        <div class="footer-main">
				<a href="/index/index"  class="setting">
					<div class="pics a">
					</div>
					<div class="intros">首页</div>
				</a>
				<a href="/tea/index" id="tea" class="setting tea">
					<div class="pics b">
					</div>
					<div class="intros">茶园</div>
				</a>
				<a href="/store/index" class="setting">
					<div class="pics c active">
					</div>
					<div class="intros active">体验店</div>
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
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/info.js"></script>
	<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/main.js"></script>
</html>