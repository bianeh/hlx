<!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>收货地址列表</title>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/iconfont.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzaddress.css">
	</head>
	<body>
		<!--header start-->
		<header class="mui-bar mui-bar-nav header" style="background: #fff;box-shadow: none">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">收货地址</h1>
		</header>
		<!--header end-->
		<div class=" mui-content mui-scroll-wrapper" style="padding-top: 0;margin-bottom: 2rem">
			<div class="mui-scroll">
				<!--内容开始-->
				<div class="content" id="addAddressList" style="padding-bottom: 1.9rem;">
					<?php foreach ($addressinfo as $key => $value) { ?>
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
						<div class="bottom" addressid="1">
							<a class="delete deleteAddress" value="<?= $value['Id'] ?>">删除</a>
                                                        <input type="hidden" name="Id" class="ids" value="<?= $value['Id'] ?>" />
							<a class="edit upAddress" href="/address/edit?Id=<?= $value['Id'] ?>">编辑</a>
						</div>
					</div>
                                <?php } ?>

				</div>
				<!--内容结束-->
			</div>
		</div>
		<!--添加新地址开始-->
		<a href="/address/add" class="add qzzeditId">
			添加新地址
		</a>
		<!--添加新地址结束-->
	</body>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
	<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
</html>
<script>
		mui.init();
		(function($) {
			$(".mui-scroll-wrapper").scroll({
				bounce: false, //滚动条是否有弹力默认是true
				indicators: false, //是否显示滚动条,默认是true
			});

		})(mui);
                $(document).ready(function(){
                    $(".deleteAddress").click(function(){
                        var Id = $(this).next(".ids").val();
                        $.ajax({
                            method:"POST",
                            url:"/address/delete",
                            data:{Id:Id}
                        }).done(function(msg){
                            location.reload();
                        })
                    })
                })
</script>