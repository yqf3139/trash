<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include_once('../../inc/dataCourseSelection.php'); 
	$class_id=intval($_GET['id']);
	if(empty($class_id)){
	echo 'error';
	die();
	}
  $dbClass=new dataClass;
  $res=$dbClass->SelectByPkey($class_id);
  if($res['class_id']!=$class_id){
    echo "error";
    die();
  }
?>

<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/course_add_teacher.css"  type="text/css"/>
<title>后台管理</title>
<script>
		function Pre_deletes()
	{
		var t=document.getElementsByName("check_id");
		var c=false;
		if(t.item(i).style.visibility=="hidden")
		{
			c=true;
		}
		else
		{
			c=false;
		}
		if(!c)
		{
			for(var i=0;i<t.length;i++)
			{
				t.item(i).style.visibility="hidden";
			}
			c=true;
			return ;
		}
		else
		{
			for(var i=0;i<t.length;i++)
			{
				t.item(i).style.visibility="visible";
			}
			c=false;
			return ;	
		}
			
	}
	function deletes()
	{
		var t=document.getElementsByName("check_id");
		var count=0;
		var values="";
		for(var i=0;i<t.length;i++)
		{
			if(t.item(i).checked)
			values+=t.item(i).id;
			count++;
		}
		alert(values);
	}
	function _search()
	{
		var t=document.getElementById("search");
		var val=t.value;
		window.location.href="./students_manage.php?search="+val;
	}
	function goenter()
	{
		if(window.event.keyCode == 13)
		{
			alert(1);
			document.getElementById("form1").onsubmit(); 
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
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./course_alter_delete.php">课程修改/删除</a>--></span><span><a href="javascript:void(0)" onclick="javascript:history.back();">任课教师</a>--></span><span><a href="javascript:void(0)" onclick="javascript:history.back();">学生列表</a>--></span><span><a >添加单个学生</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            
        <div id="left">
          <?php include_once('../bs_module/manage_left.php'); ?>
        </div>
        <div id="right" class="_right" align="center">
        	<form action="../../sub/AddCourseSelection.php" method="post" id="form1">
        	<table>
            	<tr><td>学号</td><td><input type="text"  name="student_id" onkeyup="goenter()"/></td></tr>
                <input type='hidden' name='class_id' value="<?php echo $class_id?>">
                <tr><td colspan="2"><input type="submit" name="sub" value="确定" /></td></tr>
            </table>
            </form>
        </div>
    </div>
    <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>
