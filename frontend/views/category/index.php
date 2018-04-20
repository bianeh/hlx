<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>分类</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!--标准mui.css-->
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css">
		<link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
		<!--App自定义的css-->
		<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->params['common_url'];?>/css/app.css" />-->
		<style>
			body{
				background: #fff;
			}
			.mui-row.mui-fullscreen>[class*="mui-col-"] {
				height: 100%;
			}
			
			.mui-col-xs-3,
			.mui-col-xs-9 {
				overflow-y: auto;
				height: 100%;
			}
			
			.mui-segmented-control .mui-control-item {
				line-height: 50px;
				width: 100%;
			}
			
			.mui-control-content {
				display: block;
			}
			
			.mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active {
				background-color: #f6f6f8;
			}
			.mui-segmented-control.mui-segmented-control-inverted.mui-segmented-control-vertical .mui-control-item, .mui-segmented-control.mui-segmented-control-inverted.mui-segmented-control-vertical .mui-control-item.mui-active{
				border-bottom: none;
			}
			.mui-segmented-control .mui-control-item{
				line-height: 20px;
				white-space: inherit;
				text-overflow: unset;
			}
			.mui-table-view-cell.mui-media{
				height: 100px;
				margin: 15px 12px 0 0;
				box-shadow:1px -1px 10px 0px rgba(0,0,0,0.1);
				border-radius: 10px;
			}
			.mui-table-view-cell>a:not(.mui-btn){
				height: 100px;
				margin: 0;
			}
			.mui-table-view .mui-media-object.mui-pull-left{
				width: 100px;
				height: 100px;
			}
			.mui-table-view .mui-media-object{
				max-width: none;
			}
			.mui-table-view:before{
				background-color:#fff;
			}
			.mui-fullscreen{
				top:50px;
			}
			.mui-table-view-cell:after{
				background-color: #fff;
			}
			.mui-table-view .mui-media, .mui-table-view .mui-media-body{
				padding: 11px 15px 11px 0;
				overflow: hidden;
				text-overflow: inherit;
				white-space: pre-wrap;
                                font-size:0.3rem;
			}
			p strong{
				font-size: 14px;
				color: #b71627;
			}
			p span{
				float: right;
			}
			p span b{
				color: #000;
			}
			.mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active{
				color: #b71627;
				background: #fff;
			}
            .mui-table-view .mui-media, .mui-table-view .mui-media-body{text-overflow: ellipsis;white-space: nowrap}
		</style>
	</head>

	<body>
		<!--header start-->
		<header>
			<div class="header-main">
				<div class="news img">
					<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color:#1b1835"></a>
				</div>
				<div class="research">
					<!--<img src="" alt="">-->
					<input type="text" placeholder="关键字搜索">
				</div>
				<div class="scanCode img">

				</div>
			</div>

		</header>
		<!--header end-->
		<div class="mui-content mui-row mui-fullscreen">
			<div class="mui-col-xs-3" style="background: #f6f6f8;">
				<div id="segmentedControls" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical">
				</div>
			</div>
			<div id="segmentedControlContents" class="mui-col-xs-9" style="background: #fff">
			</div>
		</div>
		<script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script>
		<script>
			mui.init({
				swipeBack: true //启用右滑关闭功能
			});
			var controls = document.getElementById("segmentedControls");
			var contents = document.getElementById("segmentedControlContents");
			var html = [];
			var i = 1,
				j = 1,
				m = 5, //左侧选项卡数量+1
				n = 10; //每个选项卡列表数量+1
			for (; i < m; i++) {
                                if(i == 1)
                                {
				    html.push('<a class="mui-control-item" data-index="' + (i - 1) + '" href="#content' + i + '" style="width:113px;height: 60px;padding:10px 20px">寿宁高山乌龙茶</a>');
                                }
                                if(i == 2)
                                {
				    html.push('<a class="mui-control-item" data-index="' + (i - 1) + '" href="#content' + i + '" style="width:113px;height: 60px;padding:10px 20px">寿宁高山红茶</a>');
                                 }
                                 if(i == 3)
                                {
				    html.push('<a class="mui-control-item" data-index="' + (i - 1) + '" href="#content' + i + '" style="width:113px;height: 60px;padding:10px 20px">寿宁高山绿茶</a>');
                                 }
                                 if(i == 4)
                                {
				    html.push('<a class="mui-control-item" data-index="' + (i - 1) + '" href="#content' + i + '" style="width:113px;height: 60px;padding:10px 20px">寿宁高山白茶</a>');
                                 }
			}
			controls.innerHTML = html.join('');
			html = [];
			for (i = 1; i < m; i++) {
                            if(i == 1)
                            {
                                    html.push('<div id="content' + i + '" class="mui-control-content"><ul class="mui-table-view">');
                                   <?php foreach ($gswlinfo as $key => $value) { ?>
                                     html.push('<li class="mui-table-view-cell mui-media" style="padding: 0"><a href="/goods/detail?goodsid=<?= $value['Id']?>"><img class="mui-media-object mui-pull-left" src="/images/getpic?goodsid=<?= $value['Id'] ?>"><div class="mui-media-body"><?= $value['name'] ?><p style="margin-top:20px"><strong>￥<?= $value['marketprice'] ?></strong><span>礼盒 <b>￥ <?=$value['teaid']?></b></span></p></div></a></li>');
                                   <?php } ?>
                                    html.push('</ul></div>');
                            }
                            if(i == 2)
                            {
                                    html.push('<div id="content' + i + '" class="mui-control-content"><ul class="mui-table-view">');
                                   <?php foreach ($gshcinfo as $key => $value) { ?>
                                     html.push('<li class="mui-table-view-cell mui-media" style="padding: 0"><a href="/goods/detail?goodsid=<?= $value['Id']?>"><img class="mui-media-object mui-pull-left" src="/images/getpic?goodsid=<?= $value['Id'] ?>"><div class="mui-media-body"><?= $value['name'] ?><p style="margin-top:20px"><strong>￥<?= $value['marketprice'] ?></strong><span>礼盒 <b>￥<?=$value['teaid']?></b></span></p></div></a></li>');
                                   <?php } ?>
                                    html.push('</ul></div>');
                            }
                            if(i == 3)
                            {
                                    html.push('<div id="content' + i + '" class="mui-control-content"><ul class="mui-table-view">');
                                    <?php foreach ($gslcinfo as $key => $value) { ?>
                                     html.push('<li class="mui-table-view-cell mui-media" style="padding: 0"><a href="/goods/detail?goodsid=<?= $value['Id']?>"><img class="mui-media-object mui-pull-left" src="/images/getpic?goodsid=<?= $value['Id'] ?>"><div class="mui-media-body"><?= $value['name'] ?><p style="margin-top:20px"><strong>￥<?= $value['marketprice'] ?></strong><span>礼盒 <b>￥<?=$value['teaid']?></b></span></p></div></a></li>');
                                    <?php } ?>
                                    html.push('</ul></div>');
                            }
                            if(i == 4)
                            {
                                    html.push('<div id="content' + i + '" class="mui-control-content"><ul class="mui-table-view">');
                                    <?php foreach ($gsbcinfo as $key => $value) { ?>
                                     html.push('<li class="mui-table-view-cell mui-media" style="padding: 0"><a href="/goods/detail?goodsid=<?= $value['Id']?>"><img class="mui-media-object mui-pull-left" src="/images/getpic?goodsid=<?= $value['Id'] ?>"><div class="mui-media-body"><?= $value['name'] ?><p style="margin-top:20px"><strong>￥<?= $value['marketprice'] ?></strong><span>礼盒 <b>￥<?=$value['teaid']?></b></span></p></div></a></li>');
                                    <?php } ?>
                                    html.push('</ul></div>');
                            }
			}
			contents.innerHTML = html.join('');
			//默认选中第一个
			controls.querySelector('.mui-control-item').classList.add('mui-active');
