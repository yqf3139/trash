<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/student_submit.css" />
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
</script>
<?php 
include_once "class.php";
$class=new Classr('Student');
$id=$class->__get('id');
$homework_id=intval($_GET['homework_id']);
if (empty($homework_id)){
echo "作业不存在";
die();
}

$sethomework=$class->GetSetHomework($homework_id);

if (empty($sethomework)){
echo "作业不存在";
die();
}
$homework=$class->GetHomework($homework_id);

?>
<body onload="javascript:init()">
<div id="all">
	<div id="top">
    	<?php include_once('../course/formwork/main_menu.php'); ?>
    <div id="position">
                 <table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id'); ?>">作业提交</a>--></span><span><a href="">上传</a></span></td><td><span style="float:right"><a href="/ProjectTest/Logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span><span style="float:right"><a href="/ProjectTest/student/student_message.php?id=1">【个人信息修改】</a></span></td></tr>
            </table>
     </div>
     <div id="submit_table">
     	<table id="table" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB">
        	<tr><th valign="middle" colspan="2" align="center" height="25"><?php echo $sethomework['title']?></th></tr>
            <tr><td valign="middle" >题号：</td><td width="80%" valign="middle"> <?php echo $sethomework['num']?> <a href="#"></a></td></tr>
            <tr id="td2">
            <td valign="top" >内容：</td>
                <td valign="middle" >               
      
                        <textarea name="answertext" id="text" readonly="readonly" style="height:200px">
                        <?php echo $sethomework['description'];?>	
                        </textarea>
                 </td>
            </tr>
            <tr id="td2"><td valign="middle"  >附件：：</td><td valign="middle" > <a href="<?php echo $sethomework['link'];?>"><?php echo basename($sethomework['link']);?></a></td></tr>
            <tr id="td2"><td valign="middle"  >布置日期：	</td><td valign="middle" > <?php echo $sethomework['settime'];?></td></tr>
            <tr ><td valign="middle"  >截止日期</td><td valign="middle" ><?php echo $sethomework['deadline'];?></td></tr>
            <form action="../sub/AddHomework.php" method="post" enctype="multipart/form-data">
            <tr id="td2"><td valign="middle">疑问：</td><td><textarea name="description" id="text"><?php echo $homework['description'];?></textarea></td></tr>
            <tr><td width="20%" valign="top" id="TableBody1">答案附件：<br></td>
            	<td valign="top">
                	<input type="file" name="file" /> <a href="<?php echo $homework['file'];?>"><?php echo basename($homework['file']);?></a>
                </td>
            </tr>
    		<tr>
            	<td colspan="2" style="text-align:center">
                	<input type="hidden" name="id" value="<?php  echo $id['homework_id'];?>" />
                    <input type="hidden" name="student_id" value="<?php  echo $id['user_id'];?>" />
                    <input type="hidden" name="class_id" value="<?php  echo $id['class_id'];?>" />
                    <input type="hidden" id="back_url" name="back_url" value=""/><input type="submit" name="sub" />
                    </form>
                </td>
            </tr>
        </table>
     </div>
     <?php include_once('../globals/foot.php'); ?>
</div>
</body>
</html>
