<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include_once('../inc/dataStudent.php');
include_once('form.php');
$db=new form('student');
$db->Authority('STUDENT');
$student_id=isset($_POST['student_id'])&&!empty($_POST['student_id'])?intval($_POST['student_id']):NULL;
$pwd=isset($_POST['oldpassword'])&&!empty($_POST['oldpassword'])?trim($_POST['oldpassword']):NULL;

if(empty($pwd)){
  echo "<script>alert('旧密码为空');history.back();</script>";
  die();
}
$StudentDB=new dataStudent;
if(!$StudentDB->CheckPassword($student_id,$pwd)){
  echo "<script>alert('旧密码错误');history.back();</script>";
  die();
}
var_dump($_POST);
$db->update();
$db->jumpback("../student/");

?>
