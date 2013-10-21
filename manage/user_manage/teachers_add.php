<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心-教师信息添加</title>
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/teachers_add.css" type="text/css" />
<script>
function check()
{
	var t=document.getElementById('email');
	var id=document.getElementById("teacher_id");
	if(t.value)
	{
		if(id.value.length<6)
		{
			alert("教职工编号必须大于等于6位！");
			return false;
		}
		else
		return true;
	}
	else
	{
		alert('email不能为空');
		return false;
	}
	
}
</script>
</head>

<body>
	<div id="all">
    	<?php include_once('../../globals/head.php'); ?>
    	<div id="body">
        	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./teachers_manage.php">教师管理</a>--></span><span><a href="">教师添加</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            <form action="../../sub/AddTeacher.php" enctype='multipart/form-data'  method="post" onsubmit="return check()">         
            <table id="table"  align="center" cellpadding="4" cellspacing="1">
            	<tr  align="left"><td width="20%">教职工编号：</td><td><input type="text" name="teacher_id" id="teacher_id"  /></td></tr>
            	<tr  align="left"><td width="20%">教师姓名：</td><td><input type="text" name="name"  /></td></tr>
                <tr><td>email：</td><td><input type="text" name="email" value="" id="email"/></td></tr>
                <tr><td>密码：</td><td><input type="password" name="password" value="123456" /></td></tr>
                <tr><td>性别：</td><td><input type="radio" name="sex" value="男" checked="checked"/>男<input type="radio" name="sex" value="女"/>女</td></tr>
                <tr><td>是否在职：</td><td><input type="checkbox" name="available" value="1" checked="checked"/></td></tr>
                <tr><td>职称：</td><td><select name="title"><option value="讲师">讲师</option><option value="副教授">副教授</option><option value="教授">教授</option></select></td></tr>               
                <tr><td>照片：</td><td><input type="file" name="picture"/></td></tr>
                <tr><td>个人主页链接：</td><td><input type="text" name="link"/></td></tr>
                <tr><td>简介：</td><td colspan="2"><textarea name="description" style="width:90%; height:50px"></textarea></td></tr>
                <tr align="center"><td colspan="3"><input name= 'sub' type="submit" value="确定" /></td></tr>
            </table>
            </form>
        </div>
        <?php include_once('../../globals/foot.php'); ?>	
    </div>
</body>
</html>