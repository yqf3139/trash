<?
include('../../fun/ckeditor/ckeditor.php');
$sBasePath=$_SERVER['PHP_SELF'];
$sBasePath=dirname($sBasePath).'/ckeditor/';
$ed=new CKEditor;

$ed->BasePath='/ProjectTest/fun/ckeditor/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/bs_notice_add.css"  type="text/css"/>
<script>
	function check()
	{
		var t=document.getElementById('title');
		if(t.value)
		{
			return true;
		}
		else
		{
			alert('标题不能为空');
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
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./bs_notice.php">学院通知</a>--></span><span><a href="">消息发布</a></span></td><td align="right"><span><a href="">【退出】</a></span></td></tr>
            	</table>
            </div>
 
            <div id="right" align="center" style="width:1000px;" >
            	<div class="_change" id="change" align="center" style="width:100%">
                <form action="../../sub/AddCenterNotice.php" method="post"  enctype="multipart/form-data" onsubmit="return check()">
					<table id="table_new_add" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB" width="100%">
            		<tbody>
                    	<tr><th id="th1" valign="middle" colspan="8" align="center" height="25">消息发布</th></tr>
                   
                        <tr><td>消息名称</td><td><input type="text" name='title' id='title'/></td></tr>
                        <tr><td>消息内容</td><td>
                        	<?
							$ed->editor('description');
							?>
                        </td></tr>
                        <tr><td>上传附件</td><td><input type="file" name='file' /></td></tr>
                        <tr><td colspan="3" align="center"><input type="submit" name='sub'  /></td></tr>
                    </tbody>
                </table>
                </form>
                </div>
            </div>
        </div>
         <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>