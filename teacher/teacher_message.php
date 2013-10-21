<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_message.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<?php  
include_once('../inc/dataTeacher.php');
include_once('../student/class.php');
$class=new Classr('TEACHER');
$id=$class->__get('id');
$db=new dataTeacher;
$res=$db->selectbyPkey($id['teacher_id']);
if(empty($res)){
	echo "该老师不存在";
	die();
}
?>
<script>
	function check()
	{
		var oldpwd=document.getElementById('oldPassword');
		var t=document.getElementById('password');
		var q=document.getElementById('email');
		var t1=document.getElementById('passwordAgain');
		if(!q.value)
		{
			alert('email不能为空');
			return false;
		}
		if(oldpwd.value)
		{
			if(t.value.length<6)
			{
				alert('密码太短！');
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
	function init()
	{
		var url = self.location.href;
		var urls = url.split('?');
		if(urls.length>=2)
		document.getElementById("back_url").value=urls[1];
		//alert(document.getElementById("back_url").value);
	}
</script>
</head>

<body onload="init()">
	<div id="all">
    	<?php include_once('../course/formwork/main_menu.php'); ?>
        
    	<div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="">个人信息</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
            <div id="message">
            <form action="../sub/UpdateTeacher.php" method="post" onsubmit="return check()" enctype="multipart/form-data">
            	<table id="table">
                	<tbody>
                    
                    	<tr><td colspan="3" id="table_title" align="center">[修改个人资料]</td></tr>
                        <tr  align="left"><td rowspan="6" width="25%"><div style="width:100%; height:100%"><img width="100%" src="<?php echo substr($res['picture'],3);?>"/></div></td><td width="20%">教师姓名：</td><td><input type="text" name="name" value="<?php echo $res['name']?>"; /></td></tr>
                        <tr><th>当前密码</th><td><input size="50" name="oldPassword" type="password" value="" id="oldPassword"></td></tr>
                        <tr><th>新密码</th><td><input size="50" name="password" type="password" id="password"><div id="explanation-msg">密码长度6～16位，字母区分大小写。如果不填写，表示不修改密码。</div></td></tr>
                        <tr><th>确认密码</th><td><input size="50" name="passwordAgain" type="password" id="passwordAgain"></td></tr>
                        <tr><td>编号：</td><td><?php echo $res['teacher_id'];?><input type="hidden" name="teacher_id" value="<?php echo $res['teacher_id'];?>" /></td></tr>
                        <tr><td>email：</td><td><input type="text" name="email" value="<?php echo $res['email'];?>" id="email"/></td></tr>
                        <tr><td>性别：</td><td colspan="2"><input type="radio" name="sex" value="男" <?php if($res['sex']=='男') echo 'checked="checked"' ;?>/>男<input type="radio" name="sex" value="女" <?php if($res['sex']=='女') echo 'checked="checked"' ;?>/>女</td></tr>
                        <tr><td>是否在职：</td><td colspan="2"><input type="checkbox" name="available" value="1" <?php if($res['available']==1 ) echo 'checked="checked"'; ?>/></td></tr>
                        <tr><td>职称：</td><td colspan="2"><select name="title"><option value="讲师" <?php if($res['title']=='讲师') echo 'selected="selected"' ;?>>讲师</option>
                        <option value="副教授" <?php if($res['title']=='副教授') echo 'selected="selected"' ;?> >副教授</option>
                        <option value="教授" <?php if($res['title']=='教授') echo 'selected="selected"' ;?>>教授</option></select></td></tr>               
                        <tr><td>照片：</td><td colspan="2"><input type="file" name="picture"  /></td></tr>
                        <tr><td>个人主页链接：</td><td colspan="2"><input type="text" name="link" value="<?php echo $res['link'];?>"/></td></tr>
                        <tr><td>简介：</td><td colspan="2"><textarea name="description" style="width:95%; height:100px" value="<?php echo $res['description'];?>" ></textarea></td></tr>
                        <tr align="center"><td colspan="3"><input type="hidden" id="back_url" name="back_url" value=""/><input name= 'sub' type="submit" value="确定" /></td></tr>
                    </tbody>
                </table>
               </form>
            </div>
      </div>
        <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>
