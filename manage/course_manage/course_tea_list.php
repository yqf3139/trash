<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 
	
	if(intval($_GET['id'])){
		$course_id=intval($_GET['id']);
		include_once('../../inc/dataTeacher.php');
		include_once('../../inc/dataClass.php');
		$db=new dataTeacher;
		$dbClass=new dataClass;	
		$data=$db->getAll();			
		$checked=$dbClass->SelectByCourse($course_id);
		
			
	}
	else{
		echo "非法访问";
		die();
	}
?>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/course_add_teacher.css"  type="text/css"/>
<title>后台管理</title>

</head>

<body>
<div id="all">
	<?php include_once('../../globals/head.php'); ?>
    <div id="body">
    		 	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./course_alter_delete.php">课程修改/删除</a>--></span><span><a href="">任课教师</a></span></td><td align="right"><span><a href="">【退出】</a></span></td></tr>
            	</table>
            </div>
            
        <div id="left">
          <?php include_once('../bs_module/manage_left.php'); ?>
        </div>
        <div id="right" class="_right" align="center">
        	<form action="../../sub/addClass.php" method="post">
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
        	<table class="_teacher_list" >
            	<tbody>
                	<tr><th align="center" colspan="3"><?php echo $course_id?>课教师列表</th></tr>
                    <tr><th>编号</th><th>任课教师</th><th>班级学生</th></tr>
                    <?php if(is_array($checked))foreach($checked as $v){?>
                    <tr><td><?php echo $v['teacher_id']; ?></td><td><?php echo $v['name']; ?></td><td><a href="course_add_students.php?id=<?php echo $v['class_id']; ?>">学生列表</a></td></tr>
                   <?php }?>
                    <tr><td colspan="3">
                    <input type="button" id="ok" name="sub" value="添加教师" onclick="window.location.href='/ProjectTest/manage/course_manage/course_add_teacher.php?id=<?php echo $course_id?>'"/></td></tr>
                    
                </tbody>
            </table>
            </form>
        </div>
    </div>
    <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>
