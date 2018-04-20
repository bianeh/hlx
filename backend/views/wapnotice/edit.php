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
<div class="title"><a href="/wapnotice/index">前端设置</a>->编辑公告</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="" id="editnotice" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">标题<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="title" value="<?= $wapnoticeinfo['title'] ?>" id="" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">内容<span style="color:red">*</span></label>
            <div class="col-md-9">
                  <script id="editor" name="content" type="text/plain" style="width:100%;height:500px;"><?= $wapnoticeinfo['content'] ?></script>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">是否显示<span style="color:red">*</span></label>
            <div class="col-md-3">
                 <?php $isshow = $wapnoticeinfo['isshow'];if($isshow == 0){ ?>
                    <input type='radio' checked name="isshow"  value="0" />显示
                    <input type='radio' name="isshow"  value="1" />不显示
                <?php } ?>
                <?php $isshow = $wapnoticeinfo['isshow'];if($isshow == 1){ ?>
                    <input type='radio'  name="isshow"  value="0" />显示
                    <input type='radio'  checked name="isshow"  value="1" />不显示
                <?php } ?>
            </div>
        </div>
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="editnoticeopertator" class="btn btn-primary">编辑</a>
                </div>
            </div>
        <input type="hidden" name="id" value="<?= $wapnoticeinfo['id'] ?>" />
       <div style="clear:both"></div> 
    </form>
</div>
</div>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
  <script type="text/javascript" charset="utf-8" src="http://m.hailanxiang.cn:8081/common/editor/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="http://m.hailanxiang.cn:8081/common/editor/ueditor.all.min.js"> </script>
  <script type="text/javascript" charset="utf-8" src="http://m.hailanxiang.cn:8081/common/editor/lang/zh-cn/zh-cn.js"></script>
</body>
</html>
<script>
    var ue = UE.getEditor('editor');
    var editnoticeopertator = document.getElementById("editnoticeopertator");
    editnoticeopertator.onclick = function(){
        document.getElementById("editnotice").submit();
    }
</script>
