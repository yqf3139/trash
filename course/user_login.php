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
<link rel="stylesheet" href="../style/user_login.css"  type="text/css"/>
</head>

<body>
	<div id="all">
	<div id="top">
    	<div id="top_left">
        </div>
        <div id="top_right_top">
        </div>
    	<?php include_once('./formwork/main_menu.php'); ?>
	</div>
    <div id="body">
    	<div id="position">
                <table style="width:100%; height:100%;">
            	<tr><td><span>您现在的位置：</span><span><a href="">首页</a>--></span><span><a href="">课程中心</a>--></span><span><a href="">数据库</a>--></span><span><a href="">登陆</a></span></td></tr>
            </table>	
         </div>
 	
          <table id="login_table"  align="center">
                	<tr><td align="left">&nbsp;用户名</td><td align="left"><input type="text" name="user_name" style="width:100px"/></td></tr>
                    <tr><td align="left">&nbsp;密&nbsp;&nbsp;码</td><td align="left"><input type="password" name="password" style="width:100px" /></td></tr>
                    <tr><td align="left">&nbsp;验证码<img src="/ProjectTest/course/validate/validate.php" style="width:100px; height:30px"/> </td><td align="left"><input type="text" name="check" style="width:50px" /></td></tr>
					<tr><td colspan="2" align="center"><input type="submit" value="登陆" /></td></tr>                   
          </table>
          
                
    </div>
    <?php include_once('../globals/foot.php'); ?>
</div>

</body>
</html>