<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>课程中心-后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../style/head.css"/>
<link rel="stylesheet" href="../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../style/index_manage.css" type="text/css" />
</head>

<?php
include_once('../login.php');
$login=new LoginClass();
$login->authority(constant('ADMIN'));
 include_once('../inc/dataAdministrator.php');

	 
		  $db=new dataAdministrator;
		  $user=$db->SelectByName($_SESSION['name']);
?>
<body>
	<div id="all">
		<?php include_once('../globals/head.php'); ?>
        <div id="body">
        	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../">首页</a>--></span><span><a href="./">后台管理</a></span></td><td align="right"><span><a href="../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            
        	<table id="firstpage_manage" width="80%" align="center">
            	<tr><th>首页管理</th><th>课程管理</th><th>用户管理</th></tr>
            	<tr align="center"><td ><a href="./backstage/bs_Pic.php">图片展示</a></td><td><a href="./course_manage/course_add.php">课程添加</a></td><td><a href="./user_manage/students_manage.php">学生</a></td></tr>
                <tr align="center"><td><a href="./backstage/bs_Tea.php">教师介绍</a></td><td><a href="./course_manage/course_alter_delete.php">课程修改</a></td><td><a href="./user_manage/teachers_manage.php">老师</a></td></tr>
                <tr align="center"><td><a href="./backstage/bs_Re_Cou.php">推荐课程</a></td><td><a href="./course_manage/course_alter_delete.php">课程删除</a></td><td><a href="./user_manage/managers_manage.php">管理员</a></td></tr>
                <tr align="center"><td><a href="./backstage/bs_notice.php">学院通知</a></td><td><a href=""></a></td><td><a href="./user_manage/managers_alter.php?id=<?php echo $user['administrator_id'];?>">本用户</a></td></tr>
           
            </table>
        </div>
        <?php include_once('../globals/foot.php'); ?>
    </div>
</body>
</html>
