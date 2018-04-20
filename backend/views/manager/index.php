<?php
use yii\widgets\LinkPager;
 ?>
<div id="hidebg"></div>
<div class="title">
    账号管理 >> 账号信息
</div>
<div class="search">
    <form id="searchform" action="" method="get">
    登录名：<input name="username" type="text" />&nbsp;<button id="search" class="">搜索</button>
    </form>

</div>
<div class="anniu">
    <a href="/manager/add">新增代理</a> |
    <a href="/manager/add">新增邀请号</a> |
    <a href="/manager/add">新增直销员</a> |
    <a href="/manager/index">代理总账</a> |
    <a href="/manager/index">刷新代理列表</a> 
</div>

<div class="table-responsive" >
    <table class="table">
                  <thead>
                          <tr>      
                                  <th>编号ID</th>
                                  <th>账号</th>
                                  <th>邀请号</th>
                                  <th>微信号</th>
                                  <th>银行卡号</th>
                                  <th>开户行信息</th>
                                  <th>名字</th>
                                  <th>电话</th>
                                  <th>备注</th>
                                  <th>折扣值</th>
                                  <th>可否改密码</th>
                                  <th>可否新加代理</th>
                                  <th>所属级别</th>
                                  <th>操作</th>
                          </tr>
                  </thead>
                  <tbody>
                      <?php foreach($managerinfo as $k => $v) { ?>
                          <tr>
                                  <td><input class="checkbox" value="<?php echo $v['Id'] ?> " type="checkbox"/><span class="Id"><?php echo $v['Id'] ?></span></td>
                                  <td><?php echo $v['username'] ?></td>
                                  <td><?php echo isset($v['tuiguanghao'])&&!empty($v['tuiguanghao']) ? $v['tuiguanghao']:'/'; ?></td>
                                  <td><?php echo isset($v['wechat'])&&!empty($v['wechat']) ? $v['wechat']:'/'; ?></td>
                                  <td><?php echo isset($v['cardnumber'])&&!empty($v['cardnumber']) ? $v['cardnumber']:'/'; ?></td>
                                  <td><?php echo isset($v['cardinfo'])&&!empty($v['cardinfo']) ? $v['cardinfo']:'/'; ?></td>
                                  <td><?php echo isset($v['realname'])&&!empty($v['realname']) ? $v['realname']:'/'; ?></td>
                                  <td><?php echo isset($v['phone'])&&!empty($v['phone']) ? $v['phone']:'/'; ?></td>
                                  <td><?php echo isset($v['remark'])&&!empty($v['remark']) ? $v['remark']:'/'; ?></td>
                                  <td><?php echo isset($v['discount'])&&!empty($v['discount']) ? $v['discount']:'/'; ?>%</td>
                                  <td><?php echo $v['canModifyPwd'] ?></td>
                                  <td><?php echo $v['canAddProxy'] ?></td>
                                  <td><?php echo $v['highermanager'] ?></td>
                                  <td>
                                      <a href="/manager/edit?Id=<?php echo $v['Id'] ?>">
                                          <button class="btn btn-primary">编辑</button>
                                      </a>
                                      <button value="<?= $v['Id'] ?>" class="deleteoperation btn btn-danger">删除</button>
                                      <button value="<?= $v['Id'] ?>" class="setfunc btn btn-warning">功能设计</button>                  
                                      <button value="<?= $v['Id'] ?>" class="btn btn-info">统计</button>
                                      <button value="<?= $v['Id'] ?>" class="btn btn-success">查账</button>
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
<div class="setfuncpage" style="position:absolute;display:none;z-index:9999;top:200px;left:50%;margin-left: -200px;box-shadow: 5px 3px 3px #888888;">
        <div style="position:relative;background:#ddd;opacity:0.85;width:400px;line-height:45px;font-size:16px;height:45px;text-align:center">
            设置可否新增代理和修改密码<span style="position:absolute;right:7px;color:red" class="cancel">X</span>
        </div>
        <div style="background:#FFFFFF;height:180px;width:400px">  
            <form id="setfunc-form" action="/manager/setfunc" method="post">
                <div style="text-align:center;padding-top:15px">
                    <div>是否可新增代理：<input name="info[canAddProxy]" value="1" type="checkbox" /></div>
                    <div>能否改帐号密码：<input name="info[canModifyPwd]" value="1" type="checkbox" /></div>
                    <input type='hidden' name="info[Id]" class="managerid" />
                    <br>
                    <a class="btn btn-primary submit">确定</a>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-success">取消</a>
                </div>
            </form>
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