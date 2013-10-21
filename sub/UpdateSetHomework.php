<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once('form.php');
class SetHomework extends form{
 function __construct(){
   parent::__construct('sethomework');
  }
 function getdata(){
   $data=parent::getdata();
   $this->target.=$data['class_id'].'/';
   if( parent::getfile($this->target,true)){
     $data['link']=$this->target;
   }
   return $data;
 }
 private $target='../file/Homework/';
 
}
$db=new SetHomework;
$db->Authority('TEACHER');
$db->update();
$db->jumpBack("../teacher/teacher_homework_add.php");
 ?>
