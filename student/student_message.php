<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
  include_once('class.php');
  $class=new Classr('STUDENT');
  $id=$class->__get('id');
  $UserInfo=$class->getUserInfo();  
?>
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/student_message.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
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
		var oldpwd=document.getElementById('oldpassword');
		var t=document.getElementById('equals-passwordAgain');
		var t1=document.getElementById('equals-password');
		if(oldpwd.value)
		{
			if(t.value.length<6)
			{
				alert('新密码太短！');
				return false;
			}
			else if(t.value!=t1.value)
			{
				alert('两次密码不一致');
				return false;
			}
			return true;
		
		}
		return true;
	}
</script>
</head>
<body onload="javascript:init()">
	<div id="all">
    	<?php include_once('../course/formwork/main_menu.php'); ?>
    	<div id="body">
        	<div id="position">
                <table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="">信息修改</a></span></td><td><span style="float:right"><a href="/ProjectTest/Logout.php">【退出】</a></span><span style="float:right"><a href="/ProjectTest/student/?<?php echo $class->OutputId();?>">【作业列表】</a></span></td></tr>
            </table>
        	</div>
            <div id="message">
            <form action="../sub/updateStudent2.php" method="post" onsubmit="return check()">
            	<input type="hidden" name='student_id' value="<?php echo $id['user_id'];?>" />
            	<table id="table">
                	<tbody>
                    	<tr><td colspan="2" id="table_title">[修改个人资料]</td></tr>
                        <tr><th>当前密码</th><td><input size="50" name="oldpassword" type="password" id="oldpassword" value=""></td></tr>
                        <tr><th>新密码</th><td><input size="50" name="password"  type="password" id="equals-passwordAgain"  /><div id="explanation-msg">密码长度6～16位，字母区分大小写。如果不填写，表示不修改密码。</div></td></tr>
                        <tr><th>确认密码</th><td><input size="50" name="passwordAgain" type="password" id="equals-password" ></td></tr>
                        <tr><th>姓名</th><td><input size="50" name="name" type="text" value="<?php echo $UserInfo['name']?>" id="name"></td></tr>
                        <tr><th>性别</th><td><select name="sex">
                        <option value="0" <?php if($UserInfo['sex']=='男') echo 'selected="selected"';?>>男</option>
                        <option value="1" <?php if($UserInfo['sex']=='女') echo 'selected="selected"';?>>女</option>
                        </select></td></tr>
                        <tr><td colspan="2" align="center"><input type="hidden" id="back_url" name="back_url" value=""/><input name='sub' type="submit" value="确认"  /></td></tr>
                    </tbody>
                </table>
               </form>
            </div>
      </div>
        <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>
