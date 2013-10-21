<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_add_resource.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<?
include_once('../fun/page.php');

?>
</head>

<body>
	<div id="all">
    	<?php include_once('../course/formwork/main_menu.php');
		$data=$course->GetInformation('RESOURCE');
		$page=intval($_GET['page']);
  if(!empty($page))
  for($i=0;$i<($page-1)*7;++$i)
  next($data);
		 ?>
    	<div id="body">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="">资源发布</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
           <div id="resource">
				<table id="resource_list" align="center">
                	<tr><th width="20%">编号</th><th width="50%">资源</th><th width="15%">下载</th><th width="15%"></th></tr>
                     <?php for($i=0;$i<7;$i++,next($data)){ $v=current($data); if(!$v)break;?>
                    <tr align="center">
                    	<td>1</td>
                    	<td><?php echo $v['title']; ?></td>
                    	<td><a href="<?php echo $v['link']; ?>">点击下载</a></td>
                        <td>
                            <form action="../sub/DeleteInfo.php" method="post">
                            <input type='hidden' name="id" value="<?php echo $v['id'];?>" />
                            <input type="submit" name="sub" value="删除" />
                            </form>
                        </td>
                    </tr>
                    <?php }?>
                    <tr align="center"><td colspan="4"><a href="./teacher_add_res.php?id=<?php echo $course->__get('id');?>">添加</a></td></tr>
                    <tr><td align="center" colspan="4">
                     <?
						_PAGEFT(count($data),7);
						 echo $pagenav;
					   ?>
                    </td></tr>
                </table>
                
            </div>
      </div>
        <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>
