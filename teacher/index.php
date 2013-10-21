<?php ob_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_index.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
</head>
<body>
	<div id="all">
    	<?php 
		include_once('../course/formwork/main_menu.php');
		include_once('../login.php');
		include_once('../inc/dataClass.php');
		include_once('../student/class.php');
		
		$class=new Classr('TEACHER');
		
		
		//$login=new LoginClass;
		//$login->authority(constant('TEACHER'));		
		?>
    	<div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="">老师</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
            <div id="message">
            	<table id="function" align="center">
                	<tr align="center"><td ><a href="teacher_message.php?<?php $class->OutputId() ?>">个人信息</a></td>
                    <td><a href="teacher_homework_add.php?<?php $class->OutputId() ?>">作业发布</a></td></tr>              
                    <tr align="center"><td><a href="teacher_news.php?<?php $class->OutputId() ?>">通知发布</a></td>
                    <td><a href="teacher_homework.php?<?php $class->OutputId() ?>">批改作业</a></td></tr>
                	<tr align="center"><td><a href="teacher_course_alter.php?<?php $class->OutputId() ?>">课程信息</a></td>
                    <td><a href="teacher_add_resource.php?<?php $class->OutputId() ?>">资源发布</a></td></tr>
                    <tr align="center"><td><a href="/ProjectTest/teacher/teahcher_arrangement.php?<?php $class->OutputId() ?>">教学安排</a></td>
                    <td><a href="teacher_add_resource.php?<?php $class->OutputId() ?>"></a></td></tr>
                </table>
            </div>
      </div>
        <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>
