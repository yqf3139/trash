<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心-学生信息管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/students_manage.css" type="text/css" />

<script type="text/javascript">
function goto_add()
{
	window.location.href="students_add.php";
}
</script>
<script>
	function send_id(obj)
	{
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
</script>
<?
	include_once('../../fun/page.php');
?>
</head>

<body>
	<div id="all">
		<?php include_once('../../globals/head.php'); ?>
        <div id="body">
        	<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./course_manage.php">学生管理</a></span></td><td align="right"><span><a href="../../Logout.php">【退出】</a></span></td></tr>
            	</table>
            </div>
            <table id="func" align="center">
            	<tr><td><input type="button" id="deletes"  value="批量删除" onclick="Pre_deletes()"/><input type="button" onclick="checkall()" value="全选"/><input type="button" onclick="cleanup()" value="清除"/></td><td><input type="button" id="ok" value="确认删除" onclick="deletes()"/></td><td><input type="text" name="search" id="search" /><input type="button" value="搜索" onclick="_search()"/></td></tr>
            </table>
        	<table align="center" cellpadding="4" cellspacing="1" bordercolor="#718EBB" id="teacher_list">
            	<tr  align="center">
                	<th valign="middle" align="center" height="25" width="50%">编号</th>
                	<th valign="middle" align="center" height="25" width="50%">姓名</th>
  
                </tr>
                 <tr><td><input type="checkbox" name="check_id" id=1 style="visibility:hidden"/>71110111</td><td>陈柏年</td></tr>
                 <tr><td><input type="checkbox" name="check_id" id=1 style="visibility:hidden"/>71110111</td><td>陈柏年</td></tr>
                 <tr><td><input type="checkbox" name="check_id" id=1 style="visibility:hidden"/>71110111</td><td>陈柏年</td></tr>
                 <tr><td colspan="2" align="center"><input type="submit" name="提交"  /></td></tr>
            </table>
          
        </div>	
          <div id="page_nun" align="center">
            <?
			_PAGEFT(100,15);
			echo $pagenav;
            ?>
            </div>
		<?php include_once('../../globals/foot.php'); ?>	
     </div>
</body>
</html>
