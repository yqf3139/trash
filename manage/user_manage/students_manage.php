<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心-学生信息管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/students_manage.css" type="text/css" />
<?php 
include_once('../../login.php');
$login=new LoginClass;
$login->authority(constant('ADMIN'));
?>
<?php
 	include_once('../../inc/dataStudent.php');
	include_once('../../fun/page.php');
	$db=new dataStudent;
  if(empty($_GET['search'])){
	$data=$db->GetAll();
  }
  else 
  {
    $id=intval($_GET['search']);
	if(empty($id))
      $data=$db->SelectByName(trim($_GET['search']));
    else
      $data=$db->SelectByPkey($id,true);
	 
  }
  $page=intval($_GET['page']);
  if(!empty($page))
  for($i=0;$i<($page-1)*15;++$i)
  next($data);
  
	
		 
?>
<script type="text/javascript">
function goto_add()
{
	window.location.href="students_add.php";
}
</script>
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
		if (!confirm("您确定添加?"))
			return false;
		var t=document.getElementsByName("check_id");
		var count=0;
		var values="";
		var student=new Array();
		
		var myForm = document.createElement("form"); 
		myForm.method="post" ;
		myForm.action = "../../sub/DeleteStudent2.php" ;
		
		var myInput = document.createElement("input") ;   
		myInput.setAttribute("name", "sub") ;   
		myInput.setAttribute("value", "hehe"); 		
		myForm.appendChild(myInput) ; 
		var myInput2 = document.createElement("input") ;   
		myInput2.setAttribute("name", "id") ; 
		
		for(var i=0;i<t.length;i++)
		{
			if(t.item(i).checked){
			
			student.push(t.item(i).id);
			
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
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="">学生管理</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            <table id="func" align="center">
            	<tr><td><input type="button" id="deletes"  value="批量删除" onclick="Pre_deletes()"/><input type="button" onclick="checkall()" value="全选"/><input type="button" onclick="cleanup()" value="清除"/></td><td><input type="button" id="ok" value="确认删除" onclick="deletes()"/></td><td><input type="text" name="search" id="search" /><input type="button" value="搜索" onclick="_search()"/></td></tr>
            </table>
        	<table align="center" cellpadding="4" cellspacing="1" bordercolor="#718EBB" id="teacher_list">
            	<tr  align="center">
                	<th valign="middle" align="center" height="25" width="15%">编号</th>
                	<th valign="middle" align="center" height="25" width="30%">姓名</th>
                    <th valign="middle" align="center" height="25" width="15%">更改日期</th>
                    <th valign="middle" align="center" height="25" width="20%"></th>
                    <th valign="middle" align="center" height="25" width="20%"></th>
                </tr>
                <?php for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break;?>
            	<tr  align="left"><td><input type="checkbox" name="check_id" id=<?php echo $v['student_id']; ?> style="visibility:hidden"/><?php echo $v['student_id']; ?></td>
                <td><?php echo $v['name'] ?></td>
                <td align="center">2012/12/12</td>
                <td><a href="<?php echo "./students_alter.php?id=".$v['student_id']; ?>" >修改</a></td>
                <td>
                <form  enctype='multipart/form-data' method='post' action='../../sub/DeleteStudent.php' >
                <input type="button" name=<?php echo $v['student_id'];  ?>  value="删除" onclick="send_id(this)" />
                </form>
                </tr>
               	
                <?php }?>
                <tr  align="center"><td colspan="2"><input type="button" value="添加" onclick="goto_add()"></td><td colspan="4">
              <form name=student enctype='multipart/form-data' method='post' action='../../sub/AddStudent.php' >
<input type='file' name='StudentSheet'/><br />
<input type='submit' name='sub' value="批量添加" onsubmit = "return checkinput()"/>
</form>
                 
                </td></tr>
            </table>
          
        </div>	
          <div id="page_nun" align="center">
            <?
			_PAGEFT(count($data),15);
			echo $pagenav;
            ?>
            </div>
		<?php include_once('../../globals/foot.php'); ?>	
     </div>
</body>
</html>
