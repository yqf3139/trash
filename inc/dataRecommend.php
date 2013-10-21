<?php
include_once("MyDB.php");
include_once('dataTeacher.php');
include_once('dataCourse.php');
class dataRecommend extends MyDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('recommend');
    }
     function Check(& $values){
		$course_id=$values['course_id'];
		$teacher_id=$values['teacher_id'];
    if($course_id&&!$teacher_id)
    	return 1;
    elseif(!$course_id&&$teacher_id)
      return 2;
    else
      return 0;
    }
    function SelectByPKey($Pkey){		
		$id=intval($Pkey);
		if(!$id){
		  return -1;
		}
		
		$sql = "select * from `recommend` where `id` = {$id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
    function DeleteByPkey($Pkey){
		$id=intval($Pkey);
		if(!$id){
		  return -1;
		}
    
		$sql = "delete from `recommend` where `id` = {$id} limit 1";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
    function UpdateByPkey($Pkey,$values){
    }
    function UpdateByTeacher($teacher_id,$values){
      $res=self::$db->update('recommend','teacher_id='.$teacher_id,$values);
      return $res;
    }
    function InsertByPkey($values){
	  $type=self::Check($values);	
    if($type){
    echo $type;
      $db=$type==1?new dataCourse:new dataTeacher;
      $res=$db->SelectByPKey($type==1? $values['course_id']:$values['teacher_id']);
      if($res){
        if(!$res['available']){
          echo "available is not true";
          die();
        }
		        $res = self::$db->insert('recommend',$values);		
            return $res;
      }
		  
		}
    return $type;
		}
    function getAll(){
		$sql = "select * from `recommend` ";
    $res =self::$db->getRows($sql);	
    if(!$res){ return false;
    }
    else return $res;
    }
    function getTeachers(){
      $res=self::$db->getRows('select S.id,T.teacher_id,name,picture from teacher T,recommend S where T.teacher_id=S.teacher_id ');
      return $res;
    }
    function getCourse(){
      $res=self::$db->getRows('select S.id,C.course_id,name,link from course C,recommend S where C.course_id=S.course_id ');
      return $res;
    }
    function ExceptionHandle(Exception $e ){
    }
}
?>
