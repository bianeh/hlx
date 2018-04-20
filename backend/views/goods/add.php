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
    <form action="/goods/add" id="addgoods" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="name" name="name" id="" class="form-control"/>
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
                  <input type='text' id="productdate" name="productdate"  class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">许可证编号<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="licensenum" name="licensenum" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">存储方式<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="storagemethod" name="storagemethod"  class="form-control"/>
            </div>
        </div>
           <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">总销售量<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="total_sell" name="total_sell"  class="form-control"/>
            </div>
        </div>
           <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">月销售量<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="month_sell" name="month_sell"  class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">产品生产地址<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' name="productaddress" id="productaddress" class="form-control"/>
            </div>
        </div>
         <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">公司名称<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="productcompany" name="productcompany" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">市场价<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="marketprice" name="marketprice"  class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">会员价<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="accountprice" name="accountprice" class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">材料<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="material" name="material"  class="form-control"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">产品标准<span style="color:red">*</span></label>
            <div class="col-md-3">
                  <input type='text' id="standard" name="standard"  class="form-control"/>
            </div>
        </div>
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
                <div class="col-md-2"><input name="info[name][]" class="form-control specname" type="text" /></div>
                <div class="col-md-2"><input name="info[price][]" class="form-control modelprice" type="text" /></div>
                <div class="col-md-2"><input name="info[storage][]" class="form-control modelstorage" type="text" /></div>
                <div class="col-md-2">
                    <select class="form-control" name="info[packingid][]">
                       <?= $packingstr ?>
                    </select>
                </div>
                <div class="col-md-2"><input name="specpic0" id="specpic0" class="form-control modelpic" type="file" /></div>
                <div class="col-md-2">
                    <div class="img  col-md-6" id="show_specpic0"></div>
                    <div class="col-md-6"></div>
                </div>
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
            <label class="col-md-1 control-label" for="goodsform-name">产品大图<span style="color:red">*</span></label>
            <div class="col-md-3">
                   <input type="file" name="bigpic0" id="bigpic0" class="form-control bigpic"/>
            </div>
            <div class="col-md-3">
                <div class="col-md-4 imgb" id="show_bigpic0"></div>
                <div class="col-md-8"></div>
            </div>
            <div class="col-md-3">
                <a class="btn btn-primary btn-flat addbigpicture">继续添加产品大图</a>
                <a class="btn btn-danger btn-flat deletebigpicture">删除产品大图</a>
            </div>
        </div>
        <div class="addbigpictureinput">

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-1 control-label" for="goodsform-name">产品描述<span style="color:red">*</span></label>
            <div class="col-md-10">
                  <script id="editor" name="description" type="text/plain" style="width:100%;height:500px;"></script>
            </div>
        </div>
        <br>
        <br>
            <div class="form-group col-md-12">
                <div class="col-md-offset-1 col-md-11">
                    <a id="addgoodsopertator" class="btn btn-primary">添加商品</a>
                </div>
            </div>
       <div style="clear:both"></div> 
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
            $(".specs").append('<div class="col-md-11 col-md-offset-1 " id="spec'+sum+'"><div class=col-md-2><input class="form-control specname" name=info[name][] type=text /></div><div class=col-md-2><input class="form-control modelprice" name=info[price][] type=text /></div><div class=col-md-2><input class="form-control modelstorage" name="info[storage][]"  type=text /></div><div class=col-md-2><select name=info[packingid][] class=form-control> <?= $packingstr ?></select></div><div class=col-md-2><input class="form-control modelpic" name="specpic'+sum+'" id="specpic'+sum+'" type=file /></div><div class="col-md-2"><div id="show_specpic'+sum+'" class="img col-md-4"></div><div class="col-md-8"></div></div></div>');
        });
        $(".addbigpicture").click(function(){
            sumb++;
            $(".addbigpictureinput").append('<div class="form-group col-md-12" id="bigi'+sumb+'"><label class="col-md-1 control-label" for="goodsform-name"><span style="color:red"></span></label><div class="col-md-3"><input name="bigpic'+sumb+'" id="bigpic'+sumb+'" type="file" class="form-control bigpic"/></div><div class="col-md-3"><div class="col-md-6 imgb" id="show_bigpic'+sumb+'"></div><div></div></div><div class="col-md-3"><div></div></div></div>');
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
                             $("#show_"+file_id).css("background",'url( "http://manager.hailanxiang.cn/'+rel_img_url+ '")no-repeat center/cover');
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
    addgoodsoperator = document.getElementById("addgoodsopertator");
    addgoodsoperator.onclick = function(){
        var name_val = document.getElementById("name").value;
        var productdate_val = document.getElementById("productdate").value;
        var licensenum_val = document.getElementById("licensenum").value;
        var storagemethod_val = document.getElementById("storagemethod").value;
        var productaddress_val = document.getElementById("productaddress").value;
        var productcompany_val = document.getElementById("productcompany").value;
        var marketprice_val = document.getElementById("marketprice").value;
        var accountprice_val = document.getElementById("accountprice").value;
        var material_val = document.getElementById("material").value;
        var standard_val = document.getElementById("standard").value;
        var editor_val = ue.getContent();
        var specname = document.querySelectorAll(".specname");
        var modelprice = document.querySelectorAll(".modelprice");
        var modelstorage = document.querySelectorAll(".modelstorage");
        var modelpic = document.querySelectorAll(".modelpic");
        var bigpic = document.querySelectorAll(".bigpic");
        if(name_val != "")
        {
            if(productdate_val != '')
            {
                if(licensenum_val != '')
                {
                    if(storagemethod_val != '')
                    {
                        if(productaddress_val != '')
                        {
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
                                                    for(var i=0;i<specname.length;i++)
                                                    {
                                                        var specname_val = specname[i].value;
                                                        var modelprice_val = modelprice[i].value;
                                                        var modelstorage_val = modelstorage[i].value;
                                                        var modelpic_val = modelpic[i].value;
                                                        if(specname_val == '')
                                                        {
                                                            layer.alert('请填写所有商品规格信息', {
                                                                icon: 2,
                                                                skin: 'layer-ext-moon' 
                                                               })
                                                            return;
                                                        }
                                                        if(modelprice_val == '')
                                                        {
                                                            layer.alert('请填写所有商品价格信息', {
                                                                icon: 2,
                                                                skin: 'layer-ext-moon' 
                                                               })
                                                            return;
                                                        }
                                                        if(modelstorage_val == '')
                                                        {
                                                            layer.alert('请填写所有商品库存信息', {
                                                                icon: 2,
                                                                skin: 'layer-ext-moon' 
                                                               })
                                                            return;
                                                        }
                                                         if(modelpic_val == '')
                                                        {
                                                            layer.alert('请填写所有商品图片信息', {
                                                                icon: 2,
                                                                skin: 'layer-ext-moon' 
                                                               })
                                                            return;
                                                        }
                                                    }
                                                    for(var i=0;i<bigpic.length;i++)
                                                    {
                                                        var bigpic_val = bigpic[i];
                                                        if(bigpic_val == '')
                                                        {
                                                            layer.alert('请填写所有商品主图信息', {
                                                                icon: 2,
                                                                skin: 'layer-ext-moon' 
                                                               })
                                                            return;
                                                        }
                                                    }
                                                    document.getElementById("addgoods").submit();
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
                    }else
                    {
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