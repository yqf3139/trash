 <?php
 
include_once('inc/controllers/getCourse.php'); 
include_once('inc/dataCourse.php'); 
include_once('inc/dataRecommend.php');
include_once('inc/dataTeacher.php');
include_once('inc/dataInformation.php');
class CenterIndex extends CourseGroup{

 private $mDbCourse;
 private $mDbRcmd;
 private $mDbTeacher;
 private $mDbInfor;

function __CONSTRUCT(){ 
  
  $this->mDbCourse= new dataCourse();
  $this->mDbRcmd= new dataRecommend();
  $this->mDbTeacher=new dataTeacher();
  $this->mDbInfor=new dataInformation();
}
function GetRcmd(array & $CourseRcmd,array & $TeacherRcmd){
 $RcmdData=$this->mDbRcmd->GetAll();
if($RcmdData)
foreach($RcmdData as $k=>$v){
  $data=array();
  $CourseRcmd=$this->mDbRcmd->getCourse();
  $TeacherRcmd=$this->mDbRcmd->getTeachers();
}
  else
  echo "无推荐课程，及教师";
}
function GetPicture(){
$PictureData=$this->mDbInfor->SelectByType(7);
if(!$PictureData){
  echo "can't find picture";
  die();
}
//var_dump($PictureData);
return $PictureData;
}
}
//var_dump($CourseRcmd);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
