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
<link rel="stylesheet" href="../style/resource.css"  type="text/css"/>
</head>

<body>
<div id="all">
    	<?php 
		  include_once(dirname(__FILE__).'/../globals/globals.php');
		  include_once('../fun/page.php');
		  include_once('./formwork/main_menu.php');
		  $data=$course->GetInformation('RESOURCE');
		   $page=intval($_GET['page']);
  			if(!empty($page))
 			for($i=0;$i<($page-1)*15;++$i)
  			next($data);
		 ?>
    <div id="body">
    	<div id="position">
            	<table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../" >首页</a>--></span><span><a href="/ProjectTest/course/index.php?id=<?php echo $course->__get('id');?>"><?php echo $course->__get('name');?></a>--></span><span><a href="">课程资源</a></span></td></tr>
            </table>
         </div>
    	<?php include_once('./formwork/login.php');?>
        <div id="body_bottom">
        <?php include_once('./formwork/mysubmit.php');?>
        <div id="body_bottom_right">
        	<div id="nowposition">
            	
            </div>
            <div id="title" align="center" style="font-weight:bold; font-size:36px">
            	课程资源
            </div>
            <div id="resource">
				<table id="resource_list" align="center">
                	<tr><th width="20%">编号</th><th width="65%">资源</th><th width="15%">下载</th></tr>
                    <?php for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break; ?>
                    <tr align="center"><td>1</td><td><?php echo $v['title']; ?></td><td><a href="<?php echo $v['link']; ?>">点击下载</a></td></tr>
                    <?php }?>
                </table>
                
            </div>
            <div align="center">
             <?
						_PAGEFT(count($data),15);
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

