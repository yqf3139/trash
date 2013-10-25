<?php 

define("ADMIN",1);
define("TEACHER",2);
define("STUDENT",3);
include_once('inc/dataAdministrator.php');//包含外部文件
include_once('inc/dataStudent.php');
include_once('inc/dataTeacher.php');
include_once(dirname(__FILE__).'/globals/globals.php');
class LoginClass{
  function __construct(){
    ob_start();
    session_start();
  }
  function logout($jump=true){
    $type=$_SESSION['type'];
    if(isset($_SESSION['name'])||isset($_SESSION['type'])) 
      $_SESSION=array();
    if(isset($_COOKIE['name'])){
      setcookie('name',"",time()-30,'/');
    }
    if(isset($_COOKIE['type'])){
      setcookie('type',"",time()-30,'/');
    }
    if(isset($_COOKIE['pwd'])){
      setcookie('pwd',"",time()-30,'/');
    }
    if($jump){
      session_destroy(); 
      echo "<script>alert('已成功注销')</script>";
      self::JumpUrl($type);
    }

  }
  function JumpUrl($type){
    if($type==constant('ADMIN'))
      echo "<script>window.location='manage/login.php';</script>";
    else
      echo "<script>window.location='../course/index.php?id={$_GET['id']}';</script>";
    die();
  }
  function loginState(){
    if(!isset($_SESSION['name'])||!isset($_SESSION['type'])){ 
      if(isset($_COOKIE['name'])&&isset($_COOKIE['type'])&&isset($_COOKIE['pwd'])) {
        if(self::checkPassword($_COOKIE['name'],$_COOKIE['pwd'],$_COOKIE['type'],false)){
          $_SESSION['name']=$_COOKIE['name'];
          $_SESSION['type'] =$_COOKIE['type'];
          return $_SESSION['type'];
        }
        else{
          self::logout(false);
        }
      }
      else return false;
    }
    return $_SESSION['type'];
  }
  function authority($type){
    $already=self::loginState();	
    $flag=true;
    if(is_array($type)){
      foreach($type as $k=>$v){
        if(!intval($v))
          $type[$k]=constant($v);
      }
      if(!in_array($already,$type))
        $flag=false;
    }
    else {
      if(!intval($type))
        $type=constant($type);
      if($type!=$already){
        $flag=false;
      }
    }

    if(!$flag){
      echo "<script>alert('请您先登录')</script>";
      self::JumpUrl($type);
      die();
    }
	else return $already;

  }
  function login($jump=true){
    $type = isset($_POST['type'])?intval($_POST['type']):0;
    if(!isset($_POST['sub'])){
      echo "<script>alert('非法操作');history.back();</script>";
      die();
    }
    if($type<1||$type>3){
      echo "<script>alert('非法操作');history.back();</script>";
      die();
    }
    if(isset($_POST['course_id']))
      $_GET['id']=$_POST['course_id'];
    if($type!=constant("ADMIN")&&(!isset($_POST['check'])||$_POST['check']!=$_SESSION['check_pic'])){
      echo "<script>alert('验证码错误');</script>";
      self::JumpUrl($type);
      die();
    }

    $username = isset($_POST['username'])?trim($_POST['username']):'';
    $pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
    if($jump){
      if($username){
        if(strlen($username)<6||strlen($username)>50){
          echo "<script>alert('用户名长度为6-50个字符');</script>";
          self::JumpUrl($type);
          die();
        }
      }
      else{	
        echo "<script>alert('亲，用户名不能空哦~');</script>";
        self::JumpUrl($type);
        die();
      }
      if($pwd){
        if(strlen($pwd)<6||strlen($pwd)>12){
          echo "<script>alert('密码长度为6-12个');</script>";
          self::JumpUrl($type);
          die();
        }
      }
      else{	
        echo "<script>alert('亲，密码不能空哦~');</script>";
        self::JumpUrl($type);
        die();
      }
    }

    self::checkPassword($username,$pwd,$type,$jump);

    set_time_limit(0);
    if($type==1)
      $back_url='../manage';
    else if($type==2)
      $back_url='../teacher?id='.$_POST['course_id'];
    else if($type==3)
      $back_url='../student?id='.$_POST['course_id'];
    if($jump)
      echo "<script>window.location='{$back_url}';</script>Success";
  }

  function checkPassword( $username, $pwd, &$type,&$jump=true){

	$isCorrect=true;
    if($type==1){
      $db=new dataAdministrator;
      $pwd=$db->checkPassword($username,$pwd);
	  if(!$pwd )
        $isCorrect=false;
    } 
    else{
      if(!intval($username))$isCorrect=false;
      else{
        $DbTearcher=new dataTeacher;
        $DbStudent=new dataStudent;
        $flag=$DbStudent->checkPassword($username,$pwd);
        if($flag){
          $type=constant("STUDENT");
          $pwd=$flag;
        }
        else{
        $pwd=$DbTearcher->checkPassword($username,$pwd);
        if($pwd)
          $type=constant("TEACHER");
        else
           $isCorrect=false;
        }
         
      }
    } 
    
    if((!$isCorrect)&&$jump){
      echo "<script>alert('亲，用户名或密码错误，请重新登录~');</script>";
      self::JumpUrl($type);
      die();
    }
    
    self::logout(false);
    setcookie("name",$username,time()+3600*24*7,"/");
    setcookie("pwd",$pwd,time()+3600*24*7,"/");
    setcookie("type",$type,time()+3600*24*7,"/");
    $_SESSION['name']=$username;
    $_SESSION['type'] =$type;
    return  $isCorrect;

  }

};

?>
