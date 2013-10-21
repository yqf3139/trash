<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_homework.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<?
session_start() ;
include_once('../fun/page.php');
include_once('../student/class.php');
$class=new Classr('TEACHER');
$data=$class->GetAllHomework();
$page=intval($_GET['page']);
if(!empty($page))
for($i=0;$i<($page-1)*7;++$i)
next($data);


?>
</head>

<body>
<div id="all">
      <?php
          include_once('../course/formwork/main_menu.php');
          $id=$course->__get('id');           
     ?>
        <div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="">作业批改</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
            <div id="submit_work">
            	<table id="table" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB">
                	<tbody>
                        <tr><td valign="middle" colspan="4" id="tablebody1">作业提交情况</td></tr>
                       
                        <tr>
                        <th valign="middle" align="center" height="25" width="10%">题号</th>
                        <th valign="middle" align="center" height="25" width="45%">标题</th>
                        <th valign="middle" align="center" height="25" width="20%">布置日期</th>
                        <th valign="middle" align="center" height="25" width="25%">截止日期</th>
                        </tr>
                        
                         <?php if(is_array($data))for($i=0;$i<7;$i++,next($data)){ $v=current($data); if(!$v)break;?>
                        <tr align="center">
                        
                        <td valign="middle" id="tablebody1"><?php echo $v['num'];?></td>
                        
                        <td valign="middle" id="tablebody1"><a href="/ProjectTest/teacher/teacher_homework_list.php?<?php echo $class->OutputId(); echo "&homework_id={$v['id']}" ;?>"><?php echo $v['title'];?></a></td>
                        
                        <td valign="middle" id="tablebody1"><?php echo $v['settime'];?></td>
                        <td valign="middle" id="tablebody1"><?php echo $v['deadline'];?></td>

                        </tr>
                        <?php }?>
                   		<tr><td align="center" colspan="4">
                         <?
						_PAGEFT(count($data),7);
						 echo $pagenav;
					   ?>
                        </td></tr>
  
                    </tbody>
                </table>
            </div>
        </div>
         <?php include_once('..\globals\foot.php');?>
    </div>
</body>
</html>
