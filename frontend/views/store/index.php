<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>海岚香--体验店</title>
    
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/header.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">

    <script src="<?php echo Yii::$app->params['common_url'];?>/js/index.js"></script>
    <style>
        .header-main .research input{
            text-align: left;
           padding-left: 0.2rem;
        }
        .conList
        {
            padding-top:20px;
        }
        .conList li{
            height:3rem;
        }
        .name{
            font-size: 0.3rem;
            font-weight: bold;
            font-family: '苹方';
            padding:10px;
        }
        .detail{
            padding:10px;
            font-size:0.3rem;
            height:0.35rem;
            line-height:0.35rem;
            /*margin-top:0.2rem;*/
        }
        .detail img{
            width:0.3rem;
            height:0.3rem;
            display:inline-block;
            margin-top:0rem;
        }
        .detail span{
            display:inline-block;
            
        }
        .iright{
            float:right;
        }
       .linker{
            padding:10px;
            font-size:0.3rem;
            height:0.35rem;
            line-height:0.35rem;
            margin-top:0.4rem;
        }
        .linker img{
            width:0.3rem;
            height:0.3rem;
            display:inline-block;
            margin-top:0rem;
        }
        .linker span{
            display:inline-block;
            
        }
        .storeimg{
            margin: 0.2rem 0.18rem 0.3rem;
            width: 96%;
            height: 3.59rem;
            border-radius: 0.5rem;
        }
        .main{
            width:100%;
        }
    </style>
</head>
<body>
    <!--header start-->
    <header>
    <form action="" id="searchform" method="get">
        <div class="header-main">
           
            <div class="news img">
                 <a href="/wbinfo/index">
                    <img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_news@2x.png" alt="">
                 </a>
            </div>
            <div class="research">
                <img onclick="search()" src="<?php echo Yii::$app->params['common_url'];?>/images/btn_search@2x.png" alt="">
                <input type="text" placeholder="关键字搜索">
            </div>
            <div class="scanCode img">
                <img src="<?php echo Yii::$app->params['common_url'];?>/img/nav_button_scanning@2x.png" alt="">
            </div>
          
        </div>
     </form>
    </header>
    <!--header end-->
    <!--con start-->
    <div class="main" >
         <?php foreach ($storeinfo as $key => $value) { ?>
           <div><img class="storeimg" src="/images/storeimg?id=<?= $value['Id'] ?>" /></div>
           <div class="name"><span><?= $value['name'] ?></span></div>
           <div class="detail">
               <img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_dizhi@2x.png" alt="" class="icons">
               <span class="nav" data-mapx="<?= $value['lng'] ?>" data-mapy="<?= $value['lat'] ?>"><?= $value['province']?><?= $value['city']?><?= $value['detailaddress'] ?></span>
               <!-- <span><a href="tel:40048888">打电话预约</a></span> -->
               <img class="iright nav" data-mapx="<?= $value['lng'] ?>" data-mapy="<?= $value['lat'] ?>" src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png" alt="" class="jiantou">
           </div>
           <div class="linker">
               <img src="<?php echo Yii::$app->params['common_url'];?>/images/icon_touxiang@2x.png" alt="" class="icons">
               <span><?= $value['linker'] ?></span>
               <span><a href="tel:<?= $value['phone'] ?>" style="color:#666">打电话预约</a></span>
               <a href="tel:<?= $value['phone'] ?>"><img class="iright" src="<?php echo Yii::$app->params['common_url'];?>/images/btn_back@2x.png" alt="" class="jiantou"></a>
           </div>
          <?php } ?>
    </div>
    <!--con end-->
    <!--footer start-->
    <footer>
        <div class="footer-main">
                <a href="/index/index"  class="setting">
                    <div class="pics a">
                    </div>
                    <div class="intros">首页</div>
                </a>
                <a href="/tea/index" id="tea" class="setting tea">
                    <div class="pics b">
                    </div>
                    <div class="intros">茶园</div>
                </a>
                <a href="/store/index" class="setting">
                    <div class="pics c active">
                    </div>
                    <div class="intros active">体验店</div>
                </a>
                <a href="/cart/index" class="setting">
                    <div class="pics d">
                    </div>
                    <div class="intros">购物车</div>
                </a>
                <a href="/usercenter/index" class="setting">
                    <div class="pics e">
                    </div>
                    <div id="usercenter" class="intros">我的</div>
                </a>
            </div>
    </footer>
    <!--footer end-->
</body>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/info.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->params['common_url'];?>/js/main.js"></script>
</html>
<script type="text/javascript">
          function search()
        {
            document.getElementById("searchform").submit();
        }
</script>