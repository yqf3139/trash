<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心-修改学生信息</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/students_alter.css" type="text/css" />
</head>
<script>
	function check()
	{
		var id=document.getElementById("student_id").value;
		var pwd=document.getElementById("password").value;
		if(!id||!pwd)
		{
			alert("学号和密码不能为空！");
			return false;
		}
		return true;
	}
</script>
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<body>
	<div id="all">
    	<?php include_once('../../globals/head.php'); ?>
    	<div id="body">
        	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./students_manage.php">学生管理</a>--></span><span><a href="">添加单个学生</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            <form action="../../sub/AddStudent2.php" method="post" onsubmit="return check()">
            <table id="table" align="center" cellpadding="4" cellspacing="1">
            	<tr  align="left"><td width="20%">学号：</td><td ><input type="text" name="student_id" id="student_id"/></td></tr>
                <tr><td>学生姓名：</td><td><input type="text" name="name" /></td></tr>
                <tr><td>密码：</td><td><input type="password" name="password"  id="password"/></td></tr>
                <tr><td>性别：</td><td><input type="radio" name="sex" value="男" checked="checked"/>男<input type="radio" name="sex" value="女"/>女</td></tr>                
                <tr><td>学籍：</td><td><select name="type"><option value="1">研究生</option><option value="2">博士生</option></select></td></tr>                
                <tr align="center"><td colspan="3"><input type="submit" name='sub' value='确定'  /></td></tr>
            </table>
            </form>
        </div>
        <?php include_once('../../globals/foot.php'); ?>	
    </div>
</body>
</html>