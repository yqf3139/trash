<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_add_work.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />

</head>
<script>
	function init()
	{
		var url = self.location.href;
		var urls = url.split('?');
		if(urls.length>=2)
		document.getElementById("back_url").value=urls[1];
		//alert(document.getElementById("back_url").value);
	}
	function check()
	{
		var title = document.getElementById("title").value;
		if(!title)
		{
			alert("标题不能为空");
			return false;
		}
		return true;
	}
</script>
<body onload="init()">
<div id="all">
	<div id="top">
    	<?php include_once('../course/formwork/main_menu.php'); ?>
            <div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="./teacher_homework_add.php?id=<?php echo $course->__get('id')."&class_id={$_GET['class_id']}";?>">作业发布</a>--></span><span><a href="">作业添加</a></span></td><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
     </div>
     <div id="submit_table">
     	<table id="table" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB">
        	<form action="../sub/AddSetHomework.php" method="post" enctype="multipart/form-data" onsubmit="return check()">
            <input type="hidden" name="class_id" value="<?php echo $_GET['class_id'] ?>" />
        	<tr><th valign="middle" colspan="2" align="center" height="25">添加作业</th></tr>
            <tr id="td2"><td valign="middle"  >标题：</td><td valign="middle" >
            <input style="width:90%" name="title" value="" id="title"/></td></tr>
            <tr id="td2"><td valign="middle"  >题号：</td><td valign="middle" ><input type="text" name='num' ></td></tr>  
            <tr><td valign="top" >内容：</td>
                <td align="center">               
   
                        <textarea name="description" id="_text" style="width:98%; height:150px;" >
               
                        </textarea>
                   
                 </td>
            </tr>
            <tr id="td2"><td valign="middle"  >附件：</td><td valign="middle" ><input type="file" name="file" value="在此上传"></td></tr>          
            <tr ><td valign="middle"  >截止日期：</td><td valign="middle" ><input style="width:20%" name='deadline' type="text" value=""/>形如2012-01-01<a href="#"></a></td></tr>       
    		<tr>     	<td colspan="2" style="text-align:center">
            <input type="hidden" id="back_url" name="back_url" value=""/><input type="submit" name="sub" value="提交" />
                </td>
            </tr>
            </form>
        </table>
     </div>
</div>
</body>
</html>
