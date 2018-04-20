<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>login</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzlogin.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <style>
        #cord.login-a{
            width: 32%;
            background: #999999;
            color:#000;
            text-align: center;
        }
        .error{
            font-size: 0.24rem;
        }
        form .pass{
            display: block;
        }
        header{
            height: 30%;
        }
        header:after{
            border-color: #fff;
        }
        .other a{
            width: 76%;
            text-align: right;
        }
        input:-webkit-autofill {-webkit-box-shadow: 0 0 0px 1000px white inset;}
        .invisible{display:inline-block;}
        .visible{display:block;}
    </style>
</head>
<body>
<div class="box">
    <header>
    </header>
    <div class="con">
        <form action="/account/doregister" id="login-form" method="post">
            <div class="user">
                <img src="<?php echo Yii::$app->params['common_url'];?>/img/icon_dengolu_input@2x.png" alt="">
                <input type="text" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" placeholder="请输入手机号码" maxlength="11" minlength="11" id="txtUser" value=""  name="phone">
            </div>
            <div class="pass user user1">
                <img src="<?php echo Yii::$app->params['common_url'];?>/img/icon_mima_input@2x.png" alt="">
                <input type="password" name="password" id="txtPassword" value="" placeholder="请输入密码" >
                <i class="fa fa-eye" aria-hidden="true" id="visible" class="visible" onclick="visible()" style="display:none"></i>
                <i class="fa fa-eye-slash" aria-hidden="true" id="invisible" onclick="invisible()" class="invisible"></i>
            </div>
            <div class="pass user user1">
                <img src="<?php echo Yii::$app->params['common_url'];?>/img/icon_yzm_input@2x.png" alt="">
                <input type="text" placeholder="请输入验证码" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" maxlength="6" id="txtCode"  value="" name="txtCode">
                <input type="button" value="获取验证码" id="cord">
            </div>
            <div class="error_alert erron_alert" style="display: none">
                <span class="error"></span>
            </div>
        </form>
         <div class="login-btn">
                <input type="button" id="reg" value="立即注册">
            </div>
        <div class="other">
            <a href="/account/login">已有账号直接登陆 > ></a>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
     function invisible()
     {
         var visible = document.getElementById("visible");
         var invisible = document.getElementById("invisible");
         var txtPassword = document.getElementById("txtPassword");
         if(txtPassword.type == "password")
         {
            txtPassword.type = "text";
            visible.style.display = 'inline-block';
            invisible.style.display = 'none';
         }
     }

     function visible(){
         var visible = document.getElementById("visible");
         var invisible = document.getElementById("invisible");
         var txtPassword = document.getElementById("txtPassword");
         if(txtPassword.type == "text")
         {
            txtPassword.type = "password";
            visible.style.display = 'none';
            invisible.style.display = 'inline-block';
         }
     }
</script>
<!--<script type="text/javascript" src="../js/mui.js" ></script>-->
<!--<script src="../js/common.js"></script>-->
<!--<script type="text/javascript" src="../js/immersed.js" ></script>-->
<!--<script type="text/javascript" src="../js/common_login.js" ></script>-->
<!--<script type="text/javascript" src="../js/oauth_login.js" ></script>-->
<script>
    $(document).ready(function () {
　　$('body').height($('body')[0].clientHeight);
	});
</script>
<script>
    window.load = function(){ 
          document.getElementById("txtUser").value = '';
          document.getELementById("txtPassword").value = '';
    }; 
    // window.onload = function(){
    //     document.getElementById("txtUser").value = '';
    //     document.getELementById("txtPassword").value = '';
    // }
    // mui.init({
    //        swipeBack:true //启用右滑关闭功能
    //    });
    var User= /^1[3-9]\d{9}$/;    //手机号
    var Code= /^[0-9]{4,8}$/;    //验证码
    var error_1= '请填写正确的手机号格式';
    var error_2= '您的的手机号/验证码错误';
    var error_3= '短信验证码格式有误';
    var error_4= '请稍后';
    //验证码
    $("#txtCode").blur(function(){
        var txtCode = $("#txtCode").val();
        if(!txtCode.match(Code)){
            $(".erron_alert").show();
            $(".error").text(error_3);
            return;
        }
        $(".erron_alert").hide();// 隐藏
    })
    $('#cord').click(function() {
        var txtUser = $("#txtUser").val();

        if(!txtUser.match(User)){
            $(".erron_alert").show();
            $(".error").text(error_1);
            $("#txtUser").focus();
            return false;
        }

        if(!$(this).hasClass('login-a')){
            clearInterval(resend);
            var btn=$(this);
            var count=60;
            btn.val(count+'S获取').addClass('login-a');

            var resend=setInterval(function(){
                count--;
                if(count>0){
                    btn.val(count+'S获取');
                    return false;

                }else{
                    clearInterval(resend);
                    btn.val('获取验证码').removeClass('login-a');
                }
            },1000);
            $.ajax({
                url: "/account/getcode",
                type: "post",
                data: {"mobile": txtUser},
                dataType: "json",
            })
                .done(function(d){
                    if(d.code == 000007){
                        $(".erron_alert").show();
                        $('.error').text("获取验证码失败，请重新获取");
                    }else if(d.code == 000008){
                        console.log("获取验证码成功");
                        //clearInterval(resend);
                        //btn.val('获取验证码').removeClass('login-a');
                    }
                })
        }
    })
    $('.login-btn input').click(function () {
        var txtUser = $("#txtUser").val();
        var txtPassword = $("#txtPassword").val();
        if(window.localStorage) {
//            localStorage.setItem("loginName", txtUser)
//            var user = {};
//            user.name = txtUser;
//            user.login_img = "";
//            user.id = txtUser;
//            user.phone = txtUser;
//            localStorage.setItem("user", JSON.stringify(user));

            var txtCode = $("#txtCode").val();
            if (!txtUser.match(User)) {
                $(".erron_alert").show();
                $(".error").text(error_2);
                return;
            }
            //验证码
            if (!txtCode.match(Code)) {
                $(".erron_alert").show();
                $(".error").text(error_2);
                return;
            }
            if (txtUser && txtCode) {
                $.ajax({
                    url:"/account/doregister",
                    type: "post",
                    data: {"phone": txtUser, "password": txtPassword, "code": txtCode},
                    dataType: "json",
                })
                    .done(function (d) {
                        if (d) {
                            if (d.code == 000001) {
                                $(".erron_alert").show();
                                $('.error').text(d.msg);
                            } 
                             else if (d.code == 000002) {
                                $(".erron_alert").show();
                                $('.error').text(d.msg);
                            }
                            else if (d.code == 000008) {
                                $(".erron_alert").show();
                                $('.error').text(error_4);
                                location.href = "/index/index";
                            }
                        } else {
                            $(".erron_alert").show();
                            $('.error').text(d.msg);
                            return;
                        }
                    })
            }
        }
    })
</script>
<!--<script>
    $(document).ready(function(){
        $("#reg").click(function(){
             var txtUser = document.querySelector("#txtUser");
             var txtCode = document.querySelector("#txtCode");
             var txtPassword = document.querySelector("#txtPassword");
             $.ajax({
                  method:"POST",
                  url:"/account/doregister",
                  data:{phone:txtUser,password:txtPassword,code:txtCode}
                }).done(function(msg){
                    var data = JSON.parse(msg);
                    var code = data['code'];
                    if(code == '000001')
                    {
                        alert("手机验证码不正确！");
                    }
                    if(code == '000008')
                    {
                        window.location.href="/index/index";
                    }
                })
        })
    })
   
</script>-->
</html>