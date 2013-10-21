<?php
include_once("MyDB.php");
define("CENTER_NOTICE",1);
define("INTRODUCTION",2);
define("TEACHERS",3);
define("NOTICE",4);
define("ARRANGEMENT",5);
define("RESOURCE",6);

class dataInformation extends MyDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('information');
    }
    function SelectBySettime($Pkey){		
		$settime=$Pkey;
		if(!$settime){
		  return -1;
		}
		
		$sql = "select * from `information` where `settime` = {$settime}";
		$data=self::$db->getRows($sql);
		return $data;
    }
	function SelectByPKey($Pkey){		
		$id=intval($Pkey);
		if(!$id){
		  return -1;
		}
		
		$sql = "select * from `information` where `id` = {$id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
    function SelectByType($type){
      $type=intval($type);
      if(!$type){
		  return -1;
		  } 
		  $sql = "select * from `information` where `type` = {$type} order by `settime` desc";
		  $data=self::$db->getRows($sql);
	  	return $data;
    }
	function SelectByCourseid($course_id){		
	    ;
		$course_id=intval($course_id);
		if(!$course_id){
		  return -1;
		}
		
		$sql = "select * from `information` where `course_id` = {$course_id}";
		$data=self::$db->getRows($sql);
		return $data;
    }
	function SelectByIdType($course_id,$type){		
		$course_id=intval($course_id);
		if(!$course_id){
		  return -1;
		}
		$type=intval($type);
		if(!$type){
		  return -1;
		}
		
		$sql = "select * from `information` where `course_id` = {$course_id} and `type` = {$type} order by `settime` desc";
		$data=self::$db->getRows($sql);
		return $data;
    }
	/*function SelectByDirection($direction){		
	    ;
		$direction=$direction;
		if(!$direction){
		  return -1;
		}
		
		$sql = "select * from `course` where `direction` = {$direction}";
		$data=self::$db->getRows($sql);
		return $data;
    }*/
    function DeleteByPkey($Pkey){
		$id=intval($Pkey);
		if(!$id){
		  return -1;
		}
		
		$sql = "delete  from `information` where `id` = {$id} limit 1";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
	function DeleteByCourseid($Pkey){
		$course_id=intval($Pkey);
		if(!$course_id){
		  return -1;
		}
		
		$sql = "delete * from `information` where `course_id` = {$course_id} limit 1";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
    function UpdateByPkey($Pkey,$values){
      $res=$this->Check($values);
    if($res){
      $res=self::$db->update('information','id='.$Pkey,$values);
      return $res;
	  }
    else return $res;
    
    }
	
    
    function InsertByPkey($values){
		
    $res=$this->Check($values);
    if($res){
		$res = self::$db->insert('information',$values);		
    return $res;
		}
    else return $res;
		  return 0;
    }
    function Check(& $values){
    if(empty($values['title'])) 
      return "title is null";
    switch (intval($values['type'])){
    case 1:
      break;
    case 2:
      break;
    case 3:
      break;
    case 4:
      break;
    case 5:
      break;
    case 6:
      break;
    case 7:
      $i=intval($values['promulgator']);
      if($i>5||$i<1)
        return "picture should be 1-4";
    //  if(!preg_match('/^http:\/\/([\w-]+(\.[\w-]+)+(\/[\w-.\/\?%&=\x{4e00}-\x{9fa5}]*)?)?$/',$values['link']))
     //   return "link is not an inertnet";
        break;
        
     default:
       return "type error";
    }
    $values['settime']=date("y-m-d h:i:s",time());
	  return 1;
    }
    function getAll(){
		$sql = "select * from `information` ";
    $res =self::$db->getRows($sql);	
    if(!$res){ return false;
    }
    else return $res;
    }
    function ExceptionHandle(Exception $e ){
    }
}
?>
