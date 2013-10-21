<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
  include_once('./form.php');
  $info=new form('course');
  $Type=Array();
  $Type[]='ADMIN';
  $Type[]='TEACHER';
  $type=$info->Authority($Type);
  $info->update();
  if($type==constant('ADMIN'))
  $info->jumpBack("../manage/course_manage/course_alter_delete.php");
  else
  $info->jumpBack();
?>
