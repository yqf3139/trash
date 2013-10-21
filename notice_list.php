<?php
include_once('./inc/dataInformation.php');
include_once('./fun/page.php');
$db=new dataInformation;
$data=$db->SelectByType(constant("CENTER_NOTICE"));
 
$page=intval($_GET['page']);
  			if(!empty($page))
 			for($i=0;$i<($page-1)*15;++$i)
  			next($data);

echo '<table id="course_list" align="center" width="80%">';
echo	'<tr align="center"><th colspan="3">学院通知</th></tr>';
if(is_array($data))for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break; 
echo    '<tr><td  align="left"><a target=_blank href="./notice.php?id='.$v['id'].'">'.$v['title'].'</a></td><td align="right">'.substr($v['settime'],0,10).'</td></tr>' ;
}
echo '<tr><td align="center" colspan="2">';
_PAGEFT(count($data),15);
echo $pagenav;
echo '</td></tr>';
echo '</table>';
?>
