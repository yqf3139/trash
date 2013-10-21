<?php
	include_once('./inc/dataInformation.php');
	$id=intval($_GET['id']);
	if(empty($id)){
		echo "error";
		die();
	}
	$db=new dataInformation;
	$data=$db->SelectByPKey($id);
	if(empty($data)||!is_null($data['course_id'])){
		echo "error";
		die();
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心-新闻公告</title>
<link rel="stylesheet" type="text/css" href="./style/head.css"/>
<link rel="stylesheet" href="./style/notice_one.css"  type="text/css"/>
<link rel="stylesheet" href="./style/foot.css"  type="text/css"/>
</head>

<body>
	<div class="_all">
	<?php include_once('./globals/head.php'); ?>
    <div class="_body">
    	<div class="_body_top">
        	<div class="_block" style="height:5px; width:100%"></div>
            <div style="width:3%;"></div>
        	<div style="width:97%;	margin:0 auto;"><span>您现在的位置：</span><span><a href="/ProjectTest/index.php">首页</a>--></span><span>新闻公告</span></div>
        </div>
        <div class="_right"> 
        	<div style="height:20px; "></div>
 			<table class="_notice_table" align="center">
            	<tr><th colspan="2"><?php echo $data['title']; ?></th></tr>
                <tr> 
          <td width="29%" align="center" height="30" style="border-top: 1px solid #666666;border-bottom: 1px solid #666666"></td>
          <td width="71%" align="center" style="border-top: 1px solid #666666;border-bottom: 1px solid #666666"> 
            发布时间：<?php echo $data['settime']; ?> 
        		</tr>
				<tr><td colspan="2"><div style="width:100%;"><?php echo $data['description']; ?></div></td></tr>
                <?php if($data['link'])
                    echo '<tr><td align="center" colspan="2"><span>附件下载：</span><a href="'.substr($data['link'],3).'">'.basename($data['link']).'</a></td></tr>';
				?>
            </table>
        </div>
        <div class="_download" style="width:100%; height:30px; " align="center">
   
        </div>
    </div>
    <?php include_once('./globals/foot.php'); ?>
</div>
</body>
</html>
