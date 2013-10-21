<?
	session_start();
	if($_POST[check])
	{
		if($_POST[check]==$_SESSION[check_pic])
		{echo "ok";}
		else
		{echo "error";}
	}
?>

<form action="" method="post">
	<img src="validate.php"><br>
    <input type="text" name="check"><br>
    <input type="submit" value="提交"><br>
</form>