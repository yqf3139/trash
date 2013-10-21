		 <?php
		 	/*
		 
		  var_dump($_SESSION);*/
		  include_once('../../login.php');
		  include_once('../../inc/dataAdministrator.php');
		  $login=new LoginClass;
		  $login->authority(constant('ADMIN'));		 
		  $db=new dataAdministrator;
		  $user=$db->SelectByName($_SESSION['name']);
		  
		 ?>
         <div id="first">
            	 <h1>首页管理</h1>
                 <table  >
                  <tr><td><a href="../backstage/bs_Pic.php">图片展示</a></td></tr>
                  <tr><td><a href="../backstage/bs_Tea.php">教师介绍</a></td></tr>
                  <tr><td><a href="../backstage/bs_Re_Cou.php">推荐课程</a></td></tr>
                    <tr><td><a href="../backstage/bs_notice.php">学院通知</a></td></tr>
                 </table>
            </div>
            <div id="second">
            	<h1>课程管理</h1>
                <table style="text-align:center; margin-left:20px;">
                  <tr><td ><a href="../course_manage/course_add.php">课程添加</a></td></tr>
                  <tr><td><a href="../course_manage/course_alter_delete.php">课程修改</a></td></tr>
                  <tr><td><a href="../course_manage/course_alter_delete.php">课程删除</a></td></tr>
                 </table>
            </div>
            <div id="third">
            	<h1>用户管理</h1>
                <table style="text-align:center; margin-left:20px;">
                  <tr><td><a href="../user_manage/students_manage.php">学生</a></td></tr>
                  <tr><td><a href="../user_manage/teachers_manage.php">老师</a></td></tr>
                  <tr><td><a href="../user_manage/managers_manage.php">管理员</a></td></tr>
                  <tr><td><a href="../user_manage/managers_alter.php?id=<?php echo $user['administrator_id'];?>">本用户</a></td></tr>
                 </table>
           
            </div>