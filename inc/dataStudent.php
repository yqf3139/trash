<?php
include_once("SecurityDB.php");
class dataStudent extends   SecurityDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('student');
    }
    function SelectByPKey($Pkey,$like=false){		
		$student_id=intval($Pkey);
	  if($like){	
		$sql = "select * from `student` where `student_id` like '{$student_id}%'";
		$data=self::$db->getRows($sql);
    }
    else{
		$sql = "select * from `student` where `student_id` = {$student_id} limit 1";
		$data=self::$db->getRow($sql);
    }
		return $data;
    }
	function SelectByName($name,$like=false){		
		if(!$name){
		  echo 0;
		}
    if ($like)
		$sql = "select * from `student` where `name` like '{$name}%'";
    else
		$sql = "select * from `student` where `name` = '{$name}'";
    echo $sql;
		$data=self::$db->getRows($sql);
		return $data;
    }
    function DeleteByPkey($Pkey,$like=false){		
		$student_id=intval($Pkey);
    if(is_NULL($student_id))
    return "emtpy id";
    $sql = "delete from `student` where `student_id` = {$Pkey} limit 1";
	  $res=self::$db->query($sql);
		return $res;
    }
    function UpdateByPkey($Pkey,$values){

      if(self::check($values)){
      if(isset($values['password']))
		  $values['password']=self::cryptPassword($values['password'],$Pkey);
          $res=self::$db->update('student','student_id='.$Pkey,$values);
		 	
	  }
      return $res;
		}
	
    function UpdateByName($name,$values){
      if(!$name){
        echo "error name!=NULL";
        return 0;
      }
      $sql="select `student_id` from `student` where `name`={$name}";
      $res=self::$db->getRows($sql);
      if(!$res){
        echo "error name not exist";
          return 0;
      }
      elseif(is_array($res)&& (count($res)!=1)){
        return 0; 
      } 
      else {
        $values['name']=$name;
        UpdateByPkey($res[0]['student_id'],$values);
      }
		}
    function Check(& $values){
		$values['settime']=date("y-m-d h:i:s",time());
    return 1;
    }
    function InsertByPkey($values){
      if(!self::Check($values)){
        return "values is inlegal";
      }
	    $values['password']=self::cryptPassword($values['password'],$values['student_id']);
      $res=self::$db->insert('student',$values);
      return $res;
    }
    function getAll(){
      $sql = "select * from `student` order by `student_id`";
      $data=self::$db->getRows($sql);
      return $data;
    
    }
     function CheckPassword($username,$pwd){
      $data=self::SelectByPKey($username);
      if(!$data)
        return false;
      return parent::checkPassword($data['password'],$pwd,$data['student_id']);
    }

    function ExceptionHandle(Exception $e ){
    }
}
?>
