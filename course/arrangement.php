<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>课程中心</title>
<link rel="stylesheet" href="../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../style/course_formwork.css"  type="text/css"/>
<link rel="stylesheet" href="../style/main_menu.css"  type="text/css"/>
<link rel="stylesheet" href="../style/login.css"  type="text/css"/>
<link rel="stylesheet" href="../style/mysubmit.css"  type="text/css"/>
<link rel="stylesheet" href="../style/arrangement.css"  type="text/css"/>
</head>

<body>
<div id="all">
    	<?php 
		include_once(dirname(__FILE__).'/../globals/globals.php');
		include_once('./formwork/main_menu.php');
			$data=$course->getInformation('ARRANGEMENT');
			$data=$data[0];
			if(!empty($data['description']))
			$arrangement=explode(';;',$data['description']);
			
		?>
    <div id="body">
    		<div id="position">
            	<table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="../">首页</a>--></span><span><a href="<?php echo  $GLOBALS['PATH']?>course/index.php?id=<?php echo $course->__get('id');?>"><?php echo $course->__get('name');?></a>--></span><span><a href="">课程安排</a></span></td></tr>
            </table>
         </div>
    	<?php include_once('./formwork/login.php');?>
        <div id="body_bottom">
        	<?php include_once('./formwork/mysubmit.php');?>
            <div id="body_bottom_right">
                <div id="nowposition"> 	
                </div>
                <div id="title" align="center">
                    教学安排
                </div>
                <div id="arrangement">
                	<table width="80%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolorlight="#9ECAE1" bordercolordark="#FFFFFF">
        <tbody><tr align="center"> 
          <td id="l17" width="18%"><font color="#FF6600">教学周 </font></td>
          <td id="l17" width="39%"><font color="#FF6600">教学内容 </font></td>
          <td id="l17" width="14%"><font color="#FF6600">讲课学时 </font></td>
          <td id="l17" align="center" width="14%"><font color="#FF6600">实验学时 
            </font></td>
        </tr>
        <?php 
				$TotalExp=0;
				$TotalCourse=0;
				if(is_array($arrangement))
				  foreach($arrangement as $k=>$v){
					  if(!empty($v)){
					  echo '<tr>';
					  ++$k;
					  echo "<td id='l17' align='center' width='18%'>第{$k}周</td>";
					  $oneRecord=explode('||',$v);
					  echo '<td id="l17" width="39%">&nbsp;'.$oneRecord[0] .'</td>';
					  echo '<td id="l17" align="center" width="14%">'.$oneRecord[1] .'</td>';
					  echo '<td id="l17" align="center" width="14%">'.$oneRecord[2] .'</td>';					 
					  echo '</tr>';
					  $TotalCourse+=doubleval($oneRecord[1]);
					  $TotalExp+=doubleval($oneRecord[2]);
					  }
				  }
		?>
       
        <tr> 
          <td id="l17" align="center" width="18%">合计</td>
          <td id="l17" width="39%">&nbsp;</td>
          <td id="l17" align="center" width="14%"><? echo $TotalCourse?></td>
          <td id="l17" align="center" width="14%"><? echo $TotalExp?> </td>
        </tr>
      </tbody></table>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../globals/foot.php'); ?>
</div>
</body>
</html>