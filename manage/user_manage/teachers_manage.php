<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<? include_once('../../fun/page.php');?>
<?php
	include_once('../../inc/dataTeacher.php');
	$db=new dataTeacher;
	$data=$db->getAll();
	if(!$data){
		echo "数据库为空";
	} 
if(isset($_GET['page']))
  $page=intval($_GET['page']);
if((!empty($page))&&isset($page))
  for($i=0;$i<($page-1)*15;++$i)
  next($data);
?>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/teachers_manage.css" type="text/css" />
<title>后台管理</title>
<script type="text/javascript">
function goto_add()
{
	window.location.href="teachers_add.php";
}
</script>
<script>
	function checkinput()
	{
		 if (confirm("您确定删除?")) {
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
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="">教师管理</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
        	<table align="center" cellpadding="4" cellspacing="1" bordercolor="#718EBB" id="teacher_list">
            	<tr  align="center">
                	<th valign="middle" align="center" height="25" width="20%">编号</th>
                	<th valign="middle" align="center" height="25" width="40%">姓名</th>
                    <th valign="middle" align="center" height="25" width="20%"></th>
                    <th valign="middle" align="center" height="25" width="20%"></th>
                </tr>
                 <?php for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break;?>
            	<tr  align="center"><td><?php echo $v['teacher_id']; ?></td><td><?php echo $v['name']; ?></td><td><a href="./teachers_alter.php?id= <?php echo $v['teacher_id']; ?>">修改/查看</a></td><td>
               	<form action="../../sub/DeleteTeacher.php"   method="post" onsubmit="return checkinput()">
                <input type="hidden" name="id" value="<?php echo  $v['teacher_id']?>">
                <input type="submit" name="sub" value="删除">
                </form>
                </td></tr>               	
              
                <?php }?>
                  <tr  align="center"><td colspan="4"><input type="button" value="添加" onclick="goto_add()"></td></tr>
                  <tr><td colspan="4" align="center"> 
                   <?
						_PAGEFT(count($data),15);
						 echo $pagenav;
					   ?>
                  </td></tr>
            </table>
        </div>	
		<?php include_once('../../globals/foot.php'); ?>	
     </div>
</body>
</html>