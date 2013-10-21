<?php
#by zachary wang
#2012-12-10
#abstract class for table in DB


include_once("mysqlClass.php");

abstract class MyDB{
  abstract function SelectByPKey($Pkey);
  abstract function DeleteByPkey($Pkey);
  abstract function UpdateByPkey($Pkey,$values);
  abstract function InsertByPkey($values);
  abstract function Check(& $values);
  abstract function ExceptionHandle(Exception $e ); 
  function __get($name){
    if($name=='db')
      return self::$db;
    return $this->$name;

  }
	static function init(){
    self::$db=new Mysqls();   
  }
  function makeDir($path) {
      $path = str_replace(array('/', '\\', '//', '\\\\'), DIRECTORY_SEPARATOR, $path);
      $dirs = explode(DIRECTORY_SEPARATOR, $path);
      $tmp = '';
      foreach ($dirs as $dir) {
          $tmp .= $dir . DIRECTORY_SEPARATOR;
          if (!file_exists($tmp) && !mkdir($tmp, 0777)) {
              return $tmp;
          }
      }
      return true;
    }

  static protected $db;
  protected $ATTRIBUTES;
};
MyDB::init(); 
?>
