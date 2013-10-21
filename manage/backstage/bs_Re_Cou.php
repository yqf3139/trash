<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once('../../inc/dataCourse.php');
function getCourse(){
$Course=new dataCourse();
$Data=$Course->getAllCourse();
return $Data;
}
$data=getCourse();
$page=intval($_GET['page']);
if(!empty($page))
for($i=0;$i<($page-1)*15;++$i)
next($data);
?>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/Re_Course.css"  type="text/css"/>
<title>后台管理</title>
<script>
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
	<? include_once('../../fun/page.php');?>
	<?php include_once('../../globals/head.php'); ?>
	<div id="body">

		<div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="">推荐课程</a></span></td><td align="right"><span><a href="">【退出】</a></span></td></tr>
            	</table>
            </div>
        <div id="left">
           <?php include_once('../bs_module/manage_left.php'); ?>
        </div>
        <div id="middle">
        <h5>批量添加推荐课程<span style="color:red">（推荐个数为10个，可以适当减少，保持首页美观）</span></h5>
        	<form action="../../sub/AddRecommed.php" method="post" onsubmit = "return checkinput()">
            <?php
			if(is_array($data))for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break;
            echo '<input type="checkbox" name=course_id[] value='.$v['course_id'].' />'.$v['name'].'</font>'.' <br>';
			}
			?>
            <input type='submit' name='sub' value="提交"  />
           </form>
           <?
           	_PAGEFT(count($data),15);
             echo $pagenav;
		   ?>
        </div>
        <div id="right" class="_right">
        	<?php include_once('../bs_module/Re_Course.php'); ?></div>
        </div>
   
   		<?php include_once('../../globals/foot.php'); ?>
 </div>
</body>
</html>
