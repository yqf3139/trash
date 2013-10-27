<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="../../style/head.css"/>
<link rel="stylesheet" type="text/css" href="../../style/bs_login.css"/>
<link rel="stylesheet" href="../../style/foot.css"  type="text/css"/>
<link rel="stylesheet" href="../../style/bs_notice.css"  type="text/css"/>
<script>
	function checkinput()
	{
		 if (confirm("您确定删除?")) {
		 return true; 
		 }
		else {
		 return false; 
		 }
	}
</script>
</head>
<?php 
 	include_once('../../inc/dataInformation.php');
	$db=new dataInformation;
	$data=$db->SelectByType(constant("CENTER_NOTICE"));
	if(isset($_GET['page']))
        $page=intval($_GET['page']);
    if((!empty($page))&&isset($page))
 			for($i=0;$i<($page-1)*15;++$i)
  			   next($data);
?>
<body>
	<div id="all">
		<?php include_once('../../globals/head.php'); ?>
       <div id="body">
            <div id="body_top">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../../">首页</a>--></span><span><a href="../">后台管理</a>--></span><span><a href="">学院通知</a></span></td><td align="right"><span><a href="">【退出】</a></span></td></tr>
            	</table>
            </div>
            <div id="left">
               <?php include_once('../bs_module/manage_left.php'); ?>
            </div>
            <div id="right" class="_right" align="center">
            	<div id="change" align="center">                	
                   <table id="table">
                    	<tr><th>编号</th><th>标题</th><th>发布日期</th><th></th></tr>
                        <?php  if(is_array($data))for($i=0;$i<15;$i++,next($data)){ $v=current($data); if(!$v)break; ?>
                        <tr><td><?php echo $v['id']; ?></td><td><a href="./bs_notice_alter.php?id=<?php echo $v['id'] ?>"><?php echo $v['title'];?></a></td><td><?php echo $v['settime']?></td>
                        <td>
                        <form action="../../sub/DeleteInfo.php" method="post" onsubmit = "return checkinput()" >
                        <input type="hidden" name="id" value="<?php echo $v['id']?>" />
                        <input type="submit" name='sub' value="删除" />
                        </form>
                        </td>
                        </tr>
                        <?php }?>
                        
                        <tr><td colspan="4"><a href="./bs_notice_add.php">添加</a></td></tr>
                        <tr><td colspan="4">
                        </td></tr>
                    </table>
                </div>
            </div>
        </div>
         <?php include_once('../../globals/foot.php'); ?>
    </div>
</body>
</html>