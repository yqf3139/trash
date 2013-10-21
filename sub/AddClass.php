<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once('../inc/dataClass.php');
include_once('form.php');
$db=new dataClass;
$form=new form('class');
$form->Authority('ADMIN');
if(isset($_POST['sub'])){
  if(intval($_POST['course_id'])){
    $db->deletebycourse($_POST['course_id']);//$course_id
    if(is_array($_POST['teacher_id'])){
      $course_id=intval($_POST['course_id']);
      foreach($_POST['teacher_id'] as $k=>$v){
        $_POST['teacher_id'][$k]=intval($v);
        $value['teacher_id']=intval($v);
        $value['course_id']=$course_id;
        $data[]=$value;
      }
      if(empty($data)){
        echo "empty teacher";
        die();
      }
      foreach($data as $v){
        $db->insertbypkey($v);
      }
    }
  }
}
else{
  echo "access error";
  die();
}
$form->jumpBack();
die();
?>
