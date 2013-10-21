<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/students_alter.css" type="text/css" />

<script>
	function check()
	{
		var t=document.getElementById('name');
		var pwd=document.getElementById('password');
		var pwd2=document.getElementById('password2');
		if(t.value.length<4)
		{
			alert('用户名小于4位');
			return false;
		}
		else if(pwd.value.length<5)
		{
			alert('密码太短！');
			return false;
		}
		else if(pwd.value!=pwd2.value)
		{
			alert('用户密码不一致');
			return false;
		}
		else
			return true;
		
	}
	
</script>
</head>

<body>
	<div id="all">
    	<?php include_once('../../globals/head.php'); ?>
    	<div id="body">
        	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="">后台管理</a>--></span><span><a href="./managers_manage.php">管理员</a>--></span><span><a href="">管理员添加</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            <form action="../../sub/AddAdmin.php" method="post" onsubmit="return check()">
            <table id="table" align="center" cellpadding="4" cellspacing="1">
            	<tr  align="left"><td width="20%">用户名：</td><td ><input type="text" name="name" id="name" /></td></tr>
                <tr><td>密码：</td><td><input type="password" name="password" id="password"  /></td></tr>
                <tr><td>重复密码：</td><td><input type="password" name="password2"  id="password2"/></td></tr>        
                                
                <tr align="center"><td colspan="3"><input type="submit" name='sub' value="确定"  /></td></tr>
            </table>
            </form>
        </div>
        <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>