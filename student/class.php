<?php 
include_once("../inc/dataCourse.php");
include_once("../inc/dataClass.php");
include_once("../inc/dataTeacher.php");
include_once("../inc/dataSetHomework.php");
include_once("../inc/dataCourseSelection.php");
include_once("../inc/dataHomework.php");
include_once('../login.php');
class Classr{
function __construct($identity){
  $login=new loginClass;
  $values['course_id']=intval($_GET['id']);
  $this->id['course_id']=$values['course_id'];
  if(strtoupper($identity)=="STUDENT"){
  $login->authority(constant('STUDENT'));
  $values['student_id']=$_SESSION['name'];
  $this->id['user_id']=$values['student_id'];
  $dbCourseSelection=new dataCourseSelection;
  //var_dump($values);
  $Data=$dbCourseSelection->Select($values);
  }
  else if(strtoupper($identity)=="TEACHER"){
  $login->authority(constant('TEACHER'));
  $dbTeacher=new dataTeacher;
  $teacher=$dbTeacher->SelectByPkey($_SESSION['name']);
  $this->id['teacher_id']=$teacher['teacher_id'];
  $values['teacher_id']=$teacher['teacher_id'];
  $dbClass=new dataClass;
  $Data=$dbClass->SelectByCourseTeacher($values);
  }
  //var_dump($values);
  //var_dump($Data);
  if(!$Data){
    echo "您未选取该课程";
    die();
  }
  $this->id['class_id']=$Data['class_id'];
  if(isset($_GET['homework_id'])&&intval($_GET['homework_id'])){
    $this->id['homework_id']=intval($_GET['homework_id']);
  }
  $this->db=new dataSetHomework;
}
function __get($name){
  return $this->$name;
  
}
function OutputId($setHomeworkId=false){
  echo 'id='.$this->id['course_id'].'&class_id='.$this->id['class_id'];
  if($setHomeworkId)
    echo '&homework_id='.$this->id['homework_id'];
}
function GetAllHomework(){
  $res=$this->db->SelectByClass($this->id['class_id']);
  return $res;
 }
function GetHomework($homework_id){
  $db=new dataHomework;
  $Pkey['id']=intval($homework_id);
  $Pkey['student_id']=$this->id['user_id'];
  $res=$db->SelectByPkey($Pkey);
  return $res;
}
function GetSetHomework($homework_id){
  $db=new dataSetHomework;
  $res=$this->db->SelectByPkey($homework_id);
  return $res;
}
function getUserInfo(){
	$db=new dataStudent;
	$res=$db->SelectByPkey($this->id['user_id']);
	return $res;
}

private $id;
private $db;
}

?>