//			contents.querySelector('.mui-control-content').classList.add('mui-active');
			(function() {
				var controlsElem = document.getElementById("segmentedControls");
				var contentsElem = document.getElementById("segmentedControlContents");
				var controlListElem = controlsElem.querySelectorAll('.mui-control-item');
				var contentListElem = contentsElem.querySelectorAll('.mui-control-content');
				var controlWrapperElem = controlsElem.parentNode;
				var controlWrapperHeight = controlWrapperElem.offsetHeight;
				var controlMaxScroll = controlWrapperElem.scrollHeight - controlWrapperHeight;//左侧类别最大可滚动高度
				var maxScroll = contentsElem.scrollHeight - contentsElem.offsetHeight;//右侧内容最大可滚动高度
				var controlHeight = controlListElem[0].offsetHeight;//左侧类别每一项的高度
				var controlTops = []; //存储control的scrollTop值
				var contentTops = [0]; //存储content的scrollTop值
				var length = contentListElem.length;
				for (var i = 0; i < length; i++) {
					controlTops.push(controlListElem[i].offsetTop + controlHeight);
				}
				for (var i = 1; i < length; i++) {
					var offsetTop = contentListElem[i].offsetTop;
					console.log(offsetTop)
					if (offsetTop + 100 >= maxScroll) {
						var height = Math.max(offsetTop + 100 - maxScroll, 100);
						var totalHeight = 0;
						var heights = [];
						for (var j = i; j < length; j++) {
							var offsetHeight = contentListElem[j].offsetHeight;
							totalHeight += offsetHeight;
							heights.push(totalHeight);
						}
						for (var m = 0, len = heights.length; m < len; m++) {
							contentTops.push(parseInt(maxScroll - (height - heights[m] / totalHeight * height)));
						}
						break;
					} else {
						contentTops.push(parseInt(offsetTop));
					}
				}
				contentsElem.addEventListener('scroll', function() {
					var scrollTop = contentsElem.scrollTop;
					for (var i = 0; i < length; i++) {
						var offsetTop = contentTops[i];
						var offset = Math.abs(offsetTop - scrollTop);
//						console.log("i:"+i+",scrollTop:"+scrollTop+",offsetTop:"+offsetTop+",offset:"+offset);
						if (scrollTop < offsetTop) {
							if (scrollTop >= maxScroll) {
								onScroll(length - 1);
							} else {
								onScroll(i - 1);
							}
							break;
						} else if (offset < 20) {
							onScroll(i);
							break;
						}else if(scrollTop >= maxScroll){
							onScroll(length - 1);
							break;
						}
					}
				});
				var lastIndex = 0;
				//监听content滚动
				var onScroll = function(index) {
					if (lastIndex !== index) {
						lastIndex = index;
						var lastActiveElem = controlsElem.querySelector('.mui-active');
						lastActiveElem && (lastActiveElem.classList.remove('mui-active'));
						var currentElem = controlsElem.querySelector('.mui-control-item:nth-child(' + (index + 1) + ')');
						currentElem.classList.add('mui-active');
						//简单处理左侧分类滚动，要么滚动到底，要么滚动到顶
						var controlScrollTop = controlWrapperElem.scrollTop;
						if (controlScrollTop + controlWrapperHeight < controlTops[index]) {
							controlWrapperElem.scrollTop = controlMaxScroll;
						} else if (controlScrollTop > controlTops[index] - controlHeight) {
							controlWrapperElem.scrollTop = 0;
						}
					}
				};
				//滚动到指定content
				var scrollTo = function(index) {
					contentsElem.scrollTop = contentTops[index];
				};
				mui(controlsElem).on('tap', '.mui-control-item', function(e) {
					scrollTo(this.getAttribute('data-index'));
					return false;
				});
			})();
		</script>

	</body>

</html>

