<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课程中心</title>
<link rel="stylesheet" href="../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../style/course_formwork.css"  type="text/css"/>
<link rel="stylesheet" href="../style/main_menu.css"  type="text/css"/>
<link rel="stylesheet" href="../style/login.css"  type="text/css"/>
<link rel="stylesheet" href="../style/mysubmit.css"  type="text/css"/>
<link rel="stylesheet" href="../style/course_introduce.css"  type="text/css"/>

 
</head>

<body>
<div id="all">
    	<?php
		 
		 include_once(dirname(__FILE__).'/../globals/globals.php');
		 include_once('./formwork/main_menu.php');
		 $introduction=$course->getInformation('INTRODUCTION');
		 ?>
    <div id="body">
    <div id="position">
            	<table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../">首页</a>--></span><span><a href="<?php echo  $GLOBALS['PATH']?>course/index.php?id=<?php echo $course->__get('id');?>"><?php echo $course->__get('name');?></a>--></span><span><a href="">课程介绍</a></span></td></tr>
            </table>
         </div>
    	<?php include_once('./formwork/login.php');?>
        <div id="body_bottom">
        <?php include_once('./formwork/mysubmit.php');?>
        <div id="body_bottom_right">
        	<div id="nowposition"> 	
            </div>
            <div id="title" align="center">
            	课程介绍
            </div>
        	<div id="course_introduce">
            	<table id="table_course_content" align="center">
                     <tr><td>&nbsp;</td></tr>
                     <tr><td><font>课程名：<span><?php echo $introduction['name'];?></span></font></td></tr>
                     <tr><td><font>研究方向:<span><?php echo $introduction['direction'];?></span></font></td></tr>
                     <tr><td><font>课程介绍:</font><?php echo $introduction['description'];?> </td></tr>

                </table>
            </div>
        </div>
        </div>
    </div>
    <?php include_once('../globals/foot.php'); ?>
</div>
</body>
</html>