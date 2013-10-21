<?php 
  ob_start();
  ini_set('memory_limit','-1');
  include_once('teacher.php');
  $teacher=new Teacher;
  $teacher->download();
?>
