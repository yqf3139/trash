<?php
include_once("MyDB.php");
include_once("dataTeacher.php");
include_once("dataCourse.php");
class dataClass extends MyDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('class');
    }
  function Select($values){
       $IsEmpty=true;
		  $sql = "select * from class  where ";
      foreach($this->ATTRIBUTES as $k=>$v){
        if(isset($values[$k])){
        if($v=='string')$values[$k]="'{$values[$k]}'";
        $part[]="`$k`={$values[$k]}";
        $IsEmpty=false;
        }
      }
      $sql.=join('and',$part);
      echo $sql;
      $data=self::$db->getRows($sql); 
      return $data;
    }

	function SelectByPKey($Pkey){		
		$class_id=intval($Pkey);
		if(!$class_id){
		  return -1;
		}
		$sql = "select * from `class` where `class_id` = {$class_id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
    function SelectByCourse($Pkey){
      $course_id=intval($Pkey);
      if(!$course_id){
		  return -1;
		  } 
		  $sql = "select * from class C,teacher T where C.course_id = {$course_id} and C.teacher_id=T.teacher_id";
		  $data=self::$db->getRows($sql);
	  	return $data;
    }
	function SelectByTeacher($teacher_id){		
		$teacher_id=intval($teacher_id);
		if(!$teacher_id){
		  return -1;
		}
		
		$sql = "select * from `class` where `teacher_id` = {$teacher_id}";
		$data=self::$db->getRows($sql);
		return $data;
    }
    function SelectByCourseTeacher($values){
    $teacher_id=intval($values['teacher_id']);
    $course_id=intval($values['course_id']);
		if(!$teacher_id||!$course_id){
		  return -1;
		}
		$sql = "select * from `class` where `course_id` = {$course_id} and `teacher_id`={$teacher_id}";
		$data=self::$db->getRow($sql);
		return $data;


    }
    
    function DeleteByPkey($Pkey){
		$class_id=intval($Pkey);
		if(!$class_id){
		  return -1;
		}
		
		$sql = "delete * from `class` where `class_id` = {$class_id} limit 1";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
	function DeleteByCourse($Pkey){
		$course_id=intval($Pkey);
		if(!$course_id){
		  return -1;
		}
		$sql = "delete  from `class` where `course_id` = {$course_id} limit 10";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
	function DeleteByTeacherid($Pkey){
		$teacher_id=intval($Pkey);
		if(!$teacher_id){
		  return -1;
		}
		
		$sql = "delete * from `class` where `teacher_id` = {$teacher_id} limit 1";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
    function UpdateByPkey($Pkey,$values){
		;
		$id=intval($Pkey);
		if(!$id){
		  
		  return -1;
		}
		if($this->Check($values)){
		$sql = "update `class` set `course_id`={$values['course_id']},`teacher_id`={$values['teacher_id']} limit 1";
    echo $sql;
		$res = self::$db->query($sql);
		if($res){
		  
		  return -2;
		}
		}
		
		  return 0;
    }
	
    
    function InsertByPkey($values){
	  	
		if($this->Check($values)){
        $res=self::$db->insert('class',$values,true,$condition);
        if($res)
        parent::makedir('../file/Homework/'.$res);
        return $res;
		}
    }
    function Check(& $values){
      $course_id=intval($values['course_id']);
      $teacher_id=intval($values['teacher_id']);
      if(empty($course_id)||empty($teacher_id) )
        return 0;
			else return 1;
    }
    function getAll(){
		$sql = "select * from `class` ";
    $res =self::$db->getRows($sql);	
    if(!$res){
      return false;
    }
    else return $res;
    }
    function ExceptionHandle(Exception $e ){
    }
}
?>
