<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/iconfont.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzaddress.css">
		<style>
			.editId{
				float: right;
				margin-top: 0.2rem;;
			}
			.content .address{
				height: 1.98rem;
			}
		</style>
	</head>

	<body>
		<!--header start-->
		<header class="mui-bar mui-bar-nav header" style="background: #fff;box-shadow: none">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">收货地址</h1>
			<a id="manager" class="editId">管理</a>
		</header>
		<!--header end-->
		<div class=" mui-content mui-scroll-wrapper" style="padding-top: 0;margin-bottom: 2rem">
			<div class="mui-scroll">
				<!--内容开始-->
				<div class="content" id="addAddressList" style="padding-bottom: 1.9rem;">
                                    <?php foreach ($addressinfo as $key => $value) { ?>
                                        <a class="selectaddress" value="<?= $value['Id'] ?>">
                                            <div class="address">
                                                    <div class="top">
                                                            <div class="up">
                                                                    <div class="person iconfont icon-yonghuming"></div>
                                                                    <p class="name"><?= $value['linker'] ?></p>
                                                                    <?php $isdefault = $value['isdefault'];if($isdefault == 1){ ?>
                                                                    <div class="default">默认</div>
                                                                    <?php } ?>
                                                                    <div class="phone"><?= $value['phone'] ?></div>
                                                            </div>
                                                            <div class="down">
                                                                    <?= $value['address'] ?><?= $value['detail'] ?>
                                                            </div>
                                                    </div>
                                            </div>
                                        </a>
                                    <?php } ?>
					

				</div>
				<!--内容结束-->
			</div>
		</div>

	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
	<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/url_list.js"></script>-->
	<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/tools.js"></script>-->
	<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/controller.js"></script>
	<!--<script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/add_user_address.js"></script>-->
	<script>
		mui.init();
		
		(function($) {
			$(".mui-scroll-wrapper").scroll({
				bounce: true, //滚动条是否有弹力默认是true
				indicators: true, //是否显示滚动条,默认是true
			});

		})(mui);
        </script>
        <script>
            var addressm = document.getElementById("manager");
            addressm.onclick = function()
            {
                window.location.href="/address/index";
            }
            $(".selectaddress").click(function(){
                var val = $(this).attr('value');
                localStorage.setItem('addressid', val);
                history.back();
            })
        </script>

</html>

