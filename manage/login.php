<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理登陆</title>
<link type="text/css" rel="stylesheet" href="../style/manager_login/manager_login.css" />
</head>

<body>
	<div id="all">
    	<div id="login">
        	<img style="width: 341px;height: 84px; margin-top: 10px;" src="../img/manager_login_bg3.png" />
            <div id="login_form">
            	<form action="../sub/LoginSub.php" method="post">
            	<div id="user">
                	<input name="type" type="hidden" value="1" />
                	<input name="username"  type="text" maxlength="50" id="TextBox1" class="textbox" />
                </div>
                <div id="pwd">
                	<input name="pwd" type="password" maxlength="50" id="TextBox2" class="textbox" />
                </div>
                <div id="sub">
                	<span id="Label1" style="float: left; color: Red; width: 235px;"></span>
                    <input type="hidden" name="sub" value="1">
                    <input type="image" name="sub1" id="ImageButton1" value="1" src="../img/manager_login_button.jpg" style="float: right" onclick="submit"/>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
