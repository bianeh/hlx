<?php
use yii\widgets\LinkPager;
 ?>
<div id="hidebg"></div>
<div class="title">
    体验店管理 >> 体验店列表
</div>
<div class="search">
    <form id="searchform" action="" method="get">
    名称：<input name="title" type="text" />&nbsp;<button id="search" class="">搜索</button>
    </form>

</div>
<div class="anniu">
    <a href="/store/add">新增体验店</a> | <a href="/store/index">刷新页面</a>
</div>
<div class="table-responsive" >
    <table class="table">
                  <thead>
                          <tr>      
                                  <th>编号ID</th>
                                  <th>名称</th>
                                  <th>省份</th>
                                  <th>城市</th>
                                  <th>联系人</th>
                                  <th>联系电话</th>
                                  <th>纬度</th>
                                  <th>经度</th>
                                  <th>操作</th>
                          </tr>
                  </thead>
                  <tbody>
                     <?php foreach($wapnoticeinfo as $k => $v) { ?>
                          <tr>
                                  <td><input class="checkbox" value="<?php echo $v['Id'] ?> " type="checkbox"/><span class="Id"><?php echo $v['Id'] ?></span></td>
                                  <td><?php echo $v['name'] ?></td>
                                  <td><?php echo $v['province'] ?></td>
                                  <td><?php echo $v['city'] ?></td>
                                  <td><?php echo $v['linker'] ?></td>
                                  <td><?php echo $v['phone'] ?></td>
                                  <td><?php echo $v['lat'] ?></td>
                                  <td><?php echo $v['lng'] ?></td>
                                  <td>
                                      <!-- <a href="/wapnotice/edit?id=<?php echo $v['Id'] ?>">
                                          <button class="btn btn-primary">编辑</button>
                                      </a> -->
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
       ]); 
         ?> 
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
                window.location.href="/store/deletedata?ids="+ids;
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
                window.location.href = "/store/deletedata?ids="+ids;
            }    
        }
    }
</script>
