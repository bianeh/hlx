<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>海岚香--茶园</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.min.js"></script>
    <style>
        body{
            background: #fff;
        }
        .banner{
            width: 100%;
            height: 5.38rem;
            float: left;
            margin-top: 0.9rem;
        }
        .banner img{
            width: 100%;
            height: 5.38rem;
        }
        header{
            width: 100%;
            height: 0.9rem;
            position: fixed;
            top:0;left:0;right:0;
            margin:auto;
            z-index: 999;
            background: #fff;
            text-align: center;
            line-height: 0.9rem;
            font-size: 0.3rem;
        }
        .content{
            width: 7.12rem;
            height:5rem;
            background: #fff;
            float: left;
            margin-left:0.19rem;
            margin-top:-1rem;
            box-shadow: 0px 2px 13px rgba(0,0,0,0.3);
            z-index: 10;
        }
        .foot{
            width: 100%;
            height: auto;
            float: left;
            margin-top: 1.39rem;
            margin-bottom: 1.8rem;
            text-align: center;
            line-height: 0.5rem;
            font-size: 0.26rem;
        }
        .example_video_1-dimensions{
            width:7.12rem !important;
        }
        p{
            width:90%;
            margin:0 auto;
        }
        #myPlayer{max-width: 1200px;width: 100%;}
        #myPlayerflashId{width:100% !important;}
        .vedio{margin-top:0.2rem;}
        .vediotitle{margin-top:2rem;font-size:16px;}
    </style>
</head>
    <body>
        <header>
            茶园
        </header>
        <div class="mui-content mui-scroll-wrapper">
            <div class="mui-scroll">
        <!-- <div class="banner">
            <img src="/images/getbanner?id=<?= $wapinfo['id'] ?>" alt="">
        </div> -->
        <div class="vediotitle">福建省厦门市茶园基地一</div>
        <div class="vedio">
               <video id="myPlayer" poster="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1522487648933&di=0ba83a94cf1abaf5e5a35d3e68a00bc7&imgtype=0&src=http%3A%2F%2Fpic5.photophoto.cn%2F20071019%2F0034034598084369_b.jpg" controls playsInline webkit-playsinline autoplay>
                <source src="rtmp://rtmp.open.ys7.com/openlive/2fd79100e6864bbcb203e4ccb4beb399" type="rtmp/flv" />
                <source src="http://hls.open.ys7.com/openlive/2fd79100e6864bbcb203e4ccb4beb399.m3u8" type="application/x-mpegURL" />
              </video>
        </div>
         <div class="vediotitle">福建省厦门市茶园基地二</div>
        <div class="vedio">
               <video id="myPlayer" poster="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1522487648933&di=0ba83a94cf1abaf5e5a35d3e68a00bc7&imgtype=0&src=http%3A%2F%2Fpic5.photophoto.cn%2F20071019%2F0034034598084369_b.jpg" controls playsInline webkit-playsinline autoplay>
                <source src="rtmp://rtmp.open.ys7.com/openlive/af51d1ecccd8463295448c2b6d8843c7" type="rtmp/flv" />
                <source src="http://hls.open.ys7.com/openlive/af51d1ecccd8463295448c2b6d8843c7.hd.m3u8" type="application/x-mpegURL" />
              </video>
        </div>
        <div class="foot">
            <p><strong>吴先生</strong></p>
            <p>0592-5622267</p>
            <p>hailanxiang001@163.com</p>
            <p>中国(福建)自由贸易试验区厦门片区高崎北二路61号3楼3A23号</p>
        </div>
            </div>
        </div>
        <footer>
            <div class="footer-main">
                <a href="/index/index" class="setting">
                    <div class="pics a">
                    </div>
                    <div class="intros">首页</div>
                </a>
                <a href="/tea/index" class="setting tea">
                    <div class="pics b  active">
                    </div>
                    <div class="intros  active">茶园</div>
                </a>
                <a href="/store/index" class="setting">
                    <div class="pics c">
                    </div>
                    <div class="intros">体验店</div>
                </a>
                <a href="/cart/index" class="setting">
                    <div class="pics d">
                    </div>
                    <div class="intros">购物车</div>
                </a>
                <a href="/usercenter/index" class="setting">
                    <div class="pics e">
                    </div>
                    <div class="intros">我的</div>
                </a>
            </div>
        </footer>
    </body>
    <script>
        mui.init();
        (function($) {
            $(".mui-scroll-wrapper").scroll({
                bounce: false,
                indicators: false,
            });
        })(mui);
    </script>
    <script src="https://open.ys7.com/sdk/js/1.3/ezuikit.js"></script>
    <script>
    var player = new EZUIPlayer('myPlayer');
//    player.on('error', function(){
//        console.log('error');
//    });
//    player.on('play', function(){
//        console.log('play');
//    });
//    player.on('pause', function(){
//        console.log('pause');
//    });
//    player.on('waiting', function(){
//        console.log('waiting');
//    });


   // 日志
   // player.on('log', log);

   function log(str){
       var div = document.createElement('DIV');
       div.innerHTML = (new Date()).Format('yyyy-MM-dd hh:mm:ss.S') + JSON.stringify(str);
       document.body.appendChild(div);
   }


</script>
</html>
