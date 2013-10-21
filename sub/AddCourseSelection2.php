<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批量添加结果</title>
<button onclick="javascript:history.back(-1);">返回</button><br>
<?php 
//$handle = fopen ($_FILES['csvFile']['tmp_name'],"r");
include_once('../inc/dataCourseSelection.php');	
include_once('form.php');
$CourseSelection=new form('courseselection');
$CourseSelection->authority('ADMIN');
$student_id = array();
$lenth=9;
$i=0;
$ErrorMsg="";
if(isset($_POST['sub'])){
	if($_FILES['StudentSheet']['error']){
		$ErrorMsg="upload error".$_FILES['StudentSheet']['error'];
       	}
	if( $_FILES['StudentSheet']['type']!='application/vnd.ms-excel'){
		$ErrorMsg='type error';
	}
  $class_id=intval($_POST['class_id']);	
  if(empty($class_id)){
    echo '课程号不存在';
    die();
  }
	$handle = fopen ($_FILES['StudentSheet']['tmp_name'],"r");
  $db=new dataCourseSelection;
while ($data = fgetcsv($handle,1000,',')){
  $student_id=intval($data[0]);
 	if(empty($student_id)){
    echo $i." id is empty or not a number <br>";
	       	continue;
	}
	/*
  if(empty($data[1])){
    echo $i." name is empty or not a number <br>";
	continue;
  }
  */
  $Student['student_id']=$student_id;
  $Student['class_id']=$class_id;
  $res=$db->insertByPkey($Student);
	++$i;
	if($res!=1){
		echo " <span style='color:red;'> ".$i." 插入失败</span><br>";	       
	   }
	else{
		echo $i." 插入成功<br>";	
	}
	}
	
	echo $i;
}
else {
  echo "access failed";
}
?>
