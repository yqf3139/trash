<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once('../inc/dataInformation.php');
$DbInfor=new dataInformation();
$GW_UPLOADPATH='../img/index/';
$PictureName='';
$res="";
if(isset($_POST['sub'])){
    $id=intval($_POST['id']);
    //link 需要进行正则匹配，以后再写
    $link=trim($_POST['link']);
    $title=trim($_POST['title']);
    if(!$id||!$link||!$title){
      echo "input empty";
      die();
    }
    else if($_FILES['picture']['error']){
        echo "upload error".$_FILES['picture']['error'];
        die();
    }
    $ArrType=explode('/',$_FILES['picture']['type']);
    if($ArrType[0]!='image'){
      echo "upload file is not an image;";
    }
      $target=$GW_UPLOADPATH.$id.'.'.$ArrType[1];
      move_uploaded_file($_FILES['picture']['tmp_name'],$target); 
      $dataPicture=$DbInfor->SelectByType(7);
      $value['title']=$title;
      $value['description']=substr($target,1);
      $value['link']=$link;
      $value['type']=7;
      if($dataPicture[$id]['id']){
      $value['promulgator']=intval($dataPicture[$id-1]['promulgator']);
      $value['id']=intval($dataPicture[$id-1]['id']);
      $res=$DbInfor->UpdateByPkey($dataPicture[$id-1]['id'],$value);
    }
    else{
      $value['promulgator']=count($dataPicture)+1;
      $res=$DbInfor->InsertByPkey($value);
    }
    if($res) 
      header("Location: ../manage/backstage/bs_Pic.php");
    else echo "Modify error";
 }
die();
?>
