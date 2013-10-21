<?php 
include_once('./recommend.php');
$index=new CenterIndex();
$CourseRcmd=array();
$TeacherRcmd=array();
$Picture=array();
$index->GetRcmd($CourseRcmd,$TeacherRcmd);
$Picture=$index->GetPicture();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="./style/head.css"/>
<link rel="stylesheet" href="./style/index1.css"  type="text/css"/>
<link rel="stylesheet" href="./style/foot.css" type="text/css" />
<link rel="stylesheet" href="./style/left_2.css"  type="text/css"/>
<script src="js/index.js"></script>
</head>

<body>
<div id="all">
	<div id="top">
		<?php include_once('./globals/head.php'); ?>
	</div>
    <div id="centre">
    	<div id="position">
            <table style="width:100%; height:100%;">
            	<tr><td><span>你现在的位置：</span><span><a href="">首页</a></span></td></tr>
            </table>	
        </div>
        <div id="navigation">
        	<?php include_once('./globals/left_2.php'); ?>
        </div>
        <div id="content0">
        	<style>
				#list,#count{margin:0;padding:0;}
				#list,#count{list-style-type:none;}
				#count{text-align:center;font:12px/20px Arial;}
				#box{position:relative;width:575px;height:400px;background:#fff;border-radius:5px;border:0px solid #fff;margin:10px auto;}
				#box #list{position:relative;width:575px;height:400px;overflow:hidden;border:1px solid #ccc;}
				#box #list li{position:absolute;top:0;left:0;width:575px;height:400px;opacity:0;filter:alpha(opacity=0);border:0;}
				#box #list li.current{opacity:1;filter:alpha(opacity=100);border:0;}
				#box #count{position:absolute;right:0;bottom:5px;}
				#box #count li{color:#fff;float:left;width:20px;height:20px;cursor:pointer;margin-right:5px;overflow:hidden;background:#ccc;opacity:0.7;filter:alpha(opacity=70);border-radius:20px;}
				#box #count li.current{color:#fff;opacity:1;filter:alpha(opacity=100);font-weight:700;background:#415E89;}
	
            </style>
        	  <div id="picture">
                    <div id="box">
                        <ul id="list" class="list">
                          
                            <?php foreach ($Picture as $k=>$v){ ?>
                            <li <?php if ($k==0)echo 'id="current1" class="current"';?>>
                            <a style="text-decoration:none" href="<?php echo $v['link'] ?>" ><img src="<?php echo $v['description'] ?>"  style="width:575px; height:400px;"></a></li>
                            
                            <?php }?>
                        </ul>
                        <ul id="count" class="count">
                            <li id="current2" class="current">1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                        </ul>
                    </div>
            	</div>
                <div id="Recommend" align="center">
                	<table id="class_list" width="95%">
                        <tr><td></td></tr>
                        <tr><th>推荐课程</th></tr>
                          
                           <?php if($CourseRcmd)foreach($CourseRcmd as $k=>$v){ ?>                       
                                        
                        <tr><td style="border-bottom:1px solid #415E89; border-bottom-style:dashed"> 
                          <?php $index->OutputOneCourse($v);?>
                         </td></tr>
                              
                  			 <?php } else echo "数据库未包含任何内容"?>
                       
                    </table>
                </div>
                <div id="other_link">
                	<div id="othercourse_list">
                       <p align="left" style="margin-top:3px; margin-left:5px; font-weight:600; color:#ccc">友情链接</p>
                	</div>
                       <select style='width:201px; ' onchange="goto_site(this)">
                       		<option value="http://www.moe.edu.cn" >——————————————</option>
                            <option value="http://www.moe.edu.cn" >中华人民共和国教育部</option>
                       </select>
                </div>
        </div>
         <div id="teacher_list">
         	      <div id="headPho_top">
                        <font>
                            教学名师
                        </font>
                    </div>
                    <div id="Pho_button_left">
                        <img onclick="moveheadPho('left')" src="img/bt_left.png" style="margin-top:43px; margin-left:50px;"/>
                    </div>
                    <div id="headPho" class="_headPho">
                        
                        <div id="headPho_all">  
                           <?php foreach($TeacherRcmd as $k=>$v){?>
                	    <div id="headPho_one">
                      <img src=<?php  echo substr($v['picture'],6) ?> />
                      <?php echo "<a target=_blank href=\"";
                            echo $v['link']? $v['link']:'./teacher/teacher_info.php?id='.$v['teacher_id'];
                            echo "\">{$v['name']}</a>" ;?>
                      </div>
               <?php }?> 
                        </div>
                       
           		 	</div>
             		<div id="Pho_button_right">
             			<img onclick="moveheadPho('right')" src="img/bt_right.png" style="margin-top:43px; margin-left:37px;" />
             		</div>
         </div>
    </div>
    <div id="foot">
    	<?php include_once('./globals/foot.php'); ?>
    </div>
</div>
</body>
</html>
