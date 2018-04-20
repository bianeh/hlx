<?php
use backend\assets\AppAsset;
AppAsset::register($this);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>海岚香后台管理</title>
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script language="javascript" type="text/javascript" src="http://www.hailanxiang.cn:8081/common/My97DatePicker/WdatePicker.js"></script>
	<link href="http://www.hailanxiang.cn:8081/common/tablestyle/dist/css/theme.default.min.css" rel="stylesheet">
	<script src="http://www.hailanxiang.cn:8081/common/tablestyle/dist/js/jquery.tablesorter.min.js"></script>
        <script src="http://www.hailanxiang.cn:8081/common/layer/layer.js"></script>
	<script src="http://www.hailanxiang.cn:8081/common/tablestyle/dist/js/jquery.tablesorter.widgets.min.js"></script>
        <link href="http://www.hailanxiang.cn:8081/assets/136d936d/css/bootstrap.css" rel="stylesheet">
        <link href="http://www.hailanxiang.cn:8081/assets/136d936d/css/font-awesome.min.css" rel="stylesheet">
        <script src="http://www.hailanxiang.cn:8081/assets/136d936d/js/bootstrap.js"></script>
        <script src="http://www.hailanxiang.cn:8081/assets/136d936d/js/ajaxfileupload.js"></script>
        <script type="text/javascript" charset="utf-8" src="http://www.hailanxiang.cn:8081/common/editor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="http://www.hailanxiang.cn:8081/common/editor/ueditor.all.min.js"> </script>
        <script type="text/javascript" charset="utf-8" src="http://www.hailanxiang.cn:8081/common/editor/lang/zh-cn/zh-cn.js"></script>
	<script>
	$(function(){
		$('table').tablesorter({
			widgets        : ['zebra', 'columns'],
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true
		});
	});
	</script>
        <style>
            body{
                z-index:1;
            }
            .button-green{
                background: #1E9FFF;
                height:25px;
                line-height: 25px;
                border:0;
                color:#FFFFFF;
            }
            .button-red{
                background:#CD5C5C;
                height:25px;
                line-height: 25px;
                border:0;
                color:#FFFFFF;
            }
             .anniu
            {
                margin-bottom: 10px;
                margin-top:10px;
                padding:15px;
                border:1px solid #ddd;
                margin-left:25px;
            }
            .search{
                font-size:12px;
                margin-bottom:15px;
                margin-left:25px;
                border:1px solid #ddd;
                padding:15px;
            }
            .title{
                font-size:14px;
                font-weight: bold;
                margin-bottom: 5px;
                background: #2e6da4;
                padding:10px;
                color:#FFFFFF;
                margin-left:25px;
                margin-top:12px;
                
            }
            .title>a{
                color:#FFFFFF !important;
            }
            .table-responsive{
                margin-left:25px;
            }
            .button-blue{
                height:20px;
                background:#1E9FFF;
                border:0;
                line-height: 15px;
                color:#FFFFFF;
            }
            .introduction{
                margin-bottom:15px;
                font-size:12px;
                background:#1E9FFF;
                padding:10px;
                color:#FFFFFF;
            }
            .table-footer{
                margin-left:25px;
            }
            .pagebar{
                float:right;
            }
            .site-login
            {
                margin-left:25px;
                padding:15px;
                border:1px solid #ddd;
            }
            .title a{
                color:#888;
            }
            div.required label:after {
                content: " *";
                color: red;
            }
	   .pagination > li > a, .pagination > li > span{
		padding:5px;
	    }
	    .btn{
	        padding:3px;
		border-radius:0px;
                color:#FFFFFF !important;
		}
	    .Id{
                display: block;
                float:left;
                margin:4px;
                }
       .checkbox{
                        float:left;
                }
           .adv{
                    height:45px;
                    width:250px;
                }
    </style>
</head>
<body>
<?=$content?>
</body>
</html>
<script>
    var search = document.getElementById("search");
    search.onclick = function(){
        document.getElementById("searchform").submit();
    }
 </script>
