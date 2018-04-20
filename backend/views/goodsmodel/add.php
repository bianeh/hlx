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
<div class="title"><a href="/goods/index">商品管理</a>->添加商品</div>
<div class="anniu">
    <a id="goods_base" >基本信息设置</a>
</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="/goodsmodel/add" id="addgoodsmodel" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">参数规格<span style="color:red">*</span></label>
             <div class="col-md-3">
                <a class="btn btn-primary continueaddspecs">继续添加参数规格</a>
                <a class="btn btn-danger deletespecs">删除参数规格</a>
             </div>
        </div>
        <div class="form-group col-md-12">
            <div class="col-md-11 col-md-offset-1">
                <div class="col-md-2"><label>规格</label></div>
                <div class="col-md-2"><label>价格</label></div>
                <div class="col-md-2"><label>库存</label></div>
                <div class="col-md-2"><label>包装</label></div>
                <div class="col-md-2"><label>图片上传</label></div>
                <div class="col-md-2"><label>预览图片</label></div>
            </div>
        </div>
        <div class="form-group specs col-md-12">
             <div class="col-md-11 col-md-offset-1">
                <div class="col-md-2"><input name="info[name][]" class="form-control" type="text" /></div>
                <div class="col-md-2"><input name="info[price][]" class="form-control" type="text" /></div>
                <div class="col-md-2"><input name="info[storage][]" class="form-control" type="text" /></div>
                <div class="col-md-2">
                    <select class="form-control">
                       <?= $packingstr ?>
                    </select>
                </div>
                <div class="col-md-2"><input name="specpic0" id="specpic0" class="form-control" type="file" /></div>
                <div class="col-md-2">
                    <div class="img  col-md-6" id="show_specpic0"></div>
                    <div class="col-md-6"></div>
                </div>
             </div>
        </div>
        <div class="addbigpictureinput">

        </div>
        <br>
        <br>
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="addgoodsmodelopertator" class="btn btn-primary">添加商品规格</a>
                </div>
            </div>
       <div style="clear:both"></div> 
       <input type="hidden" name="goodsid" value="<?= $goodsid ?>" />
    </form>
</div>
</div>
  <script src="http://118.31.45.231:8092/common/js/jquery.min.js"></script>
  <script src="http://118.31.45.231:8092/common/js/ajaxfileupload.js"></script>
</body>
</html>
<script>
    var ue = UE.getEditor('editor');
    $(document).ready(function(){
        var sum = 0;
        var sumb = 0;
        $(".continueaddspecs").click(function(){
            sum++;
            $(".specs").append('<div class="col-md-11 col-md-offset-1 " id="spec'+sum+'"><div class=col-md-2><input class=form-control name=info[name][] type=text /></div><div class=col-md-2><input class=form-control name=info[price][] type=text /></div><div class=col-md-2><input class=form-control name="info[storage][]"  type=text /></div><div class=col-md-2><select class=form-control> <?= $packingstr ?></select></div><div class=col-md-2><input class=form-control name="specpic'+sum+'" id="specpic'+sum+'" type=file /></div><div class="col-md-2"><div id="show_specpic'+sum+'" class="img col-md-4"></div><div class="col-md-8"></div></div></div>');
        });
        $(".addbigpicture").click(function(){
            sumb++;
            $(".addbigpictureinput").append('<div class="form-group col-md-12" id="bigi'+sumb+'"><label class="col-md-1 control-label" for="goodsform-name"><span style="color:red"></span></label><div class="col-md-3"><input name="bigpic'+sumb+'" id="bigpic'+sumb+'" type="file" class="form-control"/></div><div class="col-md-3"><div class="col-md-6 imgb" id="show_bigpic'+sumb+'"></div><div></div></div><div class="col-md-3"><div></div></div></div>');
        });
        $("body").on('click','.deletespecs',function(){
            var i = sum +1;
            $("#spec"+i).remove();
            sum--;
        });
        $("body").on('click','.deletebigpicture',function(){
             var i = sumb +1;
             $("#bigi"+i).remove();
             sumb--;
        });
    })   
         $('body').on('change' , '#specpic0',function(){
            var file_id = "specpic0";
            ajaxFileUpload(file_id);
         });
         $('body').on('change' , '#specpic1',function(){
            var file_id = "specpic1";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic2',function(){
            var file_id = "specpic2";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic3',function(){
            var file_id = "specpic3";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic4',function(){
            var file_id = "specpic4";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic5',function(){
            var file_id = "specpic5";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic6',function(){
            var file_id = "specpic6";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic7',function(){
            var file_id = "specpic7";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic8',function(){
            var file_id = "specpic8";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic9',function(){
            var file_id = "specpic9";
            ajaxFileUpload(file_id);
        });
         $('body').on('change' , '#specpic10',function(){
            var file_id = "specpic10";
            ajaxFileUpload(file_id);
        });
        $('body').on('change' , '#specpic11',function(){
            var file_id = "specpic11";
            ajaxFileUpload(file_id);
        });
        
        
        //大图bigpic0
       $('body').on('change' , '#bigpic0',function(){
            var file_id = "bigpic0";
            ajaxFileUpload(file_id);
         });
      $('body').on('change' , '#bigpic1',function(){
            var file_id = "bigpic1";
            ajaxFileUpload(file_id);
         });
      $('body').on('change' , '#bigpic2',function(){
            var file_id = "bigpic2";
            ajaxFileUpload(file_id);
         });
      $('body').on('change' , '#bigpic3',function(){
            var file_id = "bigpic3";
            ajaxFileUpload(file_id);
         });
       $('body').on('change' , '#bigpic4',function(){
            var file_id = "bigpic4";
            ajaxFileUpload(file_id);
         });
      $('body').on('change' , '#bigpic5',function(){
            var file_id = "bigpic5";
            ajaxFileUpload(file_id);
         });
      $('body').on('change' , '#bigpic6',function(){
            var file_id = "bigpic6";
            ajaxFileUpload(file_id);
         });
     $('body').on('change' , '#bigpic7',function(){
            var file_id = "bigpic7";
            ajaxFileUpload(file_id);
         });
      $('body').on('change' , '#bigpic8',function(){
            var file_id = "bigpic8";
            ajaxFileUpload(file_id);
         });
      
       function ajaxFileUpload(file_id) 
       {
            $.ajaxFileUpload({
                         url: "/upload/uploadimage?file_id=" + file_id,
                         secureuri: false,
                         fileElementId: file_id,
                         dataType: 'xml',
                         success: function (data,status) {
                         var code = $(data).find('code').text();
                             var img_url = $(data).find('img_url').text();
                             var rel_img_url = $(data).find('rel_img_url').text();
                             alert(rel_img_url);
                             $("#show_"+file_id).css("background",'url( "http://118.31.45.231:8092/'+rel_img_url+ '")no-repeat center/cover');                
                         },
                        error: function (data, status, e)
                        {
                            alert('tretwetrwe');
                        }
                     })
                 return false;
        }
        
</script>
<script>
    $(document).ready(function(){
        $(".bigcate").click(function(){
            var val = $(this).val();
            $.ajax({
             method:"POST",
             url:"/goods/getsmallcate",
             data:{catid:val}
           }).done(function(msg){
               alert('success');
           });
       });
    })
</script>
<script>
    addgoodsmodeloperator = document.getElementById("addgoodsmodelopertator");
    addgoodsmodeloperator.onclick = function(){
        document.getElementById("addgoodsmodel").submit();
    }
</script>