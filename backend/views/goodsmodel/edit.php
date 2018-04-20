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
<div class="title"><a href="/goods/index">商品管理</a>->编辑商品</div>
<div class="anniu">
    <a id="goods_base" >基本信息设置</a>
</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="/goodsmodel/edit" id="editgoodsmodel" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">规格名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="name" value="<?= $goodsmodelinfo['name'] ?>" id="name" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">价格<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="productdate" value="<?= $goodsmodelinfo['price'] ?>" id="productdate" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">库存<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="licensenum" value="<?= $goodsmodelinfo['storage'] ?>" id="licensenum" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">商品规格<span style="color:red">*</span></label>
            <div class="col-md-3">
                <select class="form-control">
                   <?= $packingstr ?>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">规格图片<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='file' name="licensenum" value="<?= $goodsmodelinfo['storage'] ?>" id="licensenum" class="form-control"/>
            </div>
        </div>
        
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="editgoodsmodelopertator" class="btn btn-primary">编辑商品规格</a>
                </div>
            </div>
       <div style="clear:both"></div> 
       <input type="hidden" name="Id" value="<?= $goodsinfo['Id'] ?>" />
    </form>
</div>
</div>
  <script src="http://118.31.45.231:8092/common/js/jquery.min.js"></script>
  <script src="http://118.31.45.231:8092/common/js/ajaxfileupload.js"></script>
</body>
</html>
<script>
    var editgoodsmodelopertator = document.querySelector("#editgoodsmodelopertator");
    editgoodsmodelopertator.onclick = function(){
        var editgoodsmodel = document.querySelector("#editgoodsmodel");
        editgoodsmodel.submit();
    }
</script>

