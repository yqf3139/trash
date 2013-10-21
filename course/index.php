<?php
ob_start(); 
include_once(dirname(__FILE__).'/../globals/globals.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" href="../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../style/course_formwork.css"  type="text/css"/>
<link rel="stylesheet" href="../style/main_menu.css"  type="text/css"/>
<link rel="stylesheet" href="../style/login.css"  type="text/css"/>
<link rel="stylesheet" href="../style/mysubmit.css"  type="text/css"/>
<link rel="stylesheet" href="../style/course_index.css"  type="text/css"/>
<link rel="stylesheet" href="./css/master.css" type="text/css" media="screen" charset="utf-8" />
</head>
<script>
function init()
{
	KeyImg.src='ShowKey.php?'+Math.random();
}
</script>
<body onload="init()">
<div id="all">
<?php 
include_once('./formwork/main_menu.php');		
$introduction=$course->getInformation('INTRODUCTION');
$notice=$course->getInformation('NOTICE');
$teacher=$course->getInformation('TEACHERS');
if(is_array($teacher)){
    shuffle($teacher);
}
?>

    <div id="body">
    	 <div id="position">
            <table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../">首页</a>--></span><span><?php echo $course->__get('name');?></span></td></tr>
            </table>	
         </div>
    	<?php include_once('./formwork/login.php');?>
        <div id="body_bottom">
        <?php include_once('./formwork/mysubmit.php');?>
            <div id="body_bottom_right">
            	<div id="part_1">
                	<div id="course">
                    	<div id="course_title">
                   			<table id="m_info" width="100%">
                            	<tr><td align="right"><a href="<?php echo  $GLOBALS['PATH']?>course/course_introduce.php?id=<?php echo $course->__get('id') ?>">more</a></td></tr>
                            </table>
                        </div>
                        <div id="course_content">
                        	<table id="table_course_content" >
                            	<tr><td>&nbsp;</td></tr>
                            	<tr align="left"><td><font>课程名：<span><?php echo $introduction['name'];?></span></font></td></tr>
                                <tr align="left"><td><font>研究方向:<span><?php echo $introduction['direction'];?></span></font></td></tr>
                                <tr align="left"><td><font>描述:</font>　<?php echo $introduction['description'];?></td></tr>
                            </table>
                        	<!--<div id="_Pic_1">
                            </div>
                            <p>
                            　<?php echo $introduction['name'];?>
                            </p>   
                            <p>
                            　<?php echo $introduction['direction'];?>
                            </p>   
                            <p>
                            　<?php echo $introduction['description'];?>
                            </p>   -->
                        </div>
                    </div>
                    <div id="news">
                    	<div id="news_title"> 
                        	<table id="m_info" width="100%">
                            	<tr><td align="right"><a href="<?php echo  $GLOBALS['PATH']?>course/course_notice.php?id=<?php echo $course->__get('id') ?>">more</a></td></tr>
                            </table>
                        </div>
                        <ul id="news_contents">
                        <?php foreach ($notice as $k=>$v){if ($k>5)break?>
                        	<li id="list">
                            	<span id="new_name">
                                	<a href="<?php echo  $GLOBALS['PATH']?>course/notice.php?id=<?php echo $course->__get('id') ?>&notice_id=<?php echo $v['id']; ?>" target="_blank">
                                    <?php echo $v['title'];?>
                                    </a>                        		
                                      <span id="new_date"><?php echo substr($v['settime'],0,10)?></span></span>
                            </li>
                            <?php }?>
                            </ul>
                    </div>
                </div>
                <div id="part_2">
                	<div id="others">
                    	<div id="others_title">
                        	<table id="m_info" width="100%">
                            	<tr><td align="right"></td></tr>
                            </table>
                        </div>
                        <!--<div id="kechengziyuan"></div>
                        <div id="jiaoxuerili"></div>
                        <div id="kechengdagang"></div>
                        <div id="kaoshidagang"></div>-->
 
                        <div id="rili">
							<?php 
if (function_exists('date_default_timezone_set')) { 
date_default_timezone_set('Asia/Chongqing'); 
} 
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); 
$date = getdate(strtotime($date)); //月份
$html='<h1 align="center">'.$date['mon'].'-'.$date['year'].'</h1>';
$end = getdate(mktime(0, 0, 0, $date['mon'] + 1, 1, $date['year']) - 1); 
$start = getdate(mktime(0, 0, 0, $date['mon'], 1, $date['year'])); 
$pre = date('Y-m-d', $start[0] - 1); 
$next = date('Y-m-d', $end[0] + 86400); 
//$html = '<h1>教学日历</h1>'; 
//$html.='<table><tr><td><a href="' . $PHP_SELF . '?date=' . $pre . '">-</a></td><td><p>' . $date['year'] . ';' . $date['month'] . '</p></td><td><a href="' . $PHP_SELF . '?date=' . $next . '">+</a></td>';
$html.='<table cellspacing="0" id="ca">';
$html.='<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr>';
//$html .= '<tr>'; 
//$html .= '<th><a href="' . $PHP_SELF . '?date=' . $pre . '">-</a></th>'; 
//$html .= '<th colspan="5">' . $date['year'] . ';' . $date['month'] . '</th>'; 
//$html .= '<th><a href="' . $PHP_SELF . '?date=' . $next . '">+</a></th>'; 
//$html .= '</tr>'; 
$arr_tpl = array(0 => '', 1 => '', 2 => '', 3 => '', 4 => '', 5 => '', 6 => ''); 
$date_arr = array(); 
$j = 0; 
for ($i = 0; $i < $end['mday']; $i++) { 
if (!isset($date_arr[$j])) { 
$date_arr[$j] = $arr_tpl; 
} 
$date_arr[$j][($i+$start['wday'])%7] = $i+1; 
if ($date_arr[$j][6]) { 
$j++; 
} 
} 
foreach ($date_arr as $value) { 
$html .= '<tr>'; 
foreach ($value as $v) { 
if ($v) { 
if ($v == $date['mday']) { 
$html .= '<td class="today"><b>' . $v . '</b></td>'; 
} else { 
$html .= '<td>' . $v . '</td>'; 
} 
} else { 
$html .= '<td> </td>'; 
} 
} 
$html .= '</tr>'; 
} 
$html .= '</table>'; 
echo $html; 
?>
                        </div>


                       
                    </div>
                    <div id="teachers">
                    	<div id="teachers_title">
                        	<table id="m_info" width="100%">
                            	<tr><td align="right"><a href="<?php echo  $GLOBALS['PATH']?>course/teacher_introduce.php?id=1">more</a></td></tr>
                            </table>
                        </div>
                        <div id="teachers_name">
                        	<?php if($teacher[0]){ echo $teacher[0]['name']."  ".$teacher[0]['title'] ;?>
                        </div>
                        <div id="teachers_Pic1"><img width="100%" src='<?php echo substr($teacher[0]['picture'],3);?>' /></div>
                        <p style="font-family: Arial;Font-size: 9pt; margin-top:3px; padding:3px;"><span style="color:#FF9900">个人介绍：</span>
                        	<?php echo substr($teacher[0]['decription'],0,90)."......"; }?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../globals/foot.php'); ?>
</div>
</body>
</html>
