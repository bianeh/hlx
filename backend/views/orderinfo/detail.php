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
<div class="title"><a href="javascritp::history.back()">订单管理</a>->订单详情</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <?php foreach ($detail as $key => $value) { ?>
    <div>
        商品名称：<?= $value['productname'] ?>/
        购买件数：<?= $value['buynum'] ?>
    </div>
        
    <?php  } ?>
</div>
</div>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
  <script src="http://118.31.45.231:8092/common/js/ajaxfileupload.js"></script>
</body>
</html>
<script>
    var addnoticeopertator = document.getElementById("addnoticeopertator");
    addnoticeopertator.onclick = function(){
        document.getElementById("addnotice").submit();
    }
</script>
