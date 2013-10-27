<?php
include_once("SecurityDB.php");
class dataTeacher extends SecurityDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('teacher');
    }
    function SelectByPKey($Pkey){		
		$teacher_id=intval($Pkey);
		if(!$teacher_id){
		  return -1;
		}
		
		$sql = "select * from `teacher` where `teacher_id` = {$teacher_id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
	function SelectByName($name){   
		if(!$name){
		  return -1;
		}
		
		$sql = "select * from `teacher` where `name` = '{$name}'";
		$data=self::$db->getRows($sql);
		return $data;
    }
	function SelectByEmail($email){   
		if(!$email){
		  return -1;
		}
	  	
		$sql = "select * from `teacher` where `email` = '{$email}' limit 1";
		$data=self::$db->getRow($sql);
		return $data;
    }
    function DeleteByPkey($Pkey){
		$teacher_id=intval($Pkey);
		if(!$teacher_id){
		  return -1;
		}
		
		$sql = "delete  from `teacher` where `teacher_id` = {$teacher_id} limit 1";
		$res = self::$db->query($sql);
    return $res;
		
	    }
    function UpdateByPkey($Pkey,$values){
		if(self::check($values)){
    if(isset($values['password']))
	      $values['password']=self::cryptPassword($values['password'],$Pkey);		
      	$res=self::$db->update('teacher','teacher_id='.$Pkey,$values);
    	}
   		 return $res;
    }
    function InsertByPkey($values){
      if(!self::Check($values)){
        return "values is inlegal";
      }
	    $values['password']=self::cryptPassword($values['password'],$values['teacher_id']);
      $res=self::$db->insert('teacher',$values);
      return $res;
    }
    function Check(& $values){
		$values['settime']=date("y-m-d h:i:s",time());
    	return 1;
    }
    function getAll(){
		$sql = "select * from `teacher` ";
    $res =self::$db->getRows($sql);	
    if(!$res){ return false;
    }
    else return $res;
    }
    function CheckPassword($username,$pwd){
      $data=self::SelectByPKey($username);
      if(!$data)
      return false;
      return parent::checkPassword($data['password'],$pwd,$data['teacher_id']);
    }

    function ExceptionHandle(Exception $e ){
    }
}
/*$a=new dataTeacher();
$v['name']="lll";
$v['sex']=0;
$v['title']="lll";
$v['description']="lll";
$v['word']="lll";
$v['password']="lll";
$v['available']=1;
$v['link']="lll";
$res=$a->InsertByPkey($v);
var_dump($v);*/
?>
