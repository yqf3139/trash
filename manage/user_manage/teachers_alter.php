<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心-教师信息修改</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/teachers_alter.css" type="text/css" />
<script>
	function check()
	{
		var t=document.getElementById('email');
		if(t.value)
		return true;
		else
		alert('email不能为空');
		return false;
	}
</script>
</head>
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<?php 
	include_once('../../inc/dataTeacher.php');
	$db=new dataTeacher;
	$id=intval($_GET['id']);
	if(empty($id)){
		echo "您的输入不合法";
		die();
	}
	$res=$db->SelectByPKey($id);
	if(!$res){
		echo "无查询编号";
		die();
	}
	
	
?>
<body>
	<div id="all">
    	<?php include_once('../../globals/head.php'); ?>
    	<div id="body">
        	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./teachers_manage.php">教师管理</a>--></span><span><a href="">信息修改</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
           <form action="../../sub/UpdateTeacher.php" enctype='multipart/form-data'  method="post" onsubmit="return check()">         
            <table id="table"  align="center" cellpadding="4" cellspacing="1">
            	<tr  align="left"><td rowspan="6" width="20%"><div style="width:100%; height:100%"><img width="100%" src="<?php echo $res['picture']?>"/></div></td><td width="20%">教师姓名：</td><td><input type="text" name="name" value="<?php echo $res['name']?>"; /></td></tr>
                <tr><td>教师编号：</td><td><input type="text" name="teacher_id" value="<?php echo $res['teacher_id'];?>" /></td></tr>
                <tr><td>email：</td><td><input type="text" name="email" value="<?php echo $res['email'];?>" id='email'/></td></tr>
                <tr><td>密码：</td><td><input type="password" name="password"  /></td></tr>
                <tr><td>性别：</td><td><input type="radio" name="sex" value="男" <?php if($res['sex']=='男') echo 'checked="checked"' ;?>/>男<input type="radio" name="sex" value="女" <?php if($res['sex']=='女') echo 'checked="checked"' ;?>/>女</td></tr>
                <tr><td>是否在职：</td><td><input type="checkbox" name="available" value="1" <?php if($res['available']==1 ) echo 'checked="checked"'; ?>/></td></tr>
                <tr><td>职称：</td><td colspan="2"><select name="title"><option value="讲师" <?php if($res['title']=='讲师') echo 'selected="selected"' ;?>>讲师</option>
                <option value="副教授" <?php if($res['title']=='副教授') echo 'selected="selected"' ;?> >副教授</option>
                <option value="教授" <?php if($res['title']=='教授') echo 'selected="selected"' ;?>>教授</option></select></td></tr>               
                <tr><td>照片：</td><td colspan="2"><input type="file" name="picture"  /></td></tr>
                <tr><td>个人主页链接：</td><td colspan="2"><input type="text" name="link" value="<?php echo $res['link'];?>"/></td></tr>
                <tr><td>简介：</td><td colspan="2"><textarea name="description" style="width:90%; height:50px" value="<?php echo $res['description'];?>" ></textarea></td></tr>
                <tr align="center"><td colspan="3"><input name= 'sub' type="submit" value="确定" /></td></tr>
            </table>
            </form>
        </div>
        <?php include_once('../../globals/foot.php'); ?>	
    </div>
</body>
</html>