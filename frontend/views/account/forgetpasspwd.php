<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>忘记密码</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
    <!-- <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"> -->
    <style>
        .bound {
            width: 100%;
            height: 1.2rem;
            text-align: center;
            line-height: 1.2rem;
            color: #090723;
            font-size: 0.24rem;
            margin-top: 1.01rem;
            background: #fff;
        }
        .forget{
            float: right;
            font-size: 0.24rem;
            margin-top: 0.25rem;
            color: #090723;
        }
        .bound span {
            color: #6b78a2;
        }

        .bound.active {
            display: none;
        }
        form{
            margin-top: 50px;
        }
        form .user span {
            width: auto;
            height: auto;
            float: left;
        }

        form .user span img {
            width: 0.3rem;
            height: 0.4rem;
            margin: 0 auto;
        }

        form .user{
            width: 7.02rem;
            margin: 0.2rem 0.24rem 0;
            height: 1rem;
            float: left;
            padding: 0.3rem 0.3rem;
            background: #fff;
        }
        form .user1{
            border-top:0.01rem solid #efefef;
        }
        form .user input{
            width: 90%;
            height: 100%;
            float: left;
            margin-left: 0.1rem;
            border: none;
            font-size: 0.24rem;
        }
        form .user input:focus{
            outline: none;
        }
        form .user1 input[type=button]{
            width:7.02rem;
            height:1rem;
            margin: 0.4rem 0.24rem;
            background: #ea4a4a;
            color: #fff;
            font-size: 0.28rem;
            padding: 0;
            line-height: 1rem;
            text-align: center;
        }
        form .user .wid{
            width: 60%;
        }
        form .user .click{
            width: 30%;
            height: auto;
            float: right;
            font-size: 0.3rem;
            color:#f7ae3c;
        }
        .mask{
            width: 100%;
            height: 100%;
            position: absolute;
            top:0;left:0;
            margin:auto;
            background: rgba(0,0,0,0.4);
            z-index: 100;
        }
        .error{
            width:4.78rem;
            height: 2.63rem;
            position: absolute;
            top:40%;left:0;right:0;
            margin:auto;
            background: #fff;
            z-index: 111;
            padding: 0.46rem 0 0.35rem;
        }
        .error .head{
            width: 100%;
            height: 0.33rem;
            float: left;
            position: relative;
        }
        .error .head img{
            width: 0.33rem;
            height: 0.33rem;
            position: absolute;
            top:0;left:0;right: 0;
            bottom:0;
            margin:auto;
        }
        .error p{
            padding: 0.24rem 0 0.24rem;
            font-size: 0.28rem;
            color: #666;
            text-align: center;
            line-height: 0.91rem;
            border-bottom: 0.01rem solid #dfdfdf;
        }
        .error input{
            width: 100%;
            height: 0.84rem;
            border: none;
            outline: none;
            color: #ea4a4a;
            text-align: center;
            line-height: 0.5rem;
        }
        form .error_alert{
            width:100%;
            padding:0 0.5rem;
            height:0.4rem;
            font-size:0.24rem;
            float: left;
            margin-top: 0.2rem;
            /*display: none;*/
        }
        form .error_alert .errors{
            display: block;
            width: 100%;
            height:0.4rem;
            float: left;
            line-height: 0.3rem;
            color:#ff5252;
        }
        .wid{
            color:#666 !important;
        }
    </style>
</head>

<body>
<!--header start-->
<header class="mui-bar mui-bar-nav" style="box-shadow: none;height: 1rem;background: #fff">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color:#1b1835"></a>
    <h1 class="mui-title" style="color:#1b1835;">忘记密码</h1>
</header>
<!--header end-->
<!--main start-->
<form action="/account/updatepwd" method="POST" id="forget-form">
    <div class="user">
					<span>
						<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_phone@2x.png" alt="">
					</span>
        <input type="text" style="color:#666 !important;display:inline-block;height:30px !important;" placeholder="手机号码" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" id="txtUser" name="txtUser" class="wid">
        <input type="button" id="code" value="获取验证码" class="click">
    </div>
    <div class="user">
					<span>
						<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_yanzhengma@2x.png" alt="" style="height: 0.49rem">
					</span>
        <input type="text" style="color:#666 !important;display:inline-block;height:30px !important;" placeholder="验证码" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" maxlength="6" id="txtCode" name="txtCode" class="wid">
    </div>
    <div class="user">
					<span>
						<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_mima@2x.png" alt="">
					</span>
                    <input type="password" style="color:#666 !important;display:inline-block;height:30px !important;" placeholder="新密码" id="txtNewpassword" name="txtNewpassword">
                    <i class="fa fa-eye" aria-hidden="true" id="visible" class="visible" onclick="visible()" style="display:none"></i>
                    <i class="fa fa-eye-slash" aria-hidden="true" id="invisible" onclick="invisible()" class="invisible"></i>
    </div>
    <div class="user">
					<span>
						<img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_mima@2x.png" alt="">
					</span>
        <input type="password" style="color:#666 !important;display:inline-block;height:30px !important;" placeholder="确认密码" id="txtRepassword" name="txtRepassword">
    </div>
    <div class="error_alert erron_alert" >
        <span class="errors" id="errors"></span>
    </div>
    <div class="user1">
        <input type="button" id="forgetsubmit" value="确认修改" class=" loginId">
    </div>

</form>

