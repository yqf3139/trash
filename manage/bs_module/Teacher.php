<?php 
include_once('../../inc/dataRecommend.php');
$db=new dataRecommend;
$data=$db->getTeachers();
?>
<script type="text/javascript" language="javascript">
function disappear()
{
	//alert("hehe");
	fa.removeChild(w);
	isload=false;
}
var fa;
var w;
var isload=false;
function alter(num)
{
	
	window.location.href="./bs_Pic_change.php?id="+num;
}
</script>
    <h4>老师介绍<span style="color:red">（首页“的教学名师”板块，人数限定为9个人，只能修改，不能添加删除）</span></h4>

        	<table>
            	<tbody>
                	<?php foreach($data as $k=>$v){ if($k>8)break; ?>
                    <tr><td><?php echo $v['name']? $v['name']:"未上传";?></td><td><input type="button" value="修改" onclick='alter(<?php echo $v['teacher_id'];?>)'/></td></tr>
                    <?php }?>
                  
                </tbody>
            </table>
