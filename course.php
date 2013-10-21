<?php 
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


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="./style/head.css"/>
<link rel="stylesheet" href="./style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="./style/left_2.css"  type="text/css"/>
<link rel="stylesheet" href="./style/course.css"  type="text/css"/>
</head>

<body>
<div class="_all">
	<?php include_once('./globals/head.php'); ?>
    <div class="_body">
    	<div class="_body_top">
        	<div class="_block" style="height:5px; width:100%"></div>
            <div style="width:3%;"></div>
        	<div style="width:97%;	margin:0 auto;"><span>您现在的位置：</span><span><a href="/ProjectTest/index.php">首页</a>--></span><span><a href="/ProjectTest/course.php">课程列表</a></span></div>
        </div>
        <?php include_once('./globals/left_2.php'); ?>
        <div class="_right"> 
        	<div class="_course_title">
            <h1>课程列表
                  <?php echo $GetDirection?"({$GetDirection})":NULL;
                      echo $GetYear? ($GetYear==1? "(研究生)":"(博士)") :NULL;?></h1>
                <table id="_course_list">
                	<tbody >
                   		<?php 
                      if(!$GetDirection&&!$GetYear)
                        $CourseCenter->OutputCourse($Data);
                      elseif($GetDirection&&!$GetYear)
                        $CourseCenter->OutputCourse($direction[$GetDirection]);
                      elseif(!$GetDirection&&$GetYear)
                        $CourseCenter->OutputCourse($year[$GetYear]);

                      ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include_once('./globals/foot.php'); ?>
</div>
</body>
</html>
