<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
include '../inc/dataHomework.php';
include 'form.php';
$form=new form('homework');
$Type=array();
$Type[]='TEACHER';
$Type[]='STUDENT';
$form->Authority($Type);
if(!isset($_POST['sub'])){
  echo "access fail";
  die();
}
if(isset($_POST['student_id'])&&is_array($_POST['student_id'])&&isset($_POST['score'])&&is_array($_POST['score'])&&count($_POST['student_id'])==count($_POST['score'])){
  $db=new dataHomework;
  foreach($_POST['student_id'] as $k=>$v)
    if(intval($v)&&intval($_POST['score'][$k])){
      $Pkey['student_id']=intval($v);
      $Pkey['id']=intval($_POST['homework_id']);
      $Score['score']=$_POST['score'][$k];
      $db->updatebyPkey($Pkey,$Score);
    }
}
else{
  echo "data error";
  die();
}
$form->jumpBack('../teacher/teacher_homework.php');
?>
