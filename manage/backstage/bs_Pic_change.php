<?php
  include_once('../../inc/dataTeacher.php');
  $teacher=new dataTeacher;
  $data=$teacher->GetAll();
  $page=intval($_GET['page']);
if(!empty($page))
for($i=0;$i<($page-1)*15;++$i)
next($data);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课程中心-后台管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/bs_Pic_change.css" type="text/css" />
</head>

<body>
	<div id="all">
    <? include_once('../../fun/page.php');?>
		<?php include_once('../../globals/head.php'); ?>
       <div id="body">
            <div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="./bs_Tea.php">教师介绍</a>--></span><span><a href="">教师图片管理</a></span></td><td align="right"><span><a href="">【退出】</a></span></td></tr>
            	</table>
            </div>
            <div id="left">
               <?php include_once('../bs_module/manage_left.php'); ?>
            </div>
            <div id="right" class="_right" align="center">
               <table id="teacher_list" align="center">
               <tr><td style="color:red" colspan="3">(点击确认修改，即可更在首页对应的教师)</td></tr>
               <tr><th>编号</th><th>姓名</th><th>确定更改</th></tr>
              <?php if(is_array($data))for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break; ?>
                  <tr><td><?php echo $v['teacher_id']; ?></td><td><?php echo $v['name'];?></td><td>
                  <form action="../../sub/AddRecommed.php" method="post" >
                  <input type="hidden" name="teacher_id" value="<?php echo $v['teacher_id']?>" />
                  <input type="hidden" name="old_teacher_id" value="<?php echo intval($_GET['id'])?>" />
                  <input type="submit" name="sub" value="确认修改"></form></td></tr>
                    <?php }?>
                   <tr><td colspan="3">
                   <?
                      _PAGEFT(count($data),15);
                      echo $pagenav;
					  ?>
                   </td></tr>
               </table>
            </div>
        </div>
         <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>
