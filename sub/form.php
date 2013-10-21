<?php
include_once('../inc/dataRecommend.php');
include_once('../inc/dataStudent.php');
include_once('../inc/dataCourse.php');
include_once('../inc/dataAdministrator.php');
include_once('../inc/dataClass.php');
include_once('../inc/dataHomework.php');
include_once('../inc/dataSetHomework.php');
include_once('../inc/dataInformation.php');
include_once('../inc/dataTeacher.php');
include_once('../inc/dataCourseSelection.php');
include_once('../inc/dataCourseSelection.php');
include_once('../login.php');
class form{
  public function __construct($table){
    //缺表验证
  $this->table=$table;
  $this->__set('authority',constant('ADMIN'));//默认管理员权限
  switch($table){
    case 'student':
    $this->db=new dataStudent();
    break;
    case 'course':
    $this->db=new dataCourse();
    break;
    case 'administrator':
    $this->db=new dataAdministrator();
    break;
    case 'class':
    $this->db=new dataClass();
    break;
    case 'information':
    $this->db=new dataInformation();
    break;
    case 'recommend':
    $this->db=new dataRecommend();
    break;
    case 'courseselection':
    $this->db=new dataCourseSelection();
    break;
    case 'homework':
    $this->db=new dataHomework();
    break;
    case 'sethomework':
    $this->db=new dataSetHomework();
    break;
    case 'teacher':
    $this->db=new dataTeacher();
    break;
    default:
      $this->ErrorMsg='cant find db type';
        die();
  }
  }
  protected function getdata(){
    $test="0";
    echo empty($test);
  if(isset($_POST['sub'])){
   if(empty($this->table)){
   echo "fails cant find what type you wanna add"; 
   die();
  }
  //从数据库中得到表的属性 
  $attribute=$this->db->__get('ATTRIBUTES');
  //var_dump($attribute);
  //检验表单合法属性
  foreach($attribute as $k=>$v){
    if(!isset($_POST[$k])||empty($_POST[$k])){
      unset($attribute[$k]);
      continue;
    }
    
    if($k=='description'){
      $attribute[$k]=stripslashes(trim($_POST[$k]));
    }
     
    else if($v=='date'){
      $attribute[$k]=date('y-m-d',strtotime(trim($_POST[$k])));
    }
    else if($v=='int'){
      $attribute[$k]=intval($_POST[$k])?intval($_POST[$k]):0;
    }
    else if($v=='string'){
      $$k=trim($_POST[$k]);
      if(!empty($$k)) 
        $attribute[$k]=$$k;
      else unset($attribute[$k]);
    }
  }
  if(empty($attribute)){
  $this->ErrorMsg= "input empty";
  die();
  }
  else return $attribute;
  }
  else {
  $this->ErrorMsg= "access failed";
  echo $this->ErrorMsg;

  die();
  }
    
  }

public function add(){	
	$attribute=$this->getdata();	
    $res=$this->db->InsertByPKey($attribute);	
    if($res!=1){
     $this->ErrorMsg=$res;	     
    }
	
}
public function del(){
if(isset($_POST['sub'])){
     $id=intval($_POST['id']);
     if(empty($id)){
       echo "id is  invalid";
       die();
     }
     if($this->db->DeleteByPkey($id)){
      	echo "<script>alert('删除成功');history.back(-1);</script>";
     }
     else  {
      	echo "<script>alert('删除成功');history.back(-1);</script>";
     }
     die();
}
else {
  $this->ErrorMsg="access fail";
  die();
}

}
function getfile(& $target,$cover =false){
    if(isset($_FILES['file'])&&$_FILES['file']['size']>0){
      if($_FILES['file']['error']){
          $this->ErrorMsg= "upload error".$_FILES['file']['error'];
          echo $this->ErrorMsg;
          die();
          return false;
      }
      $FileName=iconv('utf-8','gb2312',$_FILES['file']['name']);
      while(!$cover&&file_exists($target.$FileName))
      $target.='new';
      $target_move=$target.$FileName;
      $target.=$_FILES['file']['name'];
      move_uploaded_file($_FILES['file']['tmp_name'],$target_move);

      return true;
    }
    else return false;
  }

function __set($name,$value){
  $this->$name=$value;
}
public function update(){
    $attribute=$this->getdata();
    //var_dump($attribute);
    if($this->db->UpdateByPKey(current($attribute),$attribute)!=1){	 
     $this->ErrorMsg="update fail"; 
	   return false;
    }
	else{
    echo $this->db->UpdateByPKey(current($attribute),$attribute); 
	 return true;
	}

}
public function jumpBack($url=false){
	if(!$this->ErrorMsg===1){
		echo "<script>alert('操作失败 原因：{$this->ErrorMsg}');</script>";
	}
	else
	echo "<script>alert('操作成功')</script>";
	if($url){
  if(isset($_POST['back_url']))
  $url.='?'.$_POST['back_url'];
	echo "<script>window.location.href='{$url}'</script>";
  }
	else
	echo "<script>history.back(-1);</script>";
	die();
		
}
public function SetErrorMsg($Msg){
	$this->ErrorMsg=$Msg;

}
public function Authority($type,$flag=true){
  $this->__set('authority',$type);
  $login=new LoginClass;
  if($flag)
  return $login->authority($this->authority);

}
protected $table;
protected $authority;
protected $db;
protected $ErrorMsg=1;
};
?>
