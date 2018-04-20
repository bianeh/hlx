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
        .align{
            vertical-align:middle;
        }
        .font{
            display:inline-block;
            padding-bottom:7px;
        }
        .other>a{
            display:inline-block;
        }
	</style>
        
</head>
<body>
	<div class="box">
		<header>
			<span class="active">登录</span>
                        <span><a href="/account/fast_login">快捷登陆</a></span>
		</header>
		<div class="con">
				<form  id="login-form" method="post">
					<div class="user">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/icon_dengolu_input@2x.png" alt="">
						<input type="tel" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" placeholder="请输入手机号码" id="txtUser" name="phone">
					</div>
                     <div class="pass user user1 active">
                        <img src="<?php echo Yii::$app->params['common_url'];?>/img/icon_mima_input@2x.png" alt="">
                        <input type="password" name="password" id="txtPassword" value="" placeholder="请输入密码" >
                        <i class="fa fa-eye" aria-hidden="true" id="visible" class="visible" onclick="visible()" style="display:none"></i>
                        <i class="fa fa-eye-slash" aria-hidden="true" id="invisible" onclick="invisible()" class="invisible"></i>
                    </div>
					<!-- <div class="pass user user1 active">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/icon_mima_input@2x.png" alt="">
						<input type="password" name="password" id="txtPassword" class="align" placeholder="请输入密码" >
                        <span class="font"><i class="fa fa-eye" aria-hidden="true" id="visible"  class="visible" onclick="visible()" style="font-size:0.25rem;display:none;"></i></span>
                        <span class="font"><i class="fa fa-eye-slash" aria-hidden="true" id="invisible"  style="font-size:0.25rem;" onclick="invisible()" class="invisible"></i></span>
					</div> -->
					<div class="pass user user1">
						<img src="<?php echo Yii::$app->params['common_url'];?>/img/icon_mima_input@2x.png" alt="">
						<input type="tel" placeholder="请输入验证码"  id="txtCode" name="txtCode">
						<input type="button" value="获取验证码" id="cord">
					</div>
					<div class="error_alert erron_alert" style="display: none">
						<span class="error"></span>
					</div>
					
				</form>
                                   <div class="login-btn">
						<input type="submit" value="登录">
				   </div>
			<div class="other">
    				<a href="/account/register">注册</a>
    				<a href="/account/forgetpasspwd">找回密码 ?</a>
			</div>

		</div>

	</div>
</body>
<script>
    $(document).ready(function () {
　　$('body').height($('body')[0].clientHeight);
	});
</script>
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
<script type="text/javascript" src="../js/mui.js" ></script>
<script src="../js/common.js"></script>
<script type="text/javascript" src="../js/immersed.js" ></script>
<script type="text/javascript" src="../js/common_login.js" ></script>
<script type="text/javascript" src="../js/oauth_login.js" ></script>
<script>
	// mui.init({
     //        swipeBack:true //启用右滑关闭功能
     //    });
    var User= /^1[3-9]\d{9}$/;    //手机号
    var Code= /^[0-9]{4,8}$/;    //验证码
    var error_1= '请填写正确的手机号格式';
    var error_2= '您的的手机号/验证码错误';
    var error_3= '短信验证码格式有误';
    var error_4= '请稍后';
//    $("header span").click(function() {
//        var index = $(this).index();
////        $("header span").filter(".active").removeClass('active').end().eq(index).addClass('active');
//        $("form .pass").filter(".active").removeClass('active').end().eq(index).addClass('active');
//    });
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
                url: regCode,
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
//        if(window.localStorage) {
//            localStorage.setItem("loginName", txtUser)
//            var user = {};
//			user.name = txtUser;
//			user.login_img = "";
//			user.id = txtUser;
//			user.phone = txtUser;
//			localStorage.setItem("user", JSON.stringify(user));
		
//            var txtCode = $("#txtCode").val();
            if (!txtUser.match(User)) {
                $(".erron_alert").show();
                $(".error").text(error_2);
                return;
            }
            var txtPassword = $("#txtPassword").val();
//            //验证码
//            if (!txtCode.match(Code)) {
//                $(".erron_alert").show();
//                $(".error").text(error_2);
//                return;
//            }
            if (txtUser && txtCode) {
                $.ajax({
                    url: "/account/dologin",
                    type: "post",
                    data: {"phone": txtUser, "password": txtPassword},
                    dataType: "json",
                })
                    .done(function (d) {
                        console.log(d)
                        if (d) {
                            if (d.code == 000001) {
                                $(".erron_alert").show();
                                $('.error').text(d.msg);
                            } else if (d.code == 000008) {
                                $(".erron_alert").show();
                                $('.error').text(error_4);
                                location.href = "/index/index";
                            }
                        } else {
                            $(".erron_alert").show();
                            $('.error').text(error_2);
                            return;
                        }
                    })
            }
//        }
    })
</script>
</html>