<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/managers_manage.css" type="text/css" />
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<?php
include_once('../../inc/dataAdministrator.php');
$db=new dataAdministrator;
$data=$db->getAll();

?>
<script>
	function checkinput()
	{
		 if (confirm("您确定添加?")) {
		 return true; 
		 }
		else {
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
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="">管理员</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
        	<table align="center" cellpadding="4" cellspacing="1" bordercolor="#718EBB" id="manager_list">
            	<tr  align="center">
                	<th valign="middle" align="center" height="25" width="20%">编号</th>
                	<th valign="middle" align="center" height="25" width="40%">姓名</th>
                    <th valign="middle" align="center" height="25" width="20%"></th>
                    <th valign="middle" align="center" height="25" width="20%"></th>
                </tr>
                <?php if(is_array($data))foreach($data as $v){?>
                <tr><td><?php echo $v['administrator_id'];?></td><td><?php echo $v['name']?></td><td><a href="/ProjectTest/manage/user_manage/managers_alter.php?id=<?php echo $v['administrator_id']?>">修改信息</a></td>
                <td>
                <form action="../../sub/DeleteAdmin.php" method="post" onsubmit = "return checkinput()">
                <input type="hidden" name="id" value="<?php echo $v['administrator_id'];?>" />
                <input type="submit" name="sub" value="删除" />
                </form>
                </td></tr>
                <?php }?>
              
                  <tr  align="center"><td colspan="4"><input type="button" value="添加" onclick="window.location.href='/ProjectTest/manage/user_manage/managers_add.php'"></td></tr>
            </table>
        </div>	
		<?php include_once('../../globals/foot.php'); ?>	
     </div>
</body>
</html>
