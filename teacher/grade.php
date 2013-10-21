<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<link rel="stylesheet" type="text/css" href="../style/teacher_homework_list.css" />
<?
include_once('../fun/page.php');
include_once('./teacher.php');
$class=new Teacher('TEACHER');
$data=$class->HandinHomework(true);
$id=$class->__get('id');
$page=intval($_GET['page']);
if(!empty($page))
for($i=0;$i<($page-1)*15;++$i)
next($data);

?>
</head>

<body>
	<div class="_all">
    	<div class="_top">
    	<div class="_top_left">
        </div>
        <div class="_top_right_top">
        </div>
    	<?php include_once('../course/formwork/main_menu.php'); ?>
		</div>
        <div class="_body">
        	<div class="_position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="teacher_homework.php?<?php echo "id=".$course->__get('id'); ?>">作业批改</a>--></span><span><a href="javascript:void(0);" onclick="history.back(-1)">提交列表</a>--></span><span><a href="">作业打分</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
            <div class="_list">
            <form action="../sub/UpdateHomework.php" method="post">
				<table class="_table_list" align="center">
                	<tr><th>学号</th><th>姓名</th><th>作业</th><th> 分数</th></tr>
                     <?php if(is_array($data))for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break;?>
                      <input type="hidden" name=student_id[] value="<?php echo $v['student_id'];?>"/>
                    <tr><td><?php echo $v['student_id'];?></td>
                    <td><?php echo $v['name'];?></td>
                    <td><?php
					 echo "<a href='{$v['file']}'>".basename($v['file'])."</a>";
						 if (strtotime($v['readtime'])<strtotime($v['settime'])) 							
						 echo "<font color='red'>新文件，请重新批改</font>" ;
						 if (strtotime($v['deadline'])<strtotime($v['settime']))
						  echo "<font color='red'>超时上传</font>" ;				 			
					
					 ?></td>
                    <td><input  name=score[] value='<?php echo $v['score'];?>'/></td></tr>
                    <?php }?>
                    <input type="hidden" name='homework_id' value="<?php echo $id['homework_id']?>" />
                    <tr><td colspan="4" align="center"><input name="sub" type="submit" value="提交" /></td></tr>                 
                    <tr><td colspan="4" align="center">
                     <?
						_PAGEFT(count($data),15);
						 echo $pagenav;
					   ?>
                    </td></tr>
                </table>
                
             </form>
            </div>
        </div>
         <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>