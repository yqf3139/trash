<?
include('../../fun/ckeditor/ckeditor.php');
include_once('../../inc/dataInformation.php');
$db=new dataInformation;
if(!intval($_GET['id'])){
	die();
}
$data=$db->SelectByPkey(intval($_GET['id']));
if(empty($data))
die()


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
<script type="text/javascript" src="../../fun/ckeditor/ckeditor.js"></script>
</head>

<body>
	<div id="all">
		<?php include_once('../../globals/head.php'); ?>
       <div id="body">
            <div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./bs_notice.php">学院通知</a>--></span><span><a href="">通知更改</a></span></td><td align="right"><span><a href="">【退出】</a></span></td></tr>
            	</table>
            </div>
 
            <div id="right" align="center" style="width:1000px;" >
            	<div class="_change" id="change" align="center" style="width:100%">
                <form action="../../sub/UpdateCenterNotice.php" method="post"  enctype="multipart/form-data" >
					<table id="table_new_add" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB" width="100%">
            		<tbody>
                    	<tr><th id="th1" valign="middle" colspan="8" align="center" height="25">消息发布</th></tr>
                   		<input type="hidden" name='id' value="<?php echo intval($_GET['id'])?>">
                        <tr><td>消息名称</td><td><input type="text" name='title' value="<?php echo $data['title']?>" /></td></tr>
                        <tr><td>消息内容</td><td>
                        
                       <textarea cols="80" id="description" name="description" rows="10"><?php echo $data['description']?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'description' );
			</script>

                        	
                            
                        </td></tr>
                        <tr><td>上传附件</td><td><input type="file" name='file' /></td></tr>
                         <?php if($data['link'])
                    echo '<tr><td align="center" colspan="2"><span>附件下载：</span><a href="../../'.substr($data['link'],3).'">'.basename($data['link']).'</a></td></tr>';
				?>
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