<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加地址页面</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/mui.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/base.css" />
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/rem.js"></script>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/mui.js"></script>
    <script src="<?php echo Yii::$app->params['common_url'];?>/js/jQuery.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/qzzedit.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['common_url'];?>/css/bottom.css">
    <style type="text/css">
    	.mui-radio input[type='radio']:checked:before, .mui-checkbox input[type='checkbox']:checked:before{
    		color:#c444ff;
    	}
    	#addAddress{
    	 z-index: -1;
    	}
    </style>
</head>
<body>
<!--header start-->
<header class="mui-bar mui-bar-nav header" style="background: #fff;box-shadow: none">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">添加地址</h1>
    <a class="save addAddress" id="savedata" >保存</a>
</header>
<!--header end-->
<!--保存并使用开始-->
<!-- <a class="add" id="addAddress">
     添加并使用
</a> -->
<!--保存并使用结束-->
<!--内容开始-->
<div class="content">
    <form id="addaddressform" action="/address/doaddaddress" method="post" />
            <div class="user">
                <span>收件人：</span>
                <input type="text" value="" placeholder="请填写用户名" id="linker" name="linker">
            </div>
            <div class="user">
                <span>联系方式：</span>
                <input type="tel" value="" placeholder="请填写手机号" id="phone" name="phone">
            </div>
            <div class="user">
                <div class="provincefont">省份</div>
                <select id="province" name="province">
                                <option>请选择</option>
                </select>
            </div>
            <div class="user" >
                <div class="cityfont">城市</div>
                <select id="city" name="city">
                                <option>请选择</option>
                </select>
            </div>
            <div class="user" >
                <div class="areafont">城区</div>
                <select id="area" name="area">
                                <option>请选择</option>
                </select>
            </div>
            <div class="user">
                <input type="text" value="" name="detail" placeholder="详细地址" style="margin-left: 0.66rem" id="userAdress">
            </div>
            <div>
                <div class="mui-input-row mui-checkbox ">
                    <label style="margin-top:4px;margin-left: 0.35rem">是否设置为常用地址</label>
                    <input name="Checkbox" type="checkbox"  style="top:50%; margin-top:-13px;" id="isDefault">
                </div>
            </div>
        <input type="hidden" name="isdefault" id="defaultvalue" value="0" />
    </form>
</div>
<!--内容结束-->
</body>
</html>
<script>
    $(document).ready(function(){
        $.ajax({
            method:"POST",
            url:"/address/getprovince",
            data:{}
        }).done(function(msg){
               $("#province option").remove();
               $("#province").append(msg);
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('#province').change(function(){ 
           var Id = $(this).children('option:selected').val(); 
           $.ajax({
            method:"POST",
            url:"/address/getcity",
            data:{'Id':Id}
            }).done(function(msg){
                   $("#city option").remove();
                   $("#city").append(msg);
            });
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('#city').change(function(){ 
           var Id = $(this).children('option:selected').val(); 
           $.ajax({
            method:"POST",
            url:"/address/getarea",
            data:{'Id':Id}
            }).done(function(msg){
                   $("#area option").remove();
                   $("#area").append(msg);
            });
        });
    })
</script>
<script>
   var savedata = document.getElementById("savedata");
   savedata.onclick = function()
   {   
      var linker_val = document.getElementById("linker").value;
      var phone_val = document.getElementById("phone").value;
      var province_val = document.getElementById("province").value;
      var city_val = document.getElementById("city").value;
      var area_val = document.getElementById("area").value;
      var userAdress_val = document.getElementById("userAdress").value;
      var phone_preg = /^1\d{10}$/;
       if(linker_val != '')
       {
          if(phone_preg.test(phone_val))
          { 
             if(province_val != '')
             {
                 if(city_val != '')
                 {  
                    if(area_val != '')
                    {   
                       if(userAdress_val != ''){
                           document.getElementById("addaddressform").submit();
                       }else{
                           alert("请填写详细地址");
                       }
                       
                    }else{
                       alert("请选择县区");
                    }

                 }else{
                     alert("请选择市区");
                 }
             }else{
                 alert("请选择省份");
             }

          }else{
             alert("手机号码格式有误");
          }
       }else{
         alert("请填写收件人");
       }
   }
   
   var isdefault = document.getElementById("isDefault");
   isdefault.onclick = function()
   {
        if(isdefault.checked == false)
        {   
            document.getElementById("defaultvalue").value = 0;
        }
        else
        {
            document.getElementById("defaultvalue").value = 1;
        }  
   }
</script>

