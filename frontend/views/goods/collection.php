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
    <style>
        .mui-content{
            background: #fff;
        }
        /*列表*/
        .list{
            width: 100%;
            height: auto;
            padding: 0.49rem 0.1rem;
            float: left;
        }
        .list li{
            width: 3.3rem;
            height: 4.6rem;
            float: left;
            margin: 0  0.17rem 0.5rem;
            border-radius: 0.6rem 0.6rem 0.2rem 0.2rem;
            box-shadow: -1px 2px 16px rgba(0,0,0,0.3);
        }
        .list li a {
            display: block;
            width: 3.3rem;
            height: 4.6rem;
            position: relative;
        }
        .list li a .zhushi{
            position: absolute;
            left:0;
            right:0;
            bottom:1.15rem;
            background: #ea4a4a;
            width: 100%;
            height: 0.4rem;
            margin:auto;
            font-size: 0.28rem;
            color: #fff;
            text-align: center;
            line-height: 0.4rem;
        }
        .list li img{
            width: 100%;
            height: 3.41rem;
            border-radius: 0.6rem 0.6rem 0 0;
            float: left;
        }
        .list li .intro{
            width: 100%;
            font-size: 0.28rem;
            line-height: 0.28rem;
            float: left;
            overflow: hidden;
            margin-top: 0.28rem;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding: 0 0.2rem;
        }
        .list li strong{
            color: #ea4a4a;
            font-size: 0.3rem;
        }
        .list li .price{
            padding: 0 0.2rem;
        }
        .list li .price span{
            float: right;
        }
        .lose{
            width: 100%;
            height: auto;
            float: left;
        }
        .lose h2{
            display: flex;
            justify-content:space-between;
            font-size: 0.26rem;
            line-height: 0.4rem;
            color:#ea4a4a;
            padding: 0 0.24rem;
        }
        .lose input{
            width: 1.7rem;
            border: none;
            height: 0.6rem;
            background: #ea4a4a;
            font-size: 0.26rem;
            text-align: center;
            line-height: 0.44rem;
            color:#fff;
            border-radius: 0.4rem;
        }
    </style>
</head>

<body>
<!--header start-->
<header class="mui-bar mui-bar-nav up-bar-nav" style="background: #fff">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title up-title">收藏</h1>
</header>
<!--header end-->
<!--cont start-->
<div class="mui-content my-cart-content pad50 mui-scroll-wrapper" >
    <div class="mui-scroll">
        <!--cont-list start-->
        <!--list start-->
        <ul class="list">
          <?php foreach($collectinfo as $key=>$val) { ?>
            <li class="every">
                <a href="detail.html">
                    <img src="/images/getpic?goodsid=<?= $val['goodsid']?>" alt="">
                    <p class="intro"><?= $val['name'] ?></p>
                    <p class="price">
                        <strong>￥<?= $val['marketprice'] ?></strong>
                        <span>销量 <?= $val['total_sell'] ?></span>
                    </p>
                   <!--  <p class="zhushi">比收藏时降价50元</p> -->
                </a>
            </li>
          <?php } ?>    
        </ul>
</div>
</div>

</body>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js" ></script>
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