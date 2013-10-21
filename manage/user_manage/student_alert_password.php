<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/students_alter.css" type="text/css" />
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<script>
	function check()
	{
		var pwd = document.getElementById("password").value;
		var pwd2 = document.getElementById("password2").value;
		if(pwd != pwd2)
		{
			alert("密码输入不一致");
			return false;
		}
		return true;
	}
</script>
</head>
<?php 
include_once('../../inc/dataAdministrator.php');

$id=intval($_GET['id']);
if(empty($id)){
	echo "非法访问";
}
$db=new dataAdministrator;
$data=$db->SelectByPKey($id);
?>
<body>
	<div id="all">
    	<?php include_once('../../globals/head.php'); ?>
    	<div id="body">
        	<div id="body_top">
                <table style="width:100%; height:100%;">
            		<tr><td><span>您现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./managers_manage.php">学生管理</a>--></span><span><a href="">信息修改</a>--></span><span><a href="">密码修改</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            <form action="../../sub/UpdateAdmin.php" method="post" onsubmit="return check()">
            <input type="hidden" name='administrator_id' value="<?php echo $data['administrator_id']; ?>" />
            <table id="table" align="center" cellpadding="4" cellspacing="1">
                <tr><td>密码：</td><td><input type="password" name="password" id="password"  />密码涉及隐私，可修改，不可查看</td></tr>
                <tr><td>重复密码：</td><td><input type="password" name="password2" id="password2" /></td></tr>        
                <tr align="center"><td colspan="3"><input type="submit" name='sub' value="确定"  /><input type="button" name='back' value="取消" onclick="history.go(-1)"  /></td></tr>
            </table>
            </form>
        </div>
        <?php include_once('../../globals/foot.php'); ?>	
    </div>
</body>
</html>