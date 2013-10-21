<?php 
$GetYear=isset($_GET["year"])&&intval($_GET["year"])?intval($_GET["year"]):0;
$GetDirection=isset($_GET["direction"])?ereg_replace("\n|\b|\t|\v| ",NULL,$_GET["direction"]):0;
require_once("inc/dataCourse.php");
require_once("inc\controllers\getCourse.php");
require_once("./inc/dataInformation.php");
class CourseCenter extends CourseGroup{
function OutputCourse($Data){
  echo"<tr>";
  foreach($Data as $k=>$v){ 
  if(!($k%4)&&$k&&$k!=count($Data))
  echo "</tr><tr>";
  echo "<td>";
  echo $this->OutputOneCourse($v)."</td>" ;
  }
  echo "</tr>";
}
function getCourse(){
$Course=new dataCourse();
$Data=$Course->getAllCourse();
return $Data;
}

};
$CourseCenter=new CourseCenter();
$Data=$CourseCenter->getCourse();
if(!is_array($Data)){
  echo '无可显示课程，请管理员检查课程下可以显示字段';
  die();
}
$year=$CourseCenter->Group("year",$Data);
$direction=$CourseCenter->Group("direction",$Data);


?>
<?php 
include_once('.\recommend.php');
$index=new CenterIndex();
$CourseRcmd=array();
$TeacherRcmd=array();
$Picture=array();
$index->GetRcmd($CourseRcmd,$TeacherRcmd);
$Picture=$index->GetPicture();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="./style/head.css"/>
<link rel="stylesheet" href="./style/index1.css"  type="text/css"/>
<link rel="stylesheet" href="./style/foot.css" type="text/css" />
<link rel="stylesheet" href="./style/left_2.css"  type="text/css"/>

</head>

<body>
<div id="all">
	<div id="_top">
		<?php include_once('.\globals\head.php'); ?>
	</div>
    <div id="centre">
    	<div id="position">
            <table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="">首页</a></span></td></tr>
            </table>	
        </div>
        <div id="navigation">
        	<?php include_once('.\globals\left_2.php'); ?>
        </div>
        <div id="content0">
        	<table id="course_list" align="center" width="80%">
				<tr align="center"><th colspan="4">课程列表</th></tr>
                	<?php 
                      if(!$GetDirection&&!$GetYear)
                        $CourseCenter->OutputCourse($Data);
                      elseif($GetDirection&&!$GetYear)
                        $CourseCenter->OutputCourse($direction[$GetDirection]);
                      elseif(!$GetDirection&&$GetYear)
                        $CourseCenter->OutputCourse($year[$GetYear]);

                      ?> 
                
            </table>
        </div>
         <div id="teacher_list">
         </div>
    </div>
    <div id="_foot">
    	<?php include_once('.\globals\foot.php'); ?>
    </div>
</div>
</body>
</html>
