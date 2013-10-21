<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
  include_once('./form.php');
  $administrator=new form('administrator');
  $administrator->Authority('ADMIN');  
  $administrator->add();
  $administrator->jumpBack("../manage/user_manage/managers_manage.php");
  die();
?>
