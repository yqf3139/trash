<?php
include_once('../../inc/dataCourse.php');
$course=new dataCourse;
$data=$course->getAllCourse(false);
	if(!empty($page))
 			for($i=0;$i<($page-1)*15;++$i)
  			next($data);
?>
<script>
function checkinput()
	{
		 if (confirm("您确定添加?")) {
		 return true; 
		 }
		else {
		 return false; 
		 }
	}
</script>
<div class="_alter">
<table id="alter_table">
	<tbody>
    	<tr><td width="40%" >课程名称<span style="color:red">(红色为不可显示课程)</span></td><td></td><td></td><td></td></tr>
        <?php if(is_array($data))for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break;?>
        <tr><td><?php
		 
		
		 echo '<a  target="_blank" href="../../course/?id='.$v['course_id'].'"';
		 if(!$v['available'])
		 echo ' style="color:red"';
		 echo '>'.$v['name'].'</a>';
		 ?>
         </td><td><a   target="_blank" href="../course_manage/course_alter.php?id=<?php echo $v['course_id']?>">修改</a></td>
         <td><a  target="_blank" href="course_tea_list.php?id=<?php echo $v['course_id']?>" >任课教师</a></td>
         <td><form action="../../sub/DeleteCourse.php" method="post" onsubmit = "return checkinput()">
         <input type="hidden" name='id' value="<?php echo $v['course_id']?>" /><input type="submit" name='sub' value="删除"/>
         </form></td></tr>
        <?php } ?>

		<tr><td colspan="4">
         <?
           	_PAGEFT(count($data),15);
             echo $pagenav;
		   ?>
        </td></tr>
    </tbody>
</table>

</div>