<!--main end-->
<!--mask start-->
<div class="mask" style="display: none">
</div>
<!--mask end-->
<!--error start-->
<div class="error" style="display: none">
    <div class="head">
        <img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_cuowu@2x.png" alt="">
    </div>
    <p>验证码错误</p>
    <input type="button" value="确定">
</div>
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
<!--error end-->
<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
</body>
</html>
<script type="text/javascript">
    var mobilepregerror = "手机号码格式有误";
    var mobileerror = "该手机号用户不存在";
    var codepregerror = "验证码格式有误";
    var passworderror = "密码格式有误";
    var repassworderror = "重复密码有误";
    var txtUser = document.getElementById("txtUser");
    var code = document.getElementById("code");
    var txtCode= document.getElementById("txtCode");
    var txtNewpassword = document.getElementById("txtNewpassword");
    var txtRepassword = document.getElementById("txtRepassword");
    var forgetsubmit = document.getElementById("forgetsubmit");
    var errors = document.getElementById("errors");
    var mobile_preg = /^1\d{10}$/;
    var code_preg = /^\d{6}$/;
    var defaultv = 60;
    txtUser.onblur=function(){
        var txtUser_val = txtUser.value;
        
        if(mobile_preg.test(txtUser_val)){
            errors.innerHTML = "";
            $.ajax({
            type:"POST",
            dataType:"json",
            url:"/account/checkmobile",
            data:{txtUser_val:txtUser_val},
            success:function(str){
                var code = str.code;
                if(code == '000001')
                {
                    errors.innerHTML = "<span>"+mobileerror+"</span>";
                    document.getElementById("code").disabled = "false";
                }
                if(code == "000000")
                {
                    document.getElementById("code").removeAttribute('disabled');
                }
            },
            error:function(str){}
           })
        }else{
            errors.innerHTML = "<span>"+mobilepregerror+"</span>";
        }
    }
    txtCode.onblur=function(){
        var txtCode_val = txtCode.value;
        if(code_preg.test(txtCode_val))
        {
            errors.innerHTML = "";
        }else{
            errors.innerHTML = "<span>"+codepregerror+"</span>";
        }
    }
    txtNewpassword.onblur=function()
    {
        var txtNewpassword_val = txtNewpassword.value;
        if(txtNewpassword_val.length>=3 && txtNewpassword_val.length<=12)
        {
            errors.innerHTML = "";
        }else{
            errors.innerHTML = "<span>"+passworderror+"</span>";
        }
    }
    txtRepassword.onblur=function(){
        var txtRepassword_val = txtRepassword.value;
        if(txtRepassword_val.length>=3 && txtRepassword_val.length<=12)
        {
            errors.innerHTML = "";
        }else{
            errors.innerHTML = "<span>"+repassworderror+"</span>";
        }
    }
    code.onclick=function(){
        var txtUser_val = txtUser.value;
        if(mobile_preg.test(txtUser_val))
        {    
             $.ajax({
                type:"POST",
                url:"/account/getcode",
                dataType:"json",
                data:{mobile:txtUser_val},
                success:function(str){},
                error:function(str){},
             })
             document.getElementById("code").removeAttribute('disabled');
             n();
             var t = setInterval(n,1000);
             function n(){
             code.style.display="inline-block";
             code.style.background = "#dddddd";
             code.value = defaultv+"s";
             document.getElementById("code").disabled = "false";
             defaultv--;
             if(defaultv < 0)
             {
                clearInterval(t);
                code.style.background="#FFFFFF";
                code.value = "重新发送";
                document.getElementById("code").removeAttribute('disabled');
                defaultv = 60;
             }
            }
            
        }else{
            errors.innerHTML = "<span>"+mobilepregerror+"</span>";
        }
      }
     forgetsubmit.onclick=function(){
            var txtUser_val = document.getElementById("txtUser").value;
            var code_val = document.getElementById("txtCode").value;
            var txtNewpassword_val = document.getElementById("txtNewpassword").value;
            var txtRepassword_val = document.getElementById("txtRepassword").value;
            

           if(mobile_preg.test(txtUser_val))
           {  errors.innerHTML = "";
              if(code_preg.test(code_val))
              {
                 errors.innerHTML = "";
                 if(txtNewpassword_val.length>=3 && txtNewpassword_val.length<=12)
                 {
                    errors.innerHTML = "";
                    if(txtRepassword_val.length>=3 && txtRepassword_val.length<=12)
                    {  
                       errors.innerHTML = "";
                       $.ajax({
                          type:"POST",
                          dataType:"json",
                          url:"/account/updatepwd",
                          data:{txtUser:txtUser_val,txtCode:code_val,txtNewpassword:txtNewpassword_val,txtRepassword:txtRepassword_val},
                          success:function(str){
                            var code = str.code;
                            var msg = str.msg;
                            if(code == '000000')
                            {
                                window.location.href="/account/login";
                            }else{
                                errors.innerHTML= "<span>"+msg+"</span>";
                            }
                          },
                          error:function(data){},
                       })
                    }else{
                       errors.innerHTML = "<span>"+repassworderror+"</span>";
                    }

                 }else{
                    errors.innerHTML = "<span>"+passworderror+"</span>";
                 }
                  
              }else{
                 errors.innerHTML = "<span>"+codepregerror+"</span>";
              }
           }else{
              errors.innerHTML = "<span>"+mobilepregerror+"</span>";
           }
     }
</script>