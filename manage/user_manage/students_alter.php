<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<?php 
include_once('../../inc/dataStudent.php');
if(!isset($_GET['id'])){
	echo '访问出错';
	die();
}
$student_id=intval($_GET['id']);
if(is_null($student_id)){
	echo '该用户不存在';
	die();
}
$db=new dataStudent;
$data=$db->SelectByPkey($student_id);
if(empty($data)){
	echo '该用户不存在';
	die();
}

?>
<title>研究生课程中心-修改学生信息</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/students_alter.css" type="text/css" />
<script>
	function check()
	{
		var t=document.getElementById('student_id');
		if(t.value)
		return true;
		else
		alert('学号不能为空');
		return false;
	}
</script>
</head>

<body>
	<div id="all">
    	<?php include_once('../../globals/head.php'); ?>
    	<div id="body">
        	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./students_manage.php">学生管理</a>--></span><span><a href="">学生信息修改</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            <form action="../../sub/UpdateStudent.php" method="post" onsubmit="return check()">
            <!--form action="" method="get"-->
            <table id="table" align="center" cellpadding="4" cellspacing="1">
            	<tr  align="left"><td width="20%">学号：</td><td ><input type="text" id="student_id" name="student_id" value=<?php echo $data['student_id'];?> /></td></tr>
                <tr><td>学生姓名：</td><td><input type="text" name="name" value="<?php echo $data['name']; ?>" /></td></tr>
                <tr><td>密码：</td><td><input type="password" name="password"   /></td></tr>
                <tr><td>性别：</td><td><input type="radio" name="sex" value="男" <?php if($data['sex']=='男') echo 'checked="checked"'; ?> />男
                <input type="radio" name="sex" value="女" <?php  if($data['sex']=='女') echo 'checked="checked"'; ?> />女</td></tr>                
                <tr><td>学籍：</td><td><select name="type"><option  value="1" <?php if($data['type']==1) echo 'selected="selected"'; ?>>研究生</option><option  value="2" <?php if($data['type']==2) echo 'selected="selected"'; ?>>博士生</option></select></td></tr>                
                <tr align="center"><td colspan="3"><input type="submit" name='sub' value="确定"  /></td></tr>
            </table>
            </form>
        </div>
        <?php include_once('../../globals/foot.php'); ?>	
    </div>
</body>
</html>