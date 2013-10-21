<?php
include_once("MyDB.php");
include_once("dataClass.php");
include_once("dataStudent.php");
class dataCourseSelection extends MyDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('courseselection');
    }
	function SelectByPKey($Pkey){		
		$id=intval($Pkey);
		if(!$id){
		  return -1;
		}
		
		$sql = "select * from `courseselection` where `courseselection_id` = {$id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
    function SelectByClass($class_id){
      $class_id=intval($class_id);
      if(!$class_id){
		  return -1;
		  } 
		  $sql = "select * from student S,courseselection C where C.class_id={$class_id} and C.student_id=S.student_id";
		  $data=self::$db->getRows($sql);
	  	return $data;
    }
	  function SelectByStudent($student_id){		
		$student_id=intval($student_id);
		if(!$student_id){
		  return -1;
		}
		$sql = "select * from student S,courseselection C where `student_id` = {$student_id}";
		$data=self::$db->getRows($sql);
		return $data;
    }
    function Select($values){
       $IsEmpty=true;
		  $sql = "select * from courseselection C1,class C2  where C1.class_id=C2.class_id and ";
      foreach($values as $k=>$v){
        $part[]=$k.'='.$v;
      }
      $sql.=join(' and ',$part);
      $sql.=" limit 1";
      $data=self::$db->getRow($sql); 
      return $data;
    }
    function DeleteByPkey($Pkey){
		$class_id=intval($Pkey);
		if($class_id){
		$sql = "delete  from `courseselection` where `courseselection_id` = {$class_id} limit 1";
		$res = self::$db->query($sql);
    return $res;
		}
    return -1;
		}
	function DeleteByClass($Pkey){
		$class_id=intval($Pkey);
    echo $class_id;
		if(!$class_id){
		  return -1;
		}
		$sql = "delete  from `courseselection` where `class_id` = {$class_id} limit 100";
		$res = self::$db->query($sql);
    return $res;
	 }
	function DeleteByStudent($Pkey){
		$student_id=intval($Pkey);
		if(!$student_id){
		  return -1;
		}
		$sql = "delete  from `courseselection` where `student_id` = {$student_id} limit 10";
		$res = self::$db->query($sql);
    return $res;
	    }
    function UpdateByPkey($Pkey,$values){
		}
	
    
    function InsertByPkey($values){
	  	
		if($this->Check($values)){
      $dbClass=new dataClass;
      $dbStudent=new dataStudent;
      $res1=$dbClass->SelectByPKey($values['class_id']);
      $res2=$dbStudent->SelectByPKey($values['student_id']);
      echo $res2;
      if(!empty($res1)&&!empty($res2)){
        $res=self::$db->insert('courseselection',$values);
        return $res;
      }
      return "班级不存在或学生不存在";
		}

    }
    function Check(& $values){
      $student_id=intval($values['student_id']);
      $class_id=intval($values['class_id']);
      if(empty($student_id)||empty($class_id) )
        return 0;
			else return 1;
    }
    function getAll(){
		$sql = "select * from `courseselection` ";
    $res =self::$db->getRows($sql);	
    if(!$res){ return false;
    }
    else return $res;
    }
    function ExceptionHandle(Exception $e ){
    }
}
?>
