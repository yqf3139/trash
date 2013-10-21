<?php
	include_once('../inc/dataInformation.php');
	$id=intval($_GET['notice_id']);
	if(empty($id)){
		echo "error";
		die();
	}
	$db=new dataInformation;
	$data=$db->SelectByPKey($id);
	if(empty($data)||$data['course_id']!=$_GET['id']){
		echo "error";
		die();
	}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课程中心</title>
<link rel="stylesheet" href="../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../style/course_formwork.css"  type="text/css"/>
<link rel="stylesheet" href="../style/main_menu.css"  type="text/css"/>
<link rel="stylesheet" href="../style/login.css"  type="text/css"/>
<link rel="stylesheet" href="../style/mysubmit.css"  type="text/css"/>
<link rel="stylesheet" href="../style/notice.css"  type="text/css"/>
</head>

<body>
<div id="all">
    	<?php include_once('./formwork/main_menu.php'); ?>
    <div id="body">
    	<div id="position">
            	<div id="block" style="height:5px; width:100%"></div>
                <div style="width:3%;"></div>
        	  	<div style="width:97%;	margin:0 auto;"><span>您现在的位置：</span><span>
                <a href="../">首页</a>--></span>
                <span><a href="/ProjectTest/course/index.php?id=<?php echo $course->__get('id');?>"><?php echo $course->__get('name');?></a>--></span
                ><span><a href="">信息发布</a></span></div>
                
                
         </div>
    	<?php include_once('./formwork/login.php');?>
        <div id="body_bottom">
        <?php include_once('./formwork/mysubmit.php');?>
        <div id="body_bottom_right">

            <div id="notice" align="center">
				 <table id="table_notice" align="center">
                 	<tr align="center"><td colspan="2"><?php echo $data['title']; ?></td></tr>
                    <tr align="center"><td>发布人：<?php echo $data['promulgator']; ?></td><td>发布时间：<?php echo $data['settime']; ?> </td></tr>
                    <tr align="center"><td colspan="2">
                    <div id="text">      
                    <?php echo $data['description']; ?>
                    </div></td></tr>
                 </table>
            </div>
            <div id="download" align="center">
             <?php if($data['link'])
                    echo '<tr><td align="center" colspan="2"><span>附件下载：</span><a href="'.$data['link'].'">'.basename($data['link']).'</a></td></tr>';
				?>
            </div>
        </div>
        </div>
    </div>
    <?php include_once('../globals/foot.php'); ?>
</div>
</body>
</html>
