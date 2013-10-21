<?php

include_once("MyDB.php");
class dataCourse extends MyDB{
    
  function __CONSTRUCT(){
    $this->ATTRIBUTES=self::$db->getAttribute('course');
    }
  function CreateTitlePicture($name,$string){
    $imgae='titleone-1.png';
    $img=GetImageSize($imgae);
    switch($img[2])
    {
      case 1:
      $im=@ImageCreateFromGIF($imgae);
      break;
      case 2:
      $im=@ImageCreateFromJPEG($imgage);
      break;
      case 3:
      $im=@ImageCreateFromPNG($imgae);
      break;
    }
    $te=imagecolorallocate($im,23,100,130);
    imagettftext($im,55,0,150,90,$te,"STXINGKA.TTF",$string);
    //header("Content-type:image/png");
    imagepng($im,'../img/new/'.$name.'.png');

  }
    function SelectByPKey($Pkey){		
		$course_id=intval($Pkey);
		if(!$course_id){
		  return -1;
		}
		$sql = "select * from `course` where `course_id` = {$course_id}";
		$data=self::$db->getRow($sql);
		return $data;
    }
	function SelectByName($name){		
		if(empty($name)){
		  return ;
		}
		$sql = "select * from `course` where `name` = \"{$name}\"";
		$data=self::$db->getRow($sql);
		return $data;
    }
   
	function SelectByYear($year){		
		$year=intval($year);
		if(!$year){
		  return -1;
		}
		
		$sql = "select * from `course` where `year` = {$year}";
		$data=self::$db->getRows($sql);
		return $data;
    }
	function SelectByDirection($direction){		
		$direction=$direction;
		if(!$direction){
		  return -1;
		}
		
		$sql = "select * from `course` where `direction` = {$direction}";
		$data=self::$db->getRows($sql);
		return $data;
    }
    function DeleteByPkey($Pkey){
		$course_id=intval($Pkey);
		$sql = "delete  from `course` where `course_id` = {$course_id} limit 1";
		$res = self::$db->query($sql);
    return $res;
		}
    function UpdateByPkey($Pkey,$values){
	  if(self::Check($values)){
      $res=self::$db->update('course','course_id='.$Pkey,$values);
      if($res)
      $this->CreateTitlePicture($values['course_id'],$values['name']);
		}
	
    }
    function UpdateByName($name,$newname,$direction,$description,$link,$year){
		$name=$name;
		if(!$name){
		  
		  return -1;
		}
		if(self::Check($values)){
		$sql = "update `course` set `name`={$newname},`direction`={$direction},`description`={$description},`link`={$link},`year`={$year} where `name`={$name}";
		$res = self::$db->query($sql);
		if($res){
		  
		  return -2;
		}
		}
		
		  return 0;
    }
    function InsertByPkey($values){
      if(self::Check($values)){
	      $res = self::$db->insert('course',$values,true);
         if($res){
			
         $this->makeDir('../file/'.$res.'/notice');
         $this->makeDir('../file/'.$res.'/class');
         $this->makeDir('../file/'.$res.'/resource');
		 
         $this->CreateTitlePicture($res,$values['name']);
         $arrangement['type']=5;
         $arrangement['course_id']=$res;
         $arrangement['settime']=date("y-m-d h:i:s",time());
	     $res = self::$db->insert('information',$arrangement,true);

         }
         return $res;
      }
    }
    function Check(& $values){
    if(!isset($values['available']))
        $values['available']=0;
    if(!isset($values['link']))
        $values['link']="";
    if(empty($values['name']))
		return 0;
		else return 1;
    }
    function getAllCourse($flag=true){
		$sql = "select * from `course` ";
    if($flag)
    $sql.="where available=1 ";
    $res =self::$db->getRows($sql);	
    if(!$res){ return false;
    }
    else return $res;
    }
    function ExceptionHandle(Exception $e ){
    }
}
?>
