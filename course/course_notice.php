<?
   include_once(dirname(__FILE__).'/../globals/globals.php');
  include_once('./course.php');  
  $course=new Course;
  $data=$course->getInformation('NOTICE');

	//session_start();
	if($_POST[check])
	{
		if($_POST[check]==$_SESSION[check_pic])
		{//echo "ok";
		}
		else
		{//echo "error";
		}
	}
	  $page=intval($_GET['page']);
  			if(!empty($page))
 			for($i=0;$i<($page-1)*15;++$i)
  			next($data);
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
<link rel="stylesheet" href="../style/course_notice.css"  type="text/css"/>
<?
include_once('../fun/page.php');
?>
</head>

<body>
<div id="all">
    	<?php include_once('./formwork/main_menu.php'); ?>
    <div id="body">
    	<div id="position">
            	 <table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../">首页</a>--></span><span><a href="<?php echo  $GLOBALS['PATH']?>course/index.php?id=<?php echo $course->__get('id');?>"><?php echo $course->__get('name');?></a>--></span><span><a href="">课程公告</a></span></td></tr>
            </table>	
         </div>
    	<?php include_once('./formwork/login.php');?>
        <div id="body_bottom">
        <?php include_once('./formwork/mysubmit.php');?>
        <div id="body_bottom_right">
        	<div id="nowposition">
            	
            </div>
            <div id="title" align="center">
            	课程通知
            </div>
            <div id="notice" align="center">
            		<table id="news_contents" width="90%" >
                    	<?php if(is_array($data))for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break; ?>
                        	  <tr><td align="left">
                              <a href="<?php echo  $GLOBALS['PATH']?>course/notice.php?id=<?php echo $course->__get('id') ?>&notice_id=<?php echo $v['id']; ?>" target="_blank">
                                    <?php echo substr($v['title'],0,60);?>
                              </a>                  		
                                   
                           		</td><td align="right"> <?php echo substr($v['settime'],0,10)?></td></tr>
                         <?php }?>

                    	
                        <tr><td colspan="2" align="center">
                         <?
						_PAGEFT(count($data),15);
						 echo $pagenav;
					   ?>
                        </td></tr>
                    </table>

            </div>
        </div>
        </div>
    </div>
    <?php include_once('../globals/foot.php'); ?>
</div>
</body>
</html>
