<?php
class CourseGroup{
function Group($type,$Data){
  $res=array();
  if(is_array($Data))
  foreach($Data as $k=>$v){
    $value['name']=$v['name'];
    $value['course_id']=$v['course_id'];
    $value['link']=$v['link'];
    $value['available']=$v['available'];
    if ( array_search($v[$type],array_keys($res),false)!==false ) { 
      array_push($res[$v[$type]],$value);
    }
    else{
      $res[$v[$type]]=array();
      array_push($res[$v[$type]],$value);
    }

  }
   return $res;

}
function OutputOneCourse($v){
   echo "<a target=_blank href=";
    echo  $v['link']?  "\"{$v['link']}\"":"./course?id={$v['course_id'] }";
  echo ">{$v['name']}</a>";

}
function OutputOneCourseNew($v){
   echo "<a target=_blank href=";
    echo  $v['link']?  "\"{$v['link']}\"":"../../course/?id={$v['course_id'] }";
  echo ">{$v['name']}</a>";

}
}
?>
