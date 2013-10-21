<?php
include "../student/class.php";
include "./zip.php";
class Teacher extends classr{
function __construct(){
		parent::__construct('TEACHER');
}
function HandinHomework($IsSubmit=false){
    $db=new dataHomework;
    $data=$db->SelectByHomework($this->id['homework_id']);
    if($IsSubmit)
      return $data;
    $db=new dataCourseSelection;
    $data2=$db->SelectByClass($this->id['class_id']);
    /*
    if(is_array($date))
    foreach($data2 as $v){
      if($v['student_id']!=$data[0]['student_id'])
        $data[]=$v;
    }
     */
    $result=Array();
    if(is_array($data2))
      foreach ($data2 as $v)
        $result[$v['student_id']]=$v; 
     if(is_array($data))
      foreach ($data as $v)
        $result[$v['student_id']]=$v; 
       
    return  $result;
  }
  function download(){
    $path="../file/Homework/{$this->id['class_id']}/{$this->id['homework_id']}";
    $zip=new PHPzip();
    $zip->ZipAndDownload($path);
	echo "无内容";

  }
  
};
  ?>
