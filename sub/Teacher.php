<?php
include_once('form.php');
class Teacher extends form{
  function __construct(){
    parent::__construct('teacher');
  }
  function getdata(){
     $data=parent::getdata();
    if(!isset($data['available']))
        $data['available']=0;
    if(isset($_FILES['picture'])&&$_FILES['picture']['size']>0){
    if($_FILES['picture']['error']){
        $this->ErrorMsg= "upload error".$_FILES['picture']['error'];
        die();
    }
    $ArrType=explode('/',$_FILES['picture']['type']);
    if($ArrType[0]!='image'){
      $this->ErrorMsg= "upload file is not an image;";
    }
    $target=$this->GW_UPLOADPATH.$data['email'].'.'.$ArrType[1];
    var_dump( $target);
    move_uploaded_file($_FILES['picture']['tmp_name'],$target); 
    $data['picture']='../'.$target;
    }
    return $data;

  }
private $GW_UPLOADPATH='../img/teacher/';
private $PictureName='';
};
?>
