<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once(dirname(__FILE__).'/../../course/course.php');
$course=new Course;
$data=$course->getInformation('INTRODUCTION');
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/cour_add.css"  type="text/css"/>
<title>后台管理</title>

<script>
    function check()
	{
		var t=document.getElementById('name');
		if(t.value)
		{
			return true;
		}
		else
		{
			alert('课程名不能为空');
			return false;
		}
	}
	function show_info(id1,id)
	{
		var t1=document.getElementById(id1);
		
		var t=document.getElementById(id);
		if(t1.checked==true)
			t.value=1;
		else
			t.value=0;
	}
</script>
</head>

<body>
<div id="all">
	<?php include_once('../../globals/head.php'); ?>
    <div id="body">
    	 	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./course_alter_delete.php">课程修改/删除</a>--></span><span><a href="">课程修改</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            
        <div id="left">
            <?php include_once('../bs_module/manage_left.php'); ?>
        </div>
        <div id="right" class="_right">
 <div id="add">
    <form action="../../sub/UpdateCourse.php" method="POST" onsubmit="return check()"> 
    <table class="_table" align="center">
    <input type="hidden" name="course_id" value="<?php echo $data['course_id'] ;?>"/>
     <tr><td><span>课程名<span style="color:red">（必须填写）</span></span></td><td><input type="text" name="name" value="<?php echo $data['name'] ?>" id="name"/></td></tr>  
     <tr><td><span>课程描述</span></td><td><textarea rows="10" cols="30" name="description" ><?php echo $data['description']?></textarea></td></tr> 
     <tr><td><span>可以显示</span></td><td align="left"><input type="hidden" name="available" id="show"/><input id="show1" type="checkbox" name="available" value=1 <?php if  ($data['available']) echo 'checked="checked"';?> onChange="show_info('show1','show')"/></td></tr> 
     <tr><td><span>是否需要外链</span></td><td align="left"><input type="text" name='link' value="<?php echo $data['link']?>" />
     <p>注：空表示无外链</p>
          <tr><td><span>年级</span></td><td align="left"><select  hidefocus name="year">
             <option value=2 <?php if ($data['year']==2) echo 'selected="selected"'?>>工学硕士
             <option value=3 <?php if ($data['year']==3) echo 'selected="selected"'?>>计算机科学硕士
             <option value=4 <?php if ($data['year']==4) echo 'selected="selected"'?>>软件工程硕士
             <option value=5 <?php if ($data['year']==5) echo 'selected="selected"'?>>在职工程硕士
             <option value=1 <?php if ($data['year']==1) echo 'selected="selected"'?>>博士生
             </select></td></tr>
        <tr><td colspan="2"><input type="submit" name='sub' value="提交"/></td></tr>
    </table>
    </form>
</div>       	
        </div>
    </div>
    <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>
