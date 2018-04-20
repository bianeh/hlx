<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会员认证</title>
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
        .recoginize{
            margin-top:60px;
        }
        .dorecoginize{
            display:inline-block;
            width:100%;
            height:45px;
            background:#CD5555 !important;
            border:0 !important;
            color:#FFFFFF !important;
        }
        .mobile_code{
            display: inline-block;
            width: 66% !important;
        }
        .getcode{
            display:inline-block;
            width:32% !important;
            height:50px;
            margin-left:2%;
        }
        input{
            display: inline-block;height:50px !important;
        }
        /*.mui-scroll{width:95%;margin:0 auto;text-align:center !important;position:static;}*/

    </style>
</head>

<body>
<!--header start-->
<header class="mui-bar mui-bar-nav" style="box-shadow: none;height: 1rem;background: #fff;border-bottom:1px solid #e3e3e5;">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color:#1b1835"></a>
    <h1 class="mui-title" style="color:#1b1835;">认证会员</h1>
</header>
<!--header end-->
<div class="mui-content mui-scroll-wrapper" style="padding-top: 0">
    <div class="mui-scroll">
       <div class="recoginize">
        <input type="text" placeholder="请输入邀请号" name="tuiguanghao" id="tuiguanghao" />
       </div>
       <div>
        <input type="text" placeholder="请输入验证码" maxlength="6" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" class="mobile_code" name="code" id="code" /><input id="getcode" class="getcode" type="button" value="获取验证码" />
       </div>
       <div>
        <input type="button" class="dorecoginize" id="recoginize" value="认证会员" />
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
<script type="text/javascript">
     var recoginize = document.getElementById("recoginize");
     var getcode = document.getElementById("getcode");
     var time = 60;
     getcode.onclick=function(){
         var tuiguanghao = document.getElementById("tuiguanghao").value;
         if(tuiguanghao == ''){
            alert("请填写邀请号");

         }else{
             $.ajax({
            type:"POST",
            url:"/usercenter/getcode",
            dataType:"json",
            data:{},
            success:function(str){},
            error:function(str){},
             })
             document.getElementById("getcode").disabled = "false";
             document.getElementById("getcode").value=time+"s";
             var t = setInterval(n,1000);
             function n()
             {
                time--;
                document.getElementById("getcode").value=time+"s";
                if(time<0)
                {
                    clearInterval(t);
                    time = 60;
                    document.getElementById("getcode").value="重发";
                    document.getElementById("getcode").removeAttribute('disabled');

                }
             }

          }
     }
     recoginize.onclick=function(){
         var code = document.getElementById("code").value;
         var tuiguanghao = document.getElementById("tuiguanghao").value;
         if(tuiguanghao != '')
         {
             if(code != '')
             { 
                $.ajax({
                    type:"POST",
                    url:"/usercenter/dorecoginize",
                    dataType:"json",
                    data:{code:code,tuiguanghao:tuiguanghao},
                    success:function(str){
                        var code = str.code;
                        var msg = str.msg;
                        if(code == '000000')
                        {
                            alert("认证会员成功");
                        }else{
                            alert(msg);
                        }
                    },
                    error:function(str){},
                })

             }else{
                alert("请输入手机验证码");
             }
         }else{
            alert("请输入邀请号");
         }

     }
</script>
</html>
