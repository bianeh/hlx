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
<div class="title"><a href="/wapadv/index">前端设置</a>->添加广告图</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="" id="addadv" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="name" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">地址<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="url" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">页面<span style="color:red">*</span></label>
            <div class="col-md-3">
                <select id="page" name="type" class="form-control">
                    <option value="0">请选择</option>
                    <?php foreach ($wapadvconfiginfo as $key => $value) { ?>
                       <option class="pageadv" value="<?= $value['id']?>"><?= $value['name'] ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">位置<span style="color:red">*</span></label>
            <div class="col-md-3">
                <select id="position" name="position" class="form-control">     
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">广告图<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='file' name="pic" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">是否显示<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='radio' name="isshow"  value="0" />显示
                  <input type='radio' name="isshow"  value="1" />不显示
            </div>
        </div>
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="addgoodsopertator" class="btn btn-primary">添加</a>
                </div>
            </div>
       <div style="clear:both"></div> 
    </form>
</div>
</div>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
</body>
</html>
<script>
    var addgoodsopertator = document.getElementById("addgoodsopertator");
    addgoodsopertator.onclick = function(){
        document.getElementById("addadv").submit();
    }
    $(document).ready(function(){
        $("#page").change(function(){
           var pid = $(this).val();
           $.ajax({
             method:"POST",
             url:"/wapadv/getadvconfig",
             data:{pid:pid}
           }).done(function(msg){
               $("#position option").remove();
               $("#position").append(msg);
           });
        });
    })
</script>