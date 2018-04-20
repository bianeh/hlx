<style>
    .img
    {
        height:30px;
        width:40px !important;
        border:1px solid #ddd;
    }
    .imgb
    {
        height:30px;
        width:60px !important;
        border:1px solid #ddd;
    }
</style>
<link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="title"><a href="/store/index">体验店管理</a>->新增体验店</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="" id="addstore" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="name" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">省份<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="province" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">城市<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="city" id="" class="form-control"/>
            </div>
        </div>
       <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">详细地址<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="detailaddress" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">联系人<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="linker" id="" class="form-control"/>
            </div>
         </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">联系电话<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="phone" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">纬度<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="lat" id="" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">经度<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="lng" id="" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">店铺图片<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='file' name="pic" id="" class="form-control"/>
            </div>
        </div>
    
     
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="addstoreopertator" class="btn btn-primary">添加</a>
                </div>
            </div>
       <div style="clear:both"></div> 
    </form>
     </div>
</div>
</div>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
  <script src="http://118.31.45.231:8092/common/js/ajaxfileupload.js"></script>
</body>
</html>
<script>
    var addstoreopertator = document.getElementById("addstoreopertator");
    addstoreopertator.onclick = function(){
        document.getElementById("addstore").submit();
    }
</script>
