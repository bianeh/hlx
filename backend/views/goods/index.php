<?php
use yii\widgets\LinkPager;
 ?>
<div id="hidebg"></div>
<div class="title">
    商品管理 >> 商品列表
</div>
<div class="search">
    <form id="searchform" action="" method="get">
    产品名称：<input name="username" type="text" />&nbsp;<button id="search" class="">搜索</button>
    </form>

</div>
<div class="anniu">
    <a href="/goods/add">新增商品</a> | <a href="/goods/index">刷新页面</a>
</div>
<div class="table-responsive" >
    <table class="table">
                  <thead>
                          <tr>      
                                  <th>编号ID</th>
                                  <th>分类</th>
                                  <th>名称</th>
                                  <th>状态</th>
                                  <th>上下架</th>
                                  <th>操作</th>
                          </tr>
                  </thead>
                  <tbody>
                      <?php foreach($goodsinfo as $k => $v) { ?>
                          <tr>
                                  <td><input class="checkbox" value="<?php echo $v['Id'] ?> " type="checkbox"/><span class="Id"><?php echo $v['Id'] ?></span></td>
                                  <td><?php echo $v['big'] ?>/<?php echo $v['small'] ?></td>
                                  <td><?php echo $v['name'] ?></td>
                                  <td>
                                  <?php 
                                      $valid = $v['valid'];
                                      if($valid == 0)
                                      {
                                         echo "<span style='padding:3px;color:#FFFFFF;background:red'>未上架</span>";
                                      }
                                      if($valid == 1)
                                      {
                                         echo "<span style='color:#FFFFFF;padding:3px;background:#5bc0de'>已上架</span>";
                                      }
                                  ?>
                                  </td>
                                  <td>
                                      <?php $valid = $v['valid'];if($valid == 0){ ?>
                                      <button value="<?php echo $v['Id'] ?>"  class="btn btn-link up" style="color:#337ab7 !important" >上架</button>
                                      <?php } ?>
                                      <?php $valid = $v['valid'];if($valid == 1){ ?>
                                      <button value="<?php echo $v['Id'] ?>"  class="btn btn-link down" style="color:red !important" >下架</button>
                                      <?php } ?>
                                  </td>
                                  <td>
                                      <a href="/goods/edit?id=<?php echo $v['Id'] ?>">
                                          <button class="btn btn-primary">编辑</button>
                                      </a>
                                      <a href="/goodsmodel/goodsmodelinfo?Id=<?php echo $v['Id'] ?>">
                                          <button class="btn btn-success">规格信息</button>
                                      </a>
                                      <a href="/bigpic/bigpicinfo?Id=<?php echo $v['Id'] ?>">
                                          <button class="btn btn-info">大图</button>
                                      </a>
                                      <button value="<?= $v['Id'] ?>" class="deleteoperation btn btn-danger">删除</button>
                                  </td>
                          </tr>
                      <?php } ?>
                  </tbody>
    </table>
</div>
<div class="table-footer">
    <button class="btn btn-primary" onclick="selectAll()">全选/反选</button>
    <button class="btn btn-danger" onclick="deleteAll()">批量删除</button>
    <div class="pagebar">
        <?= LinkPager::widget([   
        'pagination' => $pages,   
        'nextPageLabel' => '下一页',   
        'prevPageLabel' => '上一页',   
        'firstPageLabel' => '首页',   
        'lastPageLabel' => '尾页',  
          ]); ?> 
    </div>
</div>
<style>
      #hidebg {
      position:fixed;
      left:0px;
      top:0px;
      background-color:#000;
      top: 0%;  
      left: 0%;
      height:1200px;
      width:100%;
      filter:alpha(opacity=60);
      opacity:0.6;
      display:none;
      z-Index:1000;}
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $(".deleteoperation").click(function(){
            var ids = $(this).val();
            var r = confirm("确定要删除该条数据吗？");
            if(r)
            {
                window.location.href="/goods/deletedata?ids="+ids;
            }     
        });
        $(".setfunc").click(function(){
            $(".setfuncpage").css("display","block");
            var hidebg=document.getElementById("hidebg");
            hidebg.style.display="block";
            var Id_val = $(this).val();
            $(".managerid").attr('value',Id_val);  
        });
        $(".cancel").click(function(){
            $(".setfuncpage").css("display","none");
            var hidebg=document.getElementById("hidebg");
            hidebg.style.display="none";
        });
        $(".submit").click(function(){
            $("#setfunc-form").submit();
        })
    })
    var a = 0;
    function selectAll()
    {   
        switch(a)
        {
            case 0:
            a = 1;
            selectallCheckbox();
            break;
            case 1:
            a = 0;
            cancelallCheckbox();
            break;
        }
    }
    function selectallCheckbox()
    {
        var checkboxselect = document.getElementsByClassName('checkbox');
        for(var j=0;j<checkboxselect.length;j++)
        {
            if(checkboxselect[j].checked != true)
            {
                checkboxselect[j].checked = true;
            }
        }
    }
    function cancelallCheckbox()
    {
        var checkboxselect = document.getElementsByClassName('checkbox');
        for(var j=0;j<checkboxselect.length;j++)
        {
            if(checkboxselect[j].checked == true)
            {
                checkboxselect[j].checked = false;
            }
        }
    }
    function deleteAll()
    {   
        var checkboxselect = document.getElementsByClassName('checkbox');
        var i=0;
        var ids = '';
        for(var j = 0;j<checkboxselect.length;j++)
        {
             if(checkboxselect[j].checked == true)
             {
                 i = i + 1;
                 if(ids == '')
                 {
                     ids = checkboxselect[j].value;
                 }else{
                     ids = checkboxselect[j].value+","+ids;
                 }
             }
        }
        if(i == 0)
        {
            alert('至少选择一项进行删除！');
        }
        else
        {   
            var r = confirm("确定要批量删除数据吗！")
            if(r)
            {
                window.location.href = "/goods/deletedata?ids="+ids;
            }    
        }
    }

    $(".up").click(function(){
        var r = confirm("确定要上架吗");
        if(r)
        {
          var Id = $(this).val();
          var valid = 1;
           $.ajax({
             type:"POST",
             dataType:"json",
             url:"/goods/udact",
             data:{Id:Id,valid:valid},
             success:function(str){
                 var msg = str.msg;
                 alert(msg);
             },
             error:function(str){},
          })
        }
    })
    $(".down").click(function(){
        var r = confirm("确定要下架吗");
        if(r)
        {
          var Id = $(this).val();
          var valid = 0;
           $.ajax({
             type:"POST",
             dataType:"json",
             url:"/goods/udact",
             data:{Id:Id,valid:valid},
             success:function(str){
                 var msg = str.msg;
                 alert(msg);
             },
             error:function(str){},
          })
        }
    })
</script>