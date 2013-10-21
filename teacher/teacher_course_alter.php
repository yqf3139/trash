<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<link rel="stylesheet" type="text/css" href="../style/teacher_course_alter.css" />
<script type="text/javascript" src="../fun/ckeditor/ckeditor.js"></script>
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
</head>

<body onload="init()">
	<div id="all">
    	<?php include_once('../course/formwork/main_menu.php');
		$data=$course->getInformation('INTRODUCTION');
		 ?>
    	<div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="">课程信息</a></span></td><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
            <div id="message">
            	  <form action="../sub/UpdateCourse.php" method="POST" > 
    <table id="table" align="center">
    <input type="hidden" name="course_id" value="<?php echo $data['course_id'] ;?>"/>
     <tr><td colspan="1"><span>课程名</span></td><td colspan="5"><input type="text" name="name" value="<?php echo $data['name'] ?>"/></td></tr>
     <tr><td><span>研究方向</span></td><td colspan="5"><input type="text" name="direction" value="<?php echo $data['direction']; ?>"/></td></tr>   
     <tr><td><span>课程描述</span></td><td colspan="5">
     	                       <textarea cols="80" id="description" name="description" rows="10"><?php echo $data['description'] ;?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'description' );
			</script>
     </td></tr> 
     <tr><td></td><td><span>可以显示:</span><input type="hidden" name="available" id="show"/><input id="show1" type="checkbox" name="1available" value=1 <?php if  ($data['available']) echo 'checked="checked"';?> onChange="show_info('show1','show')"/></td><td><span>是否外链</span><input type="text" name='link' value="<?php echo $data['link']?>" onChange="showlink()"/>
    注：空表示无外链
     <div id="_link" style="display:inline; visibility:hidden">连接：<input type="text" name="link" /></div> <input type="hidden"  id="info_link" value="0"/></td><td><span>年级</span><select  hidefocus name="year">
    		 <option value=2 <?php if ($data['year']==2) echo 'selected="selected"'?>>工学硕士
             <option value=3 <?php if ($data['year']==3) echo 'selected="selected"'?>>计算机科学硕士
             <option value=4 <?php if ($data['year']==4) echo 'selected="selected"'?>>软件工程硕士
             <option value=5 <?php if ($data['year']==5) echo 'selected="selected"'?>>在职工程硕士
             <option value=1 <?php if ($data['year']==1) echo 'selected="selected"'?>>博士生
             </select></td></tr>
        <tr><td colspan="6" align="center"><input type="hidden" id="back_url" name="back_url"  value=""/><input type="submit" name='sub' value="提交"/></td></tr>
    </table>
    </form>
            </div>
      </div>
        <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>
