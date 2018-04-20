<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="keywords" content="海岚香后台管理系统">
	<meta name="description" content="海岚香后台管理系统">
        <title>登录页面</title>
	<link rel="stylesheet" href="../common/layui/css/layui.css">
	<link rel="stylesheet" href="../common/css/sccl.css">
    <link href="https://cdn.bootcss.com/layer/3.1.0/mobile/need/layer.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/layer/3.1.0/layer.js"></script>
        <style>
            .layui-input{
                color:#888;
            }
            .login-box header{
                padding:0px !important;
          }
          input[type=checkbox]{
            display:inline-block !important;
          }
          .dq{
            display:inline-block
            vertical-align:center;
          }
        </style>
  </head>
  <body class="login-bg">
    <div class="login-box">
        <header>
            <h1>海岚香后台管理系统</h1>
        </header>
        <div class="login-main">
			<form action="/login/dologin" class="layui-form" method="post">
				<input name="__RequestVerificationToken" type="hidden" value="">                
				<div class="layui-form-item">
					<label class="login-icon">
						<i class="fa fa-user-circle" aria-hidden="true"></i>
					</label>
					<input type="text" name="info[username]" lay-verify="userName" id="username" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
				</div>
				<div class="layui-form-item">
					<label class="login-icon">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</label>
					<input type="password" name="info[password]" lay-verify="password" id="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
				</div>
				<div class="layui-form-item">
					<div class="pull-right">
                                            <button class="layui-btn layui-btn-primary" lay-submit="" lay-filter="login">
							    登录
                                             </button>
                                            <button type="button" id="chongzhi" class="layui-btn layui-btn-primary">
                                              重置
                                           </button>
					</div>
					<div class="clear"></div>
				</div>
			</form>        
		</div>
        <footer>
            <p>xuan © www.hlx.com</p>
        </footer>
    </div>
    <script type="text/html" id="code-temp">
        <div class="login-code-box">
            <input type="text" class="layui-input" id="code" />
            <img id="valiCode" src="/manage/validatecode?v=636150612041789540" alt="验证码" />
        </div>
    </script>
    <script src="../common/layui/layui.js"></script>
  </body>
</html>
<script>
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var chongzhi = document.getElementById("chongzhi");
    chongzhi.onclick=function(){
        username.value = '';
        password.value = '';
    }
</script>
