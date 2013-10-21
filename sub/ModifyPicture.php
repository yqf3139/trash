<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once('form.php');

class Picture extends form{
  function __construct(){
    parent:: __construct('information');
  }
  function getdata(){
    $value=parent::getdata();
    var_dump($_FILES);
    if($_FILES['picture']['error']){
        $this->ErrorMsg= "upload error".$_FILES['picture']['error'];
        die();
    }
    $ArrType=explode('/',$_FILES['picture']['type']);
    if($ArrType[0]!='image'){
      $this->ErrorMsg= "upload file is not an image;";
    }
      $target=$this->GW_UPLOADPATH.$value['id'].'.'.$ArrType[1];
      move_uploaded_file($_FILES['picture']['tmp_name'],$target); 
      $value['description']=substr($target,1);
      $value['type']=7;
      $value['promulgator']=$value['id'];
	  var_dump($value);
      unset($value['id']);
      return $value;

     
   }
  public function store(){
    $value=$this->getdata();
    $all=$this->db->SelectByType(7);
    $isExist=false;
    if($all)
      foreach($all as $v){
        if($v['promulgator']==$value['promulgator']){
          $this->ErrorMsg=$this->db->UpdateByPkey($v['id'],$value);
          $isExist=true;
        }
      }
    if(!$isExist)
      $this->ErrorMsg=$this->db->InsertByPkey($value);

    if(intval($this->ErrorMsg)==1) 
    header("Location: ../manage/backstage/bs_Pic.php");
    else
      echo $this->ErrorMsg;
    die();
    
  }
  
private $GW_UPLOADPATH='../img/index/';
private $PictureName='';
};

$picture=new Picture();
$picture->Authority('ADMIN');
$picture->store();
$picture->jumpBack();
?>
