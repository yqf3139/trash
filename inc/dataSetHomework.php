<?php
include_once("MyDB.php");
class dataSetHomework extends MyDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('sethomework');
    }
    function SelectBySettime($Pkey){		
		
    }
    function SelectByPkey($Pkey)	{
		$sql = "select * from `sethomework` where `id` = {$Pkey} limit 1";
		$data=self::$db->getRow($sql);
		return $data;
    }
	function SelectByClass($Pkey){		
		$id=intval($Pkey);
		if(!$id){
		  return -1;
		}
		
		$sql = "select * from `sethomework` where `class_id` = {$id}";
		$data=self::$db->getRows($sql);
		return $data;
    }
	function SelectBySettimeandClass_id($Pkey1,$Pkey2){		
		$settime=intval($Pkey1);
		if(!$id){
		  return -1;
		}
		$class_id=intval($Pkey2);
		if(!$id){
		  return -1;
		}
		$sql = "select * from `sethomework` where where `settime` = {$settime} and `class_id` = {$class_id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
    function DeleteByPkey($Pkey){
		$id=intval($Pkey);
		if(!$id){
		  return -1;
		}
		$sql = "delete  from `sethomework` where `id` = {$id} limit 1";
		$res = self::$db->query($sql);
    return $res;
	  }
    function UpdateByPkey($Pkey,$values){
		if($this->Check($values)){
      $res=self::$db->update('sethomework','id='.$Pkey,$values,1);
	  }
    }
	
    
    function InsertByPkey($values){
		
		if($this->Check($values)){
		$res = self::$db->insert('sethomework',$values,true);		
    parent::makedir('../file/Homework/'.$values['class_id'].'/'.$res);
    return $res;
		}
		
		  return 0;
    }
    function Check(& $values){
    
    $values['settime']=date("y-m-d h:i:s",time());
	  return 1;
    }
    function getAll(){
		$sql = "select * from `homework` ";
    $res =self::$db->getRows($sql);	
    if(!$res){ return false;
    }
    else return $res;
    }
    function ExceptionHandle(Exception $e ){
    }
}
?>
