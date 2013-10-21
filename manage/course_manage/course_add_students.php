<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once('../../fun/page.php');?>
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
  $dbCourseSelection=new dataCourseSelection;
  $data=$dbCourseSelection->SelectByClass($class_id);  
  $page=intval($_GET['page']);
  			if(!empty($page))
 			for($i=0;$i<($page-1)*15;++$i)
  			next($data);

?>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/course_add_teacher.css"  type="text/css"/>
<title>后台管理</title>
<script>
	function send_id(obj)
	{
		if (confirm("您确定删除?")==false) {
		 return false; 
		 }
		//window.location.href="../../sub/DeleteStudent.php?id="+obj.name;
		//alert(obj.name);
		var myForm = document.createElement("form"); 
		myForm.method="post" ;
		myForm.action = "../../sub/DeleteStudent.php" ;
		var myInput = document.createElement("input") ;   
		myInput.setAttribute("name", "id") ;   
		myInput.setAttribute("value", obj.name); 
		
		var myInput2 = document.createElement("input") ;   
		myInput2.setAttribute("name", "sub") ;   
		myInput2.setAttribute("value", "hehe"); 
		
		
		myForm.appendChild(myInput) ; 
		myForm.appendChild(myInput2) ; 
		myForm.submit() ;  
			
			
		
	}
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
		var student=new Array();
		
		var myForm = document.createElement("form"); 
		myForm.method="post" ;
		myForm.action = "../../sub/DeleteCourseSelection2.php" ;
		
		var myInput = document.createElement("input") ;   
		myInput.setAttribute("name", "sub") ;   
		myInput.setAttribute("value", "hehe"); 		
		myForm.appendChild(myInput) ; 
		var myInput2 = document.createElement("input") ;   
		myInput2.setAttribute("name", "id") ; 
		
		for(var i=0;i<t.length;i++)
		{
			if(t.item(i).checked){
			
			student.push(t.item(i).value);
			
			}
		}
		myInput2.setAttribute("value", student);
		myForm.appendChild(myInput2) ; 
		myForm.submit();
	}
	function _search()
	{
		var t=document.getElementById("search");
		var val=t.value;
		window.location.href="./students_manage.php?search="+val;
	}
		function checkall()
	{
		var t=document.getElementsByName("check_id");
		for(var i=0;i<t.length;i++)
		{
			if(t.item(i).style.visibility!="hidden")
			t.item(i).checked=true;
		}
	}
	function cleanup()
	{
		var t=document.getElementsByName("check_id");
		for(var i=0;i<t.length;i++)
		{
			if(t.item(i).style.visibility!="hidden")
			t.item(i).checked=false;
		}
	}
		function checkinput()
	{
		 if (confirm("您确定添加?")) {
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
              <tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./course_alter_delete.php">课程修改/删除</a>--></span><span><a href="javascript:void(0);" onclick="javascript:history.back(-1);" >任课教师</a>--></span><span><a href="">学生列表</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            
        <div id="left">
          <?php include_once('../bs_module/manage_left.php'); ?>
        </div>
        <div id="right" class="_right" align="center">
        	 <table id="func" align="center">
            	<tr><td><input type="button" id="deletes"  value="批量删除" onclick="Pre_deletes()"/><input type="button" onclick="checkall()" value="全选"/><input type="button" onclick="cleanup()" value="清除"/></td><td><input type="button" id="ok" value="确认删除" onclick="deletes()"/></td></tr>
            </table>
        	<table align="center" cellpadding="4" cellspacing="1" bordercolor="#718EBB" id="teacher_list">
            	<tr  align="center">
                	<th valign="middle" align="center" height="25" width="40%">编号</th>
                	<th valign="middle" align="center" height="25" width="40%">姓名</th>
                    <th valign="middle" align="center" height="25" width="20%"></th>
                </tr>
                <?php for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break;?>
            	<tr  align="left"><td><input type="checkbox" name="check_id" id=<?php echo $v['student_id']; ?> value="<?php echo $v['courseselection_id']?>" style="visibility:hidden"/><?php echo $v['student_id']; ?></td>
                <td><?php echo $v['name'] ?></td>
                <td align="center">2012/12/12</td>
                                <td>
                <form  enctype='multipart/form-data' method='post' action='../../sub/DeleteCourseSelection.php' >
                <input type='hidden' name='id' value="<?php echo $v['courseselection_id']?>">
                <input type="submit" name='sub'  value="删除" />
                </form>
                </tr>
               	
                <?php }?>
                <tr  align="center"><td colspan="2"><a  href="course_add_onestu.php?id=<?php echo $class_id?>" />添加</td><td colspan="4">
              <form name=student enctype='multipart/form-data' method='post' action='../../sub/AddCourseSelection2.php' >
 <input type='hidden' name='class_id' value="<?php echo $class_id?>">
<input type='file' name='StudentSheet'/><br />
<input type='submit' name='sub' value="确定" />
</form>                 
                </td></tr>
            </table>
             <div id="page_nun" align="center">
            <?
			_PAGEFT(count($data),15);
			echo $pagenav;
            ?>
            </div>
        </div>
    </div>
    <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>
