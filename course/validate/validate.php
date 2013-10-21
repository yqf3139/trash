<?php
	//echo rand(1,4);
	//echo dechex(14);
	session_start();	
	for($i=0;$i<4;$i++)
	{
		$rand.=dechex(rand(1,15));
	}
	$_SESSION[check_pic]=$rand;
	$im=imagecreatetruecolor(100,30);
	
	//set color
	$bg=imagecolorallocate($im,0,0,0);
	$te=imagecolorallocate($im,255,255,255);
	for($i=0;$i<3;$i++)
	{
		$te1=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imageline($im,rand(0,100),0,100,30,$te1);
	}
	for($i=0;$i<100;$i++)
	{
		imagesetpixel($im,rand()%100,rand()%30,$te);
	}
	imagestring($im,rand(4,6),rand(5,70),rand(0,16),$rand,$te);
	
	header("Content-type:image/jpeg");
	imagejpeg($im);
	
?>

