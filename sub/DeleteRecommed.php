<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once('form.php');
$form=new form('recommend');
$form->Authority('ADMIN');
include_once('../inc/dataRecommend.php');
$db=new dataRecommend();
$error_msg="";
if(isset($_POST['sub'])){
     $id=$_POST['id'];
     if(empty($id)){
       echo "fail";
       die();
     }
     if($db->DeleteByPkey($id)){
     header("Location: ../manage/backstage/bs_Re_Cou.php"); 
      echo "sucess";
     }
     else echo "fail";
     die();
}
else {
  echo "非法访问";
}
?>
