<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>海岚香--网站公告</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzMessage.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
    <style>
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
        .info{background:#FFFFFF;text-align:center;margin-top:60px;padding:5px;}
        .info>h4{text-align:center;color:#666 !important;}
        .info>div{text-align:center;color:#666;}
        .ftime{font-size:12px;margin-right:15px;text-align:right !important;border-bottom:1px dashed #dddddd;margin-bottom:5px;}
    </style>
</head>
<body>
<!--header start-->
<header class="mui-bar mui-bar-nav" style="box-shadow: none;height: 1rem;background: #fff;border-bottom:1px solid #e3e3e5;">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color:#1b1835"></a>
    <h1 class="mui-title" style="color:#1b1835;">网站公告</h1>
</header>
<!--header end-->
<div class="mui-content mui-scroll-wrapper" style="padding-top: 0">
    <div class="mui-scroll">
        <div class="info">
              <h4><?= $wapnotifyinfo['title'] ?></h4>
              <div class="ftime">发布时间:<?= $wapnotifyinfo['createtime'] ?></div>
              <div><?= $wapnotifyinfo['content'] ?><div>
              <div style="clear:both"></div>
        </div>
    </div>
</div>
</body>
<!--<script src="<?php echo Yii::$app->params['common_url'];?>/js/common.js"></script>-->
<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js"></script>
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
