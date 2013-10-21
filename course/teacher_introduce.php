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
<link rel="stylesheet" href="../style/teacher_introduce.css"  type="text/css"/>
</head>
<?
	include_once('../fun/page.php');
	include_once(dirname(__FILE__).'/../globals/globals.php');
	
?>
<body>
<div id="all">
    	<?php include_once('./formwork/main_menu.php'); 
			$data=$course->getInformation('TEACHERS');
			$page=intval($_GET['page']);
  			if(!empty($page))
 			for($i=0;$i<($page-1)*3;++$i)
  			next($data);
			
		?>
    <div id="body">
    	<div id="position">
            	<table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../">首页</a>--></span><span><a href="/ProjectTest/course/index.php?id=<?php echo $course->__get('id');?>"><?php echo $course->__get('name');?></a>--></span><span><a href="">师资队伍</a></span></td></tr>
            </table>
         </div>
    	<?php include_once('./formwork/login.php');?>
        <div id="body_bottom">
        <?php include_once('./formwork/mysubmit.php');?>
        <div id="body_bottom_right">
        	<div id="nowposition">
            	
            </div>
            <div id="title" align="center">
            	师资队伍
            </div>
            <div id="teachers_window">
            <table id="teachers_list">
            	<?php for($i=0;$i<3;$i++,next($data)){ $v=current($data); if(!$v)break; ?>
            	<tr><td><div id="teacher_one"><div id="Pic_list" align="center"><div style="height:3%;"></div><img width="90%" height="97%" src="<?php  echo substr($v['picture'],3)?>" /></div>
                <div id="text_list" align="center">
                	<table id="teacher">                    
						<tr align="left"><th colspan="2"><?php echo $v['name'].' '.$v['title'];?></th></tr>
                        <tr><td><font color="#ff9900">个人主页:</font><a href="<?php echo $v['link']?>" ><?php echo $v['link']?></a></td>
                        <td align="left"><font color="#ff9900">邮箱:</font><a href=""><?php echo $v['email']?></a></td></tr>
                        <tr><td colspan="2"><?php echo $v['description']?></td></tr>
                    </table>
                </div></div></td></tr>
                <?php }?>
                </table>
               
            </div>
            <div align="center">
             <?
						_PAGEFT(count($data),3);
						 echo $pagenav;
					   ?>
            </div>
        </div>
        </div>
    </div>
    <?php include_once('../globals/foot.php'); ?>
</div>
</body>
</html>