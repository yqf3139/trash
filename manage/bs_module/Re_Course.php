<?php
include_once('../../recommend.php');
$Center=new CenterIndex();
$CourseRcmd=array();
$TeacherRcmd=array();
$Center->GetRcmd($CourseRcmd,$TeacherRcmd);
//var_dump($CourseRcmd);
?>
        <h4>手动添加推荐课程</h4>
        	<table>
            	<tbody>
              <?php if($CourseRcmd)foreach($CourseRcmd as $k=>$v){?> 
              <tr>
              <td><?php
               $Center->OutputOneCourseNew($v);?>
              </td>
              <td> 
              <form name=<?php echo $v['id'] ?> action='../../sub/DeleteRecommed.php' method='post'>
              	<input type="hidden" name="id" value=<?php echo $v['id']?> />
              	<input type="submit" name="sub" value="删除"  />
              </form> 
              </td>  
             </tr>
              <?php } else echo "数据库未包含任何内容";?>
              </tbody>
            </table>
            &nbsp;&nbsp;名&nbsp;字&nbsp;：
            <form name=addCourseRcmd action="../../sub/AddRecommed.php" method='post'>
            	<input type="text" name="name"/><br/>
            	<input type="submit" name='sub' value="添加" />
            </form>
            

