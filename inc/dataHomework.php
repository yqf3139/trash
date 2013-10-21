<?php
include_once("MyDB.php");
class dataHomework extends MyDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('homework');
    }
    function SelectBySettimeandStudent_id($Pkey1,$Pkey2){		
		$settime=intval($Pkey1);
		if(!$id){
		  return -1;
		}
		$student_id=intval($Pkey2);
		if(!$id){
		  return -1;
		}
		$sql = "select * from `homework` where where `settime` = {$settime} and `student_id` = {$student_id}";
		$data=self::$db->getRow($sql);
		return $data;
  }
  function SelectByHomework($id){		
		$sql = "select file,score,H.settime,H.readtime,name,S.student_id,S2.deadline from homework H,student S,sethomework S2 where H.student_id=S.student_id and H.id = {$id} and S2.id=H.id ";
		$data=self::$db->getRows($sql);
		return $data;
    }
	function SelectByStudent($student_id){		
		$sql = "select * from `homework` where `student_id` = {$student_id} order by num";
		$data=self::$db->getRows($sql);
		return $data;
    }
	 function SelectByPkey($Pkey){		
		$sql = "select * from `homework` where `id` = {$Pkey['id']} and `student_id`={$Pkey['student_id']} limit 1";
		$data=self::$db->getRow($sql);
		return $data;
    }
   function DeleteByPkey($Pkey1){
		$settime=intval($Pkey1);
		if(!$id){
		  return -1;
		}
		$student_id=intval($Pkey2);
		if(!$id){
		  return -1;
		}
		$sql = "delete * from `homework` where `settime` = {$settime} and `student_id` = {$student_id} limit 1";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
	function DeleteByClassid($Pkey){
		$class_id=intval($Pkey);
		$sql = "delete * from `homework` where `class_id` = {$class_id} limit 1";
		$res = self::$db->query($sql);
		
		if($res){
		  return -2;
		}
		
		
		  return 0;
    }
    function UpdateByPkey($Pkey,$values){
		if($this->Check($values)){
      var_dump($Pkey);
      var_dump($values);
      $res=self::$db->update('homework',"id={$Pkey['id']} and student_id={$Pkey['student_id']}",$values);
	  }
    }
	
    
    function InsertByPkey($values){
		
		if($this->Check($values)){
		$res = self::$db->insert('homework',$values);		
    return $res;
		}
		
		  return 0;
    }
    function Check(& $values){
      if($_SESSION['type']==2)
       $values['readtime']=date("y-m-d h:i:s",time());
    else $values['settime']=date("y-m-d h:i:s",time());
	  return 1;
    }
    function getAll($condition=NULL){
		$sql = "select * from `homework` ";
    if(!is_null($sql))$sql.=$condition;
    $res =self::$db->getRows($sql);	
    if(!$res){ return false;
    }
    else return $res;
    }
    function ExceptionHandle(Exception $e ){
    }
}
?>
