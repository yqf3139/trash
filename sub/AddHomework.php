<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once('form.php');
class Homework extends form{
 function __construct(){
   parent::__construct('homework');
  }
 function getdata(){
   $data=parent::getdata();
   if(isset($data['score']))unset($data['score']);
   $this->target.=$_POST['class_id'].'/'.$data['id'].'/';
   if(! file_exists($this->target)){
     echo "该作业不存在";
     die();
   }
   if( parent::getfile($this->target)){
     $data['file']=$this->target;
   }
   echo $this->target;
   //var_dump($data);
   //var_dump($_POST);
   return $data;
 }
 function update(){
    $attribute=$this->getdata();
    $Pkey['student_id']=$attribute['student_id'];
    $Pkey['id']=$attribute['id'];
    if($this->db->UpdateByPKey($Pkey,$attribute)!=1){
     $this->ErrorMsg="update fail";
    }

 }
 function operate(){
   if(isset($_POST['student_id'])&&intval($_POST['student_id']))
     $Pkey['student_id']=intval($_POST['student_id']);
   if(isset($_POST['id'])&&intval($_POST['id']))
     $Pkey['id']=intval($_POST['id']);
   $res=$this->db->SelectByPkey($Pkey);
   if(empty($res))
     $this->add();
   else
     $this->update();
 }
 private $target='../file/Homework/';
 
}
$db=new Homework;
$Type='STUDENT';
$db->authority($Type);
$db->operate();
$db->jumpBack("../student/");
 ?>
