<?php
include_once("SecurityDB.php");
class dataAdministrator extends   SecurityDB{
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('administrator');
    }
    function SelectByPKey($Pkey){		
		$administrator_id=intval($Pkey);
		if(!$administrator_id){
		  echo "error is not int";
		}
		
		$sql = "select * from `administrator` where `administrator_id` = {$administrator_id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
	function SelectByName($name){		
		if(!$name){
		  echo 0;
		}
		$sql = "select * from `administrator` where `name` = '{$name}'";
		$data=self::$db->getRow($sql);
		return $data;
    }
    function DeleteByPkey($Pkey){		
		$administrator_id=intval($Pkey);
		if(!$administrator_id){
		  echo "error is not int";
		}
		
		$sql = "delete from `administrator` where `administrator_id` = {$administrator_id}";
		$data=self::$db->query($sql);
		return $data;
    }
    function UpdateByPkey($Pkey,$values){
		$id=is_int($Pkey);
		if(empty($id)){
		  return 0;
		}
		if(self::Check($values)){
        //echo $values['password'];
    if(isset($values['password']))
    $values['password']=self::cryptPassword($values['password'],$Pkey);
		$res = self::$db->update('administrator','administrator_id='.$Pkey,$values);
    	return $res;
	  }
		return 0;
    }
	
    function UpdateByName($name,$values){
      if(!$name){
        echo "error name!=NULL";
        return 0;
      }
      $sql="select `administrator_id` from `administrator` where `name`={$name}";
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
        UpdateByPkey($res[0]['administrator_id'],$values);
      }
		}
    function Check(& $values){
    $name=trim($values['name']);
		$password=trim($values['password']);
		if(is_null($name)||is_null($password))
		return 0;
		else return 1;
    }
    function InsertByPkey($values){
      if(self::Check($values)){
        $res=self::$db->insert('administrator',$values,true);
        $values['password']=self::cryptPassword($values['password'],$res);       
        $res=self::$db->update('administrator','administrator_id='.$res,$values);
        return $res;
      }
     echo "values is inlegal";
    }
    function getAll(){
      $sql="select * from `administrator` ";
      $res=self::$db->getRows($sql);
      return $res;
    }
    function CheckPassword($username,$pwd){
      $data=self::SelectByName($username);	  
      if(!empty($data))
      return parent::checkPassword($data['password'],$pwd,$data['administrator_id']);
    }

    function ExceptionHandle(Exception $e ){
    }
}
?>
