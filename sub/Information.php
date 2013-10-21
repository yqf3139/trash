<?php 
include_once('form.php');
class Info extends form{
  function __construct(){
    parent::__construct('information');
  }
  function getfile(& $target){
    if(isset($_FILES['file'])&&$_FILES['file']['size']>0){
      if($_FILES['file']['error']){
          $this->ErrorMsg= "upload error".$_FILES['file']['error'];
          echo $this->ErrorMsg;
          
          return false;
      }
      $target_move=$target.iconv('utf-8','gb2312',$_FILES["file"]["name"]);
      move_uploaded_file($_FILES['file']['tmp_name'],$target_move);
      $target.=$_FILES["file"]["name"];
      return true;
    }
    else return false;
  }
   function getdata($type){
     echo "<br>";
     var_dump($_POST);
     echo "<br>";
     $data=parent:: getdata();
	
     // var_dump($data);
     switch(constant($type)){
     case constant("ARRANGEMENT"):
       $this->ArrangementData($data);
       break;
     case constant("CENTER_NOTICE"):
       $this->CenterNoticeData($data);
       break;
     default:
       $this->OtherData($data,$type);
     }
	      $data['type']=constant($type);   
    return $data;
    
  }
  function CenterNoticeData(& $Data){
    $Data['description']=stripslashes($Data['description']);	
    $target=$this->GW_UPLOADPATH.'center_notice/';
    if(self::getfile($target)){
      echo 1;
      $Data['link']=$target;
    }  
    

  }
  function ArrangementData(& $Data){
    /*
    var_dump($description);
    var_dump($ExpTime);
    var_dump($CourseTime);
     */
    var_dump($_POST);
    $description=is_array($_POST['Description'])?$_POST['Description']:NULL;
    $ExpTime=is_array($_POST['ExpTime'])?$_POST['ExpTime']:NULL;
    $CourseTime=is_array($_POST['CourseTime'])?$_POST['CourseTime']:NULL;
    if(!($description&&$ExpTime&&$CourseTime)){
      echo "error1";
      
    }
    if(!(count($description)==count($CourseTime)&&count($ExpTime)==count($CourseTime))){
      echo "error2";
      
    }
    foreach($description as $k=>$v){
      $Data['description'].=$v.'||'.$CourseTime[$k].'||'.$ExpTime[$k].';;';
    }

  }
  function OtherData(& $data,$type){
	 //var_dump($data);
    $data['description']=stripslashes($data['description']);	
    $target=$this->GW_UPLOADPATH.$data['course_id'].'/'.strtolower($type).'/';
    //var_dump($target);
    if(self::getfile($target)){
      $data['link']=$target;
    }  

  }
  function add($type){
    $attribute=$this->getdata($type);
    $res=$this->db->InsertByPKey($attribute);
    if($res!=1){
     $this->ErrorMsg=$res;     
    }
  }
  function update($type){
    $attribute=$this->getdata($type);
//   var_dump($attribute);
    $res=$this->db->UpdateByPKey(current($attribute),$attribute);
	if($res!=1){
     $this->ErrorMsg=$res;        
    }
	
  }
private $GW_UPLOADPATH="../file/";
private $PictureName='';
}

?>
