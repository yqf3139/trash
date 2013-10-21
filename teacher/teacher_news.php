<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_news.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<?
include_once('../fun/page.php');
include_once('teacher.php');
$class=new Teacher;
?>
</head>

<body>
	<div id="all">
    	<?php include_once('../course/formwork/main_menu.php'); 
		 $data=$course->getInformation('NOTICE');
		 
		 $page=intval($_GET['page']);
		if(!empty($page))
		for($i=0;$i<($page-1)*7;++$i)
		next($data);
		?>
    	<div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="">通知发布</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
            <table id="table" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB">
                	<tbody>
                    	<tr><th id="th1" valign="middle" colspan="4" align="center" height="25">通知发布</th></tr>
                        <tr>
                        <td valign="middle" align="center" height="25" width="5%">标号</td>
                        <td valign="middle" align="center" height="25" width="70%">标题</td>
                        <td valign="middle" align="center" height="25" width="15%">布置日期</td>
                        <td valign="middle" align="center" height="25" width="10%">&nbsp;</td>
                        </tr>
                        <?php if(is_array($data))for($i=0;$i<7;$i++,next($data)){ $v=current($data); if(!$v)break;?>
                        <tr><td align="center"><?php echo $v['id'];?></td><td align="center"><a href="/ProjectTest/teacher/teacher_news_alter.php?news=<?php echo $v['id'].'&';$class->outputid();?>"><?php echo $v['title']?></a></td><td align="center"><?php echo $v['settime']?></td><td align="center">
                        <form action="../sub/DeleteInfo.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $v['id'];?>" /> 
                        <input type="submit" name="sub" value="删除"/></td></tr>
                        </form>
                        <?php }?>
                        
                        <tr><td align="center" colspan="4"><input type="button" value="添加" onclick="window.location.href='/ProjectTest/teacher/teacher_news_add.php?id=<?php echo $course->__get("id"); ?>'"/></td></tr>
                        <tr><td colspan="4" align="center">
                         <?
						_PAGEFT(count($data),7);
						 echo $pagenav;
					   ?>
                        </td></tr>
                    </tbody>
                </table>
        </div>
        <?php include_once('../globals/foot.php');?>
	</div>
</body>
</html>
