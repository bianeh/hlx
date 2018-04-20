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
    <form action="/goods/edit" id="editgoods" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="name" value="<?= $goodsinfo['name'] ?>" id="name" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">大类<span style="color:red">*</span></label>
            <div class="col-md-3">
                   <select name="big" class="form-control">
                        <?php foreach ($bigInfo as $key => $value) { ?>
                              <option class="bigcate" value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                        <?php } ?>             
                    </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">小类<span style="color:red">*</span></label>
            <div class="col-md-3">
                      <select name="small" class="form-control">
                        <?php foreach ($smallInfo as $key => $value) { ?>
                              <option class="bigcate" value="<?= $value['name'] ?>"><?= $value['name'] ?></option>
                        <?php } ?> 
                      </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">运费<span style="color:red">*</span></label>
            <div class="col-md-3">
                   <select name="freightid" class="form-control">
                         <?php foreach ($freightInfo as $key => $value) { ?>
                              <option class="bigcate" value="<?= $value['Id'] ?>"><?= $value['name'] ?></option>
                         <?php } ?> 
                    </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">生产日期<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="productdate" value="<?= $goodsinfo['productdate'] ?>" id="productdate" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">许可证编号<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="licensenum" value="<?= $goodsinfo['licensenum'] ?>" id="licensenum" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">存储方式<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="storagemethod" value="<?= $goodsinfo['storagemethod'] ?>" id="storagemethod" class="form-control"/>
            </div>
        </div>
          <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">总销售量<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="total_sell" name="total_sell" value="<?= $goodsinfo['total_sell'] ?>" class="form-control"/>
            </div>
        </div>
           <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">月销售量<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="month_sell" name="month_sell"  value="<?= $goodsinfo['month_sell'] ?>" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">产品生产地址<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="productaddress" value="<?= $goodsinfo['productaddress'] ?>" id="productaddress" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">公司名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="productcompany" value="<?= $goodsinfo['productcompany'] ?>" id="productcompany" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">市场价<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="marketprice" value="<?= $goodsinfo['marketprice'] ?>" id="marketprice" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">会员价<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="accountprice" value="<?= $goodsinfo['accountprice'] ?>"  id="accountprice" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">材料<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="material" value="<?= $goodsinfo['material'] ?>" id="material" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">产品标准<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="standard" value="<?= $goodsinfo['material'] ?>" id="standard" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">茶叶信息<span style="color:red">*</span></label>
            <div class="col-md-3">
                   <select class="form-control" name="teaid">
                          <?php foreach ($teaInfo as $key => $value) { ?>
                              <option class="bigcate" value="<?= $value['Id'] ?>"><?= $value['name'] ?></option>
                         <?php } ?>
                    </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">产品描述<span style="color:red">*</span></label>
            <div class="col-md-10">
                  <script id="editor" name="description" type="text/plain" style="width:100%;height:500px;"><?= $goodsinfo['description'] ?></script>
            </div>
        </div>
        <br>
        <br>
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="editgoodsopertator" class="btn btn-primary">编辑商品</a>
                </div>
            </div>
       <div style="clear:both"></div> 
       <input type="hidden" name="Id" value="<?= $goodsinfo['Id'] ?>" />
    </form>
</div>
</div>
  <script src="http://www.hailanxiang.cn:8081/common/js/jquery.min.js"></script>
  <script src="http://www.hailanxiang.cn:8081/common/js/ajaxfileupload.js"></script>
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
    var ue = UE.getEditor('editor');
    editgoodsopertator = document.getElementById("editgoodsopertator");
    editgoodsopertator.onclick = function(){
        var name_val = document.querySelector("#name").value;
        var productdate_val = document.querySelector("#productdate").value;
        var licensenum_val = document.querySelector("#licensenum").value;
        var storagemethod_val = document.querySelector("#storagemethod").value;
        var productaddress_val = document.querySelector("#productaddress").value;
        var productcompany_val = document.querySelector("#productcompany").value;
        var marketprice_val = document.querySelector("#marketprice").value;
        var accountprice_val = document.querySelector("#accountprice").value;
        var material_val = document.querySelector("#material").value;
        var standard_val = document.querySelector("#standard").value;
        var editor_val = ue.getContent();
        if(name_val != '')
        {
            if(productdate_val != '')
            {
                if(licensenum_val != '')
                {
                    if(storagemethod_val != '')
                    {
                        if(productaddress_val != ''){
                            if(productcompany_val != '')
                            {
                                if(marketprice_val != '')
                                {
                                    if(accountprice_val != '')
                                    {
                                        if(material_val != '')
                                        {
                                            if(standard_val != '')
                                            {
                                                if(editor_val != '')
                                                {
                                                      document.getElementById("editgoods").submit();
                                                }else{
                                                    layer.alert('请填写商品描述', {
                                                        icon: 2,
                                                        skin: 'layer-ext-moon' 
                                                       })
                                                }
                                            }else{
                                                layer.alert('请填写商品生产标准', {
                                                icon: 2,
                                                skin: 'layer-ext-moon' 
                                               })
                                            }
                                        }else{
                                            layer.alert('请填写商品材料', {
                                                icon: 2,
                                                skin: 'layer-ext-moon'
                                               })
                                        }
                                    }else{
                                        layer.alert('请填写商品会员价格', {
                                        icon: 2,
                                        skin: 'layer-ext-moon'
                                       })
                                    }
                                }else{
                                    layer.alert('请填写商品市场价格', {
                                    icon: 2,
                                    skin: 'layer-ext-moon'
                                   })
                                }
                            }else{
                                layer.alert('请填写公司名称', {
                                    icon: 2,
                                    skin: 'layer-ext-moon'
                                   })
                            }
                        }else{
                            layer.alert('请填写商品生产地址', {
                            icon: 2,
                            skin: 'layer-ext-moon'
                           })
                        }
                    }else{
                        layer.alert('请填写商品许存储方式', {
                        icon: 2,
                        skin: 'layer-ext-moon'
                       })
                    }
                }else{
                    layer.alert('请填写商品许可证编号', {
                        icon: 2,
                        skin: 'layer-ext-moon'
                       })
                }
            }else{
                layer.alert('请填写商品生产日期', {
                icon: 2,
                skin: 'layer-ext-moon'
               })
            }
        }else{
             layer.alert('请填写商品名称', {
                icon: 2,
                skin: 'layer-ext-moon'
              })
        }
    }
</script>