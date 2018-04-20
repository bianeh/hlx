<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>待发货/待付款/待收货/待评价</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/iconfont.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/detail.css">
    <style>
        a{
            color:#808080;
        }
        .mui-content {
            background: #fff;
        }
        .productDetail{
            width: 95%;
            height: 1.8rem;
            padding:0.4rem 0 0.4rem 1.04rem;
        }
        .productDetail .left{
            width: 1.62rem;
            height: 100%;
            float: left;

        }
        .productDetail .left img{
            width: 1.62rem;
            height:1.8rem;
            border-radius: 0.2rem 0 0 0.2rem;
        }
        .productDetail .right{
            width: 4rem;
            height: 1.8rem;
            background: #f6f6f8;
            float: right;
            border-radius:0 0.2rem 0.2rem 0 ;
        }
        .like .pro .content .assesment .productDetail .right .name{
            display: inherit;
            width: 95%;
            float: left;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .productDetail .right .guige{
           font-size: 0.24rem;
            padding: 0.1rem;
            background: #fff;
            color: #666;
            text-align: left;
            line-height: 0.24rem;
           margin-left: 0.3rem;
            border-radius: 0.4rem;
            float: left;
        }
        .productDetail .right .price{
            width: 100%;
            height: 0.26rem;
            float: left;
            display: flex;
            justify-content:space-around;
            font-size: 0.24rem;
        }
        .productDetail .right .price span{
            color: #ea4a4a;
        }
        .like .pro .content .assesment .eve li{
            height: 6.7rem;
        }
    </style>
</head>

<body>
<!--header start-->
<header class="mui-bar mui-bar-nav up-bar-nav" style="background: #fff">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title up-title">评价</h1>
</header>
<!--header end-->
<!--cont start-->
<div class="mui-content my-cart-content pad50 mui-scroll-wrapper" >
    <div class="mui-scroll">
        <!--cont-list start-->
        <div class="like likes">
            <div class="pro pros">
                <ul class="content">
                    <li class="description assesment active">
                        <ul class="eve">
                            <li>
                                <a href="javascript:;">
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
                                    <div class="productDetail">
                                        <div class="left">
                                            <img src="<?php echo Yii::$app->params['common_url'];?>/images/banner@2x.png" alt="">
                                        </div>
                                        <div class="right">
                                            <p class="name">购买日期购买日期购买日期购买日期</p>
                                            <span class="guige">檀木原色</span>
                                            <div class="price">
                                                <span>￥254.00 <i style="font-style: normal;color: #000">礼盒 ￥50</i> </span>
                                                <span style="color: #d1d1d3">X 1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="four">
                                        <p class="time" style="display:inherit;text-align: right;padding-right: 0.35rem">购买日期 2018-01-02</p>
                                    </div>
                                </a>
                            </li>
                            <div class="interval"></div>
                            <li>
                                <a href="javascript:;">
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
    </div>
</div>
</div>

</body>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/tools.js" ></script>-->
<!--<script src="<?php echo Yii::$app->params['common_url'];?>/js/url_list.js"></script>-->
<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/order_realize.js" ></script>-->
<!--<script src="<?php echo Yii::$app->params['common_url'];?>/js/orderDetail.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js" ></script>
<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/tools.js" ></script>-->
<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/address.js" ></script>-->
<script>
    mui.init();
    (function($) {
        $(".mui-scroll-wrapper").scroll({
            bounce: false, //滚动条是否有弹力默认是true
            indicators: false, //是否显示滚动条,默认是true
        });

    })(mui);
</script>

</html>