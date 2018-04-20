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
<div class="title"><a onclick="history.back()">订单信息</a>->确认发货</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="" id="addexpressinfo" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">快递名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="deliverycompany" id="deliverycompany" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">快递单号<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="deliverynum" id="deliverynum" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-offset-1 col-md-11">
                <a id="addexpressinfoopertator" class="btn btn-primary">提交</a>
            </div>
        </div>
       <div style="clear:both"></div>
       <input type="hidden" value="<?= $id ?>" name="Id" />
    </form>
</div>
</div>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
</body>
</html>
<script>
    var addexpressinfoopertator = document.getElementById("addexpressinfoopertator");
    addexpressinfoopertator.onclick = function()
    {   
        var deliverycompany = document.getElementById("deliverycompany").value;
        var deliverynum = document.getElementById("deliverynum").value;
        if(deliverycompany != '')
        {
            if(deliverynum != ''){
                 document.getElementById("addexpressinfo").submit();
            }else{
                 alert("请输入快递单号！");
            }
        }else{
            alert("请输入快递名称！");
        }
    }
</script>
