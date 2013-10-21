<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
include_once './form.php';
$form=new form('courseselection');
$form->Authority('ADMIN');
var_dump($_POST);
if(!isset($_POST['sub']))
  die();
if(!isset($_POST['id'])||!trim($_POST['id']))
  die();
$db=new dataCourseSelection;
$student=explode(',',trim($_POST['id']));
foreach($student as $v)
  $res=$db->DeleteByPkey($v);
echo $res;


?>

