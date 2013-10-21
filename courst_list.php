<?


$GetYear=isset($_GET["year"])&&intval($_GET["year"])?intval($_GET["year"]):0;
$GetDirection=isset($_GET["direction"])?ereg_replace("\n|\b|\t|\v| ",NULL,$_GET["direction"]):0;
require_once("inc/dataCourse.php");
require_once("inc/controllers/getCourse.php");
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
$year=$CourseCenter->Group("year",$Data);
$direction=$CourseCenter->Group("direction",$Data);
echo '<table id="course_list" align="center" width="80%">';
echo	'<tr align="center"><th colspan="4">课程列表</th></tr>';
if(!$GetDirection&&!$GetYear)
$CourseCenter->OutputCourse($Data);
elseif($GetDirection&&!$GetYear)
$CourseCenter->OutputCourse($direction[$GetDirection]);
elseif(!$GetDirection&&$GetYear)
$CourseCenter->OutputCourse($year[$GetYear]);
echo '</table>';

/*
echo '<table id="course_list" align="center" width="80%">';
echo	'<tr align="center"><th colspan="3">课程列表</th></tr>';
echo    '<tr align="center"><td><a href="#">dasfds</a></td><td><a href="#">dasfds</a></td><td><a href="#">dasfds</a></td></tr>' ;
echo    '<tr align="center"><td><a href="#">dasfds</a></td><td><a href="#">dasfds</a></td><td><a href="#">dasfds</a></td></tr>' ;  
echo    '<tr align="center"><td><a href="#">dasfds</a></td><td><a href="#">dasfds</a></td><td><a href="#">dasfds</a></td></tr>' ;    
echo '</table>';
*/
?>