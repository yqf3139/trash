<?php
$imgae='titleone-1.png';
$img=GetImageSize($imgae);
$string='编译原理';
switch($img[2])
{
	case 1:
	$im=@ImageCreateFromGIF($imgae);
	break;
	case 2:
	$im=@ImageCreateFromJPEG($imgage);
	break;
	case 3:
	$im=@ImageCreateFromPNG($imgae);
	break;
}

$te=imagecolorallocate($im,23,100,150);
//$str=iconv('gbk','UTF-8',$string);
imagettftext($im,55,0,140,60,$te,"STXINGKA.TTF",$string);
header("Content-type:image/png");
//imagepng($im,'./1.png');
imagepng($im);
?>