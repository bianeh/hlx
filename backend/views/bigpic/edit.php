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
<div class="title"><a href="/goods/index">商品管理</a>->编辑商品大图</div>
<div class="base">
<div class="site-login">
    <h1></h1>
    <form action="/bigpic/edit" id="editbigpic" method="post" enctype="multipart/form-data">
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">产品大图<span style="color:red">*</span></label>
            <div class="col-md-3">
                   <input type="file" name="bigpic0" id="bigpic0" class="form-control"/>
            </div>
            <div class="col-md-3">
                <div class="col-md-4 imgb" id="show_bigpic0"></div>
                <div class="col-md-8"></div>
            </div>
        </div>
        <div class="addbigpictureinput">
        </div>
        <br>
        <br>
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="editbigpicopertator" class="btn btn-primary">编辑商品大图</a>
                </div>
            </div>
       <div style="clear:both"></div> 
       <input type="hidden" value="<?= $Id ?>" name="Id"/>
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
//            var show_img = document.querySelector("#"+file_id);
            $.ajaxFileUpload({
                         url: "/upload/uploadimage?file_id=" + file_id,
                         secureuri: false,
                         fileElementId: file_id,
                         dataType: 'xml',
                         success: function (data,status) {
                         var code = $(data).find('code').text();
//                         if(code == '000008'){
                             var img_url = $(data).find('img_url').text();
                             var rel_img_url = $(data).find('rel_img_url').text();
//                             $("#"+file_id).next().val(rel_img_url);
                             alert(rel_img_url);
                             $("#show_"+file_id).css("background",'url( "http://118.31.45.231:8092/'+rel_img_url+ '")no-repeat center/cover');
//                         }
//                             var msg = $(data).find('msg').text();
//                             var img_url = $(data).find('img_url').text();
//                             var rel_img_url = $(data).find('rel_img_url').text();
//                             $("#"+file_id).next().val(rel_img_url);
                            
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
    editbigpicopertator = document.getElementById("editbigpicopertator");
    editbigpicopertator.onclick = function(){
        document.getElementById("editbigpic").submit();
    }
</script>

