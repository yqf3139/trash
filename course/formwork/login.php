
   <div id="body_top">
    	<div id="login">
   
            	<!--用户名：<input type="text" name="user_name" style="width:100px"/><br />
                密&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" style="width:100px" /><br />
                
                验证码：<input type="text" name="check" style="width:50px" />  <br />
              	<img src="../validate/validate.php" style="width:100px; height:30px"/> 
                <input type="submit" value="登陆" />-->
                <table id="login_table" >
                <form action="../sub/LoginSub.php" method="post">
                    <input type="hidden" name="type" value="2" />
                    <input type="hidden" name="course_id" value="<?php echo $_GET['id'];?>" />
                	<tr><td align="left">&nbsp;用户名</td><td align="left"><input type="text" name="username" style="width:100px; border:1px #666666 solid" id="username"/></td></tr>
                    <tr><td align="left">&nbsp;密&nbsp;&nbsp;码</td><td align="left"><input type="password" name="pwd" style="width:100px; border:1px #666666 solid" id="password" /></td></tr>
                    <tr><td align="left">&nbsp;验证码</td><td align="left"> <img src="ShowKey.php" name="KeyImg" id="KeyImg"  onClick="KeyImg.src='ShowKey.php?'+Math.random()"> </td></tr>
                    <tr><td align="left" colspan="2">&nbsp;&nbsp;<input type="text" name="check" style="width:50px;; border:1px #666666 solid" />
                    <input type="button" value="换一张" onclick="KeyImg.src='ShowKey.php?'+Math.random()"/></td></tr>
					<tr><td colspan="2"><input type="submit" value=" 登陆 " name="sub" style="font-size:20px;background:#cccccc;"/></td></tr>
                </form>
                </table>
               
               
              
          
        </div>
        <div id="Pic">
        	<!--<img src="../img/Yellow.jpg"/>-->
        </div>
    </div>