<?
	include_once(dirname(__FILE__).'/../course.php');
	$path=$GLOBALS['PATH'];
	$course=new Course;
	
?>
	<div id="top" style="background-image:url(../img/new/<?php echo $course->__get("id")?>.png); background-repeat:no-repeat">
            <div id="top_left">
            </div>
            <div id="top_right_top">
            </div>
            <div id="main_menu">
 		<table id="list" width="540" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td><a href="<?php echo  $GLOBALS['PATH']?>course/course_introduce.php?id=<?php echo $course->__get("id"); ?>" ><img src="<?php echo  $GLOBALS['PATH']?>img/课程介绍.jpg" width="87" height="35" border="0"></a></td>
                    <td><a href="<?php echo  $GLOBALS['PATH']?>course/arrangement.php?id=<?php echo $course->__get("id"); ?>"><img src="<?php echo  $GLOBALS['PATH']?>img/教学安排.jpg" width="89" height="35" border="0"></a></td>
                    <td><a href="<?php echo  $GLOBALS['PATH']?>course/teacher_introduce.php?id=<?php echo $course->__get("id"); ?>" ><img src="<?php echo  $GLOBALS['PATH']?>img/师资介绍.jpg" width="87" height="35" border="0"></a></td>
                    <td><a href="<?php echo  $GLOBALS['PATH']?>course/course_resource.php?id=<?php echo $course->__get("id"); ?>"><img src="<?php echo  $GLOBALS['PATH']?>img/教学资源.jpg" width="89" height="35" border="0"></a></td>
                    <td><a href="<?php echo  $GLOBALS['PATH']?>course/course_notice.php?id=<?php echo $course->__get("id"); ?>"><img src="<?php echo  $GLOBALS['PATH']?>img/通知公告.jpg" width="88" height="35" border="0"></a></td>
                    <td><a href="<?php echo  $GLOBALS['PATH']?>student/?id=<?php echo $course->__get("id"); ?>"><img src="<?php echo  $GLOBALS['PATH']?>img/作业与讨论区.jpg" width="88" height="35" border="0"></a></td>
                  
                  </tr>
         </table>
</div>
			
	</div>
