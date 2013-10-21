<?
include('../fun/ckeditor/ckeditor.php');
$sBasePath=$_SERVER['PHP_SELF'];
$sBasePath=dirname($sBasePath).'/ckeditor/';
$ed=new CKEditor;

$ed->BasePath='/ProjectTest/fun/ckeditor/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_news_add.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
</head>

<body>
	<div id="all">
    	<div id="top">
    	<div id="top_left">
        </div>
        <div id="top_right_top">
        </div>
    	<?php include_once('../course/formwork/main_menu.php'); ?>
		</div>
    	<div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="">首页</a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="/ProjectTest/teacher/teacher_news.php?id=<?php echo $course->__get('id');?>">消息发布</a>--></span><span><a href="">信息添加</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
			  <div id="_content" style="width:829px; height:540px; background:#CCC; margin-left:100px;" align="center">
              <form method="get" action="">
           		<?
				$ed->editor('con');
				?>
                <input type="submit" name="submit" />
                </form>
            </div>
        </div>
        <?php include_once('../globals/foot.php');?>
	</div>
</body>
</html>
