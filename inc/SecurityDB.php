<?php 
include_once('MyDB.php');
abstract class SecurityDB extends MyDB {
  private static $defaultSalt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN';

  public  function cryptPassword($password, $uid=null) {
    self::isVaildPassword($password);

    $salt = self::generateSalt($uid);
    return md5(sha1($salt.$password));

  }

  public  function checkPassword($cryptPassword, $password, $uid=null) {
    if(strlen($cryptPassword) !== 32) {
     	return false;
    }
	
    if(!self::isVaildPassword($password))return false;
	
    if($cryptPassword==$password){
      return $cryptPassword;
    }
    else{
      $salt = self::generateSalt($uid);	  
      if(md5(sha1($salt.$password)) === $cryptPassword) {
        return $cryptPassword;
      }
    }
    return false;
	}
	
	private  function generateSalt($uid=null) {
		$md5Str = is_null($uid) ? md5($uid) : md5(self::$defaultSalt);
		return substr($md5Str, 8, 16);
	}
	
	private  function isVaildPassword($password) {
		return !(!$password || strlen($password) < 6);
	}
}

?>
