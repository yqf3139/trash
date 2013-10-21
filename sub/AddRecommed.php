<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once('form.php');
$form=new form('recommend');
$form->Authority('ADMIN');
if(isset($_POST['sub'])){
  if( isset($_POST['name']) ){
    include_once('../inc/dataRecommend.php');
    include_once('../inc/dataCourse.php');
    $DbRcmd=new dataRecommend;
    $DbCourse=new dataCourse;
    $error_msg="";
      $name=trim($_POST['name']);
      if(empty($name)){
       echo "fails 1"; 
       die();
      }
      $data=$DbCourse->SelectByName($name);
      if(!$data){
        echo "<script>alert('课程名不存在');history.back(-1);</script>";
        die();
      }
     // var_dump($data);
      $RcmdCoure['course_id']=$data['course_id'];
      $DbRcmd->InsertByPKey($RcmdCoure);
      $form->jumpBack("../manage/backstage/bs_Re_Cou.php"); 
  }
  else if(is_array($_POST['course_id'])){
    include_once('../inc/dataRecommend.php');
    $DbRcmd=new dataRecommend;
    foreach($_POST['course_id'] as $k=>$v){
      if(intval($v))
      $CourseId[]['course_id']=intval($v);
    }
   // var_dump(($_POST['course_id']));
    if(empty($CourseId)){
      echo "your input is empty";
      die();
    }
  //  var_dump($CourseId);
    foreach($CourseId as $v)
    $DbRcmd->InsertByPKey($v);
    $form->jumpBack("../manage/backstage/bs_Re_Cou.php"); 
  }
  else{
    include_once('form.php');
    //var_dump($_POST);
    if(intval($_POST['old_teacher_id'])){
      $values['teacher_id']=intval($_POST['teacher_id']);
      if($values['teacher_id']){
      $recommend=new dataRecommend;
      $recommend->UpdateByTeacher($_POST['old_teacher_id'],$values);
      }
    }
    else{
    $recommend=new form('recommend');
    $recommend->add();
    }
    $form->jumpBack('../manage/backstage/bs_Tea.php');
  }
  die();
}
else {
  echo "access failed";
}

?>
