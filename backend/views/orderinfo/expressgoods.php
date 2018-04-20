<?php
use yii\widgets\LinkPager;
 ?>
<div id="hidebg"></div>
<div class="title">
    订单管理 >> 订单列表
</div>
<div class="search">
    <form id="searchform" action="" method="get">
    订单号：<input name="orderid" type="text" />&nbsp;<button id="search" class="">搜索</button>
    </form>

</div>
<div class="anniu">
    <a href="/orderinfo/index">全部</a>|
    <a href="/orderinfo/payment">待支付</a>|
    <a href="/orderinfo/haspayment">已支付</a>|
    <a style="color:red" href="/orderinfo/expressgoods">已发货</a>|
    <a href="/orderinfo/getgoods">已收货</a>|
    <a href="/orderinfo/exptime">超时未支付</a>
</div>
<div class="table-responsive" >
    <table class="table">
                  <thead>
                          <tr>      
                                  <th>编号ID</th>
                                  <th>订单号</th>
                                  <th>付款金额</th>
                                  <th>创建时间</th>
                                  <th>会员昵称</th>
                                  <th>操作</th>
                          </tr>
                  </thead>
                  <tbody>
                   <?php foreach ($orderinfo as $key => $value) { ?>
                      <tr>
                          <td><?= $value['Id'] ?></td>
                          <td><?= $value['orderid'] ?></td>
                          <td><?= $value['price'] ?></td>
                          <td><?= $value['orderdate'] ?></td>
                          <td><?= $value['userid'] ?></td>
                           <td>       
                                      <a href="/orderinfo/detail?id=<?php echo $value['Id'] ?>">
                                          <button class="btn btn-success">查看</button>
                                      </a>
                                      <a href="/orderinfo/edit?Id=<?php echo $value['Id'] ?>">
                                          <button class="btn btn-primary">编辑</button>
                                      </a>
                                      <button value="<?= $value['Id'] ?>" class="deleteoperation btn btn-danger">删除</button>
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
                window.location.href="/manager/deletedata?ids="+ids;
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
                window.location.href = "/manager/deletedata?ids="+ids;
            }    
        }
    }
</script>

