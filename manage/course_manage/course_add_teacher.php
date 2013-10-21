<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include_once('../../fun/page.php');?>
<?php 
	
	if(intval($_GET['id'])){
		$course_id=intval($_GET['id']);
		include_once('../../inc/dataTeacher.php');
		include_once('../../inc/dataClass.php');
		$db=new dataTeacher;
		$dbClass=new dataClass;	
		$data=$db->getAll();			
		$checked=$dbClass->SelectByCourse($course_id);
		if($checked)
		foreach($checked as $v){
		$checkedTeacher[]=$v['teacher_id'];
		}
			
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
</script>
</head>

<body>
<div id="all">
	<?php include_once('../../globals/head.php'); ?>
    <div id="body">
    		 	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="">首页</a>--></span><span><a href="../../Logout.php">后台管理</a></span></td><td align="right"><span><a href="">【退出】</a></span></td></tr>
            	</table>
            </div>
            
        <div id="left">
          <?php include_once('../bs_module/manage_left.php'); ?>
        </div>
        <div id="right" class="_right" align="center">
        	<form action="../../sub/AddClass.php" method="post">
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
        	<table class="_teacher_list" >
            	<tbody>
                	<?php
					 do {
					  $v=current($data);
					  echo "<tr>";
					  for($i=0;$i<3;$i++){
					  if($v){                  
                	  echo '<td ><input type="checkbox" name="teacher_id[]" value='.$v['teacher_id'];
					  if($checkedTeacher&&in_array($v['teacher_id'],$checkedTeacher))
					  echo ' checked="checked"';				  
					  echo ' />'.$v['name'].'</td>';
					  
					  }
					  else break 2;
                      $v=next($data);					  
                      }
                      echo '</tr>';
                     }while(true);
					 
					 ?>
                    <tr><td colspan="3">
                    <input type="submit" id="ok" name="sub" value="确认添加" /></td></tr>
                     </tbody>
            </table>
            </form>
        </div>
    </div>
    <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>
