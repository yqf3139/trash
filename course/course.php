<?php 
include_once(dirname(__FILE__)."/../inc/dataCourse.php");
include_once(dirname(__FILE__)."/../inc/dataInformation.php");
include_once(dirname(__FILE__)."/../inc/dataClass.php");
include_once(dirname(__FILE__)."/../inc/dataTeacher.php");
include_once(dirname(__FILE__)."/../login.php");
class Course{
function __construct(){

$id=isset($_GET["id"])&&intval($_GET["id"])?intval($_GET["id"]):0;
if(!$id){
  echo 'error';
  die();
}
$Course=new dataCourse();
$this->id=$id;
$Data=$Course->SelectByPKey($id);
$Information=new dataInformation;

if(!$Data){	
  echo "没有该课程";
  die();
}
$login=new loginClass;
$type=$login->loginState();

if(!$Data['available']&&$type>2){
  echo "该课程暂时不开放,请联系管理员";
  die();
}
$this->name=$Data['name'];
$this->db=new dataInformation;
}
function __get($name){
  return $this->$name;
  
}
function GetInformation($name){
  if($name=='INTRODUCTION'){
    $course= new dataCourse;
    return $course->SelectByPKey($this->id);
  }
  else if($name=='TEACHERS'){
    $class=new dataClass;
    $Teachers=$class->SelectByCourse($this->id);
    return $Teachers;
    
  }
  else{
	
    $data= $this->db->SelectByIdType($this->id,constant($name));
    return $data;
  }
}

private $id;
private $name;
private $db;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
