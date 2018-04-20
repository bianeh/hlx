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
    .someone
    {
        display:none;
    }
</style>
<link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="title"><a href="/wbinfo/index">站内信</a>->添加站内信</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="" id="addwbinfo" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">标题<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="title" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">内容<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <textarea name="info" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">抄送所有人<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='radio' name="isall" class="isall" value="0" />是
                  <input type='radio' name="isall" class="isall" value="1" />否
            </div>
        </div>
        <div class="form-group col-md-12 someone">
            <label class="col-md-1 control-label" for="goodsform-name">抄送人<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <textarea name="userinfo" class="form-control"></textarea>
            </div>如果为多个用户用英文'|'进行隔开
        </div>
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="addwbinfoopertator" class="btn btn-primary">添加</a>
                </div>
            </div>
       <div style="clear:both"></div>
    </form>
</div>
</div>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<!--   <script src="http://118.31.45.231:8092/common/js/ajaxfileupload.js"></script> -->
</body>
</html>
<script>
    var addwbinfoopertator = document.getElementById("addwbinfoopertator");
    addwbinfoopertator.onclick = function()
    {
        document.getElementById("addwbinfo").submit();
    }
    $(".isall").click(function(){
        var val = $(this).val();
        if(val == 1)
        {
            $(".someone").css("display","block");
        }
        if(val == 0)
        {
            $(".someone").css("display","none");
        }
    })
</script>
