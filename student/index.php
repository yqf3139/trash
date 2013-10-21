<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/student_homework.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<?php 
  include_once('../fun/page.php');
  include_once('class.php');
  $class=new Classr('STUDENT');
  $data=$class->GetAllHomework(); 
  
  $page=intval($_GET['page']);
  if(!empty($page))
  for($i=0;$i<($page-1)*15;++$i)
  next($data);
  
  
  
?>
</head>

<body>
	<div id="all">
    	<?php include_once('../course/formwork/main_menu.php'); ?>
        <div id="body">
        	<div id="position">
             <table style="width:100%; height:100%;">
              <tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>" ><?php echo $course->__get('name'); ?></a>--></span><span><a href="">作业提交</a></span></td><td><span style="float:right"><a href="/ProjectTest/Logout.php?id=<?php echo $_GET['id'];?>">【退出】</a></span><span style="float:right"><a href="/ProjectTest/student/student_message.php?<?php $class->OutputId();?>">【个人信息修改】</a></span></td></tr>
            </table>
        	</div>
            <div id="submit_work">
            	<table id="table" align="center" cellpadding="3" cellspacing="1" bordercolor="#718EBB">
                	<tbody>
                    	<tr><td valign="middle" colspan="8" id="tablebody1">作业发布情况</td></tr>
                        <tr>
                        <th valign="middle" align="center" height="25" width="5%">题号</th>
                        <th valign="middle" align="center" height="25" width="25%">标题</th>
                        <th valign="middle" align="center" height="25" width="10%">布置日期</th>
                        <th valign="middle" align="center" height="25" width="10%">截止日期</th>
                        <th valign="middle" align="center" height="25" width="15%">提交时间</th>
                        <th valign="middle" align="center" height="25" width="10%">得分</th>
                        <th valign="middle" align="center" height="25" width="15%">状态</th>
                        <th valign="middle" align="center" height="25" width="10%">&nbsp;</th>
                        </tr>
                        <?php if(is_array($data))for($i=0;$i<15;$i++,next($data)){ 
						$v=current($data); if(!$v)break; 
						$res=$class->GetHomework($v['id']);
						?>
                        <tr align="center">
                        <td valign="middle" ><?php echo $v['num'];?></td>
                        <td valign="middle" ><a target="_blank" href="student_submit.php?<?php echo $class->OutputId().'&'.'homework_id='.$v['id']; ?>">
						<?php echo $v['title'];?></a></td>
                        <td valign="middle" ><?php echo substr($v['settime'],0,10)?></td>
                        <td valign="middle" ><?php echo $v['deadline']?></td>
                        <td valign="middle" >
                        <?php echo $res['settime']; ?>
                        </td>
                        
                        <td valign="middle" >
                        <?php echo $res['score']?>
                        </td>
                        <td valign="middle" >
                        <?php echo empty($res)?'<font color="red" >未提交</font>':'已提交'?>
                        
                        </td>
                        <td valign="middle" ><a href="student_submit.php?<?php echo $class->OutputId().'&'.'homework_id='.$v['id']; ?>">[提交]</a></td>
                        </tr>
                        <?php }?>
						
						<tr><td colspan="8" align="center"><?php
						_PAGEFT(count($data),15);
						 echo $pagenav;
					   ?></td></tr>
                        </tbody>
                </table>
            
              
            </div>
        </div>
         <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>
