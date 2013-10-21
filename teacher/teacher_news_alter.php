<?
include_once('../fun/ckeditor/ckeditor.php');
include_once('../inc/dataInformation.php');
include_once('./teacher.php');
$class=new Teacher;
$id=$class->__get('id');

$db=new dataInformation;

$news_id=isset($_GET['news'])&&intval($_GET['news'])?intval($_GET['news']):die();

$data=$db->SelectByPKey($news_id);
//var_dump($data);


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
<script type="text/javascript" src="../fun/ckeditor/ckeditor.js"></script>
<body>
	<div id="all">
    	<?php include_once('../course/formwork/main_menu.php'); ?>
    	<div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="./teacher_news.php?id=<?php echo $course->__get('id'); ?>">通知发布</a>--></span><span><a href="">信息更改</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></span></td></tr>
            	</table>
        	</div>
            <form action="../sub/UpdateNotice.php" method="post" enctype="multipart/form-data">
            <table id="table_new_add" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB">
            		<tbody>
                    	<tr><th id="th1" valign="middle" colspan="8" align="center" height="25">消息发布</th></tr>
                        <input type='hidden' name='id' value='<?php  echo $data['id']; ?>'/>
                        <input type='hidden' name='promulgator' value='<?php echo $id['teacher_id']; ?>'/>
                        <input type='hidden' name='course_id' value='<?php  echo $id['course_id']; ?>'/>
                        <tr><td>消息名称</td><td><input type="text" name='title' value='<?php echo $data['title'];?>'/></td></tr>
                        <tr><td>消息内容</td><td>
                        <textarea cols="80" id="description" name="description" rows="10"><?php echo $data['description']; ?></textarea>
			<script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.
				CKEDITOR.replace( 'description' );

			//]]>
			</script>
                        </td></tr>
                        <tr><td>上传附件</td><td><input type="file" name='file' /> <?php echo "<a href='{$data['link']}'>".basename($data['link']).'</a>'?></td></tr>
                        <tr><td colspan="3" align="center"><input type="submit" name='sub'  /></td></tr>
                    </tbody>
                </table>
            </form>
        </div>
        <?php include_once('../globals/foot.php');?>
	</div>
</body>
</html>
