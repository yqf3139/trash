<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/cour_add.css"  type="text/css"/>
<title>后台管理</title>

</head>

<body>
<div id="all">
	<?php include_once('../../globals/head.php'); ?>
    <div id="body">
    	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="">课程添加</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
        <div id="left">
           <?php include_once('../bs_module/manage_left.php'); ?>
        </div>
        <div id="right" class="_right">
        <h3>课程添加</h3>
        	<?php include_once('../bs_module/cour_add.php'); ?>
        </div>
    </div>
    <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>
