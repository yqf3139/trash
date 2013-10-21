<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../style/foot.css" type="text/css" />
<?php 
include_once('../inc/dataTeacher.php');
$id=intval($_GET['id'])?intval($_GET['id']):0;
if(!$id){
  echo "<script>alert('该老师不存在')</script>";
  die();
}
$db=new dataTeacher;
$res=$db->selectbyPkey($id);
if(empty($res)){
  echo "<script>alert('该老师不存在')</script>";
	die();
}
?>
  <title><?php echo $res['name']?></title>
<style>
body
{
	margin:0px;
	padding:0px;
	background-color:#CCC;
}
#all
{
	margin:0 auto;
	padding:0;
	width:1010px;
	height:900px;
	background-color:#fff;
}
#table
{
	margin:0 auto;
	width:670px;
	font: 12px Arial, Helvetica, sans-serif;
}

#table th
{
	color: #0e4d8b;
	font-weight: normal;
	border: 1px #98b1c8 solid;
	text-align: right;
	padding: 5px 15px 5px 10px;
	white-space: nowrap;
	vertical-align: top;
}

#table  td
{
	margin:0 auto;
	width:670px;
	border:1px solid #98b1c8 ;
}
</style>
</head>

<body>
<div id="all">
	<?php //include_once('./course/formwork/main_menu.php'); ?>
<div style="height:870px;">
    <div align = "center"><font size="6"><?php echo $res['name']?><br /></font></div>
    <div style="line-height:125%" align="center">
    <table border=0 cellspacing=0 cellpadding=0 align=center>
    <tr> <td width=1%>&nbsp;</td><td width=99%>&nbsp;</td></tr>
    <tr> <td width=1%></td></tr>
    <tr><td width=99%><font color=blue><strong>基本信息</strong></font></td></tr>
    </table>
    <table border=1 cellpadding=0 cellspacing=0 bordercolordark=#FFFFFF width="70%">
    <tr><td rowspan=5 align=center width="15%" ><img width=100 src="<?php echo substr($res['picture'],3)?>"></td><td align=center>姓 名：</td><td align=center><?php echo $res['name']?></td></tr><tr bgcolor=#FFFFFF><td align=center>性 别：</td><td align=center><?php echo $res['sex']?></td></tr>
    <tr bgcolor=#FFFFFF><td align=center>职 称：</td><td align=center><?php echo $res['title']?></td></tr>
    <tr bgcolor=#FFFFFF><td align=center>电子邮件：</td><td align=center><?php echo $res['email']?></td></tr>
    <tr bgcolor=#FFFFFF><td colspan="2">&nbsp;</td></tr>
   <tr height="100px"><td>简介：</td><td colspan="2"><textarea name="description" style="width:99%; height:100px"  ><?php echo $res['description']?></textarea></td></tr>
    </table>         
    </div>

</div>
     <div id="foot" >
            <?php //include_once('./globals/foot.php'); ?>
     </div>
</div>
</body>
</html>
