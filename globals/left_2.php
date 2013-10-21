<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

include_once('globals.php');
require_once("inc/dataCourse.php");
include_once('inc/controllers/getCourse.php');
include_once('inc/dataInformation.php');
$CourseGroup=new CourseGroup(); 
$Course=new dataCourse();
$Data=$Course->getAllCourse();
$year=$CourseGroup->Group("year",$Data);
$direction=$CourseGroup->Group("direction",$Data);
$db=new dataInformation;
$notice=$db->SelectByType(constant("CENTER_NOTICE"));
shuffle($Data);

?>
<script type="text/javascript">
function loadXMLDoc(i)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content0").innerHTML=xmlhttp.responseText;
	 document.getElementById("teacher_list").innerHTML="";
    }
  }
xmlhttp.open("GET","./courst_list.php?"+i,true);
//xmlhttp.open("GET","./notice_list.php?id="+i,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
function loadXMLDoc_list(i)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content0").innerHTML=xmlhttp.responseText;
	 document.getElementById("teacher_list").innerHTML="";
    }
  }
//xmlhttp.open("GET","./courst_list.php?"+i,true);
xmlhttp.open("GET","./notice_list.php?id="+i,true);
xmlhttp.send();
}
</script>
<div id="left">
        	<div id="www_zzjs_net" class="zzjs_net">
              	<dl class="on">
    				<dt><a href="#" onclick="loadXMLDoc_list(1)">学院通知</a></dt>
    				<dd>
                    	<ul class="nav">  
            				<?php
							 $count=0;
							 foreach($notice as $k=>$v){?>
                                     <li><span ><a href=<?php echo '"./notice.php?id='.$v['id'].'"'?>><?php echo "&nbsp".substr($v['title'],0,30)?></a></span> <span><img src="./img/new.gif"/></span>
</li>
                                    <?php if(++$count>6)break;}?>
                     
                        </ul>
                  </dd>
                       
  				</dl>
            	<dl>
    				<dt><a href="#" onclick="loadXMLDoc(1)">课程名</span></a></dt>
                    <dd>
                    	<ul class="nav">  
            				   <?php 
							   		$count=0;
							   		foreach($Data as $k=>$v){
								   	echo '<li><a href=./course/index.php?id='.$v['course_id'].'>&nbsp;'.$v['name'].'</a></li>';
									if(++$count>6)break;									
								   }?> 
                        </ul>
               
                    </dd>
                </dl>
                
  				<dl >
    				<dt><a href="#"  onclick="loadXMLDoc('year=1')">博士生</a></dt>
    				 <dd>
                    	<ul class="nav">  
            				   <?php
							   		
									if(is_array($year[1]))
							   		foreach($year[1] as $v){								   
								   	echo '<li><a href=./course/index.php?id='.$v['course_id'].'>&nbsp;'.$v['name'].'</a></li>';									
								   }?> 
                        </ul>
               
                    </dd>
  				</dl>
  				<dl>
    				<dt><a href="#"  onclick="loadXMLDoc(1)">硕士生</a></dt>
    				<dd>
                    	<ul class="nav">  
                        
                        
            			<?php
									
                                    foreach(array_keys($year) as $v){
										if($v==1)continue;
										echo "<li>";
										echo '<a href="#" onclick="loadXMLDoc(\'year='.$v.'\')" >';                                   
                                         $msg="";  
                                         $v=intval($v);
                                           switch($v){                                          
                                           case 2:
                                             $msg="工学硕士";
                                             break;                                             
                                           case 3:
                                             $msg="计算机科学硕士";
                                             break;
                                           case 4:
                                             $msg="软件工程硕士";
                                             break;
                                           case 5:
                                             $msg="在职工程硕士";
                                             break;                                       
                                         }
                                         echo '&nbsp;'.$msg.'</a></li>';
                                    }
                                     ?>
                        </ul>
                    </dd>
 				 </dl>

  				<!--<dl>
    				<dt>站长特效五号菜单</dt>
    				<dd>！</dd>
  				</dl>-->
			</div>
 </div>
 <script language="javascript">
function slide_zzjs_net(e){
   for(var r=document.getElementById(e).getElementsByTagName('dl'),c=clearInterval,i=-1,p=r[0],j; j=r[++i];){
       j.style.height=(i?30:312)+'px';
       j.onmouseover=function(){clearTimeout(j);var i=this;j=setTimeout(function(){if(p!=i)_(p,312,30)(p=i,30,312)},200)};
   }
   function _(el,f,t){
       c(el.$1);el.className=f>t?'':'on';
       return el.$1=setInterval(function(){el.style.height=(f+=Math[f>t?'floor':'ceil']((t-f)*.3))+'px';if (f==t)c(el.$1)},10),_
   }
};
new slide_zzjs_net( "www_zzjs_net");
</script>
