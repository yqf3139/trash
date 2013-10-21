<?php 
include_once('../../inc/dataInformation.php');
$PictureDb=new dataInformation();
$DataPicture=$PictureDb->SelectByType(7);
?>
<script type="text/javascript" language="javascript">
function check()
{
	var t=document.getElementById('link');
	var pic=document.getElementById('picture');
	if(t.value&&pic.value)
	{
		var str = t.value.substr(0,4);
		if(str != "http")
		{
			alert("请输入完整地址，如:http://www.seu.edu.cn");
			return false;
		}
		return true;
	}
	else
	{
		alert('链接和图片不能为空');
		return false;
	}
}
function disappear()
{
	//alert("hehe");
	fa.removeChild(w);
	isload=false;
}
var fa;
var w;
var isload=false;
function alter(num)
{
	fa=document.getElementById("right");
	//alert("hehe");
	if(isload==false)
	{
			w=document.createElement("div");
			//下面一组style属性控制了模拟窗口的样式
			//DOM提供的style属性可以很方便地让JavaScript控制元素的展现方式
			w.style.margin="auto";
			w.style.height=200;
			w.style.width=300;
			w.style.background="#00ffff";

			
			//通过appendChild()方法将创建的div元素对象添加到body的内容中去
			w.innerHTML+=("<center><form name=modifypicture enctype='multipart/form-data' method='post' action='../../sub/ModifyPicture.php' style=\"margin:30px;\" onsubmit='return check()'>&nbsp;&nbsp;链&nbsp;接&nbsp;<span style='color:red'>（输入您想链接的地址）</span>：<input type='text' name='link' id='link' /><br />图&nbsp;片&nbsp;：<input type='file' name='picture' id='picture'/><br /><input type='hidden' name='id' value='"+num+"' /><input type='submit' name='sub' value='提交' /></form><input type='button' value='取消' onclick='disappear()';/></center>");
			//document.body.appendChild(w);
			fa.appendChild(w);
			//fa.removeChild(w);
			isload=true;
	}
}
</script>
    <h4>图片修改<span style="color:red">（首页的图片，只能为五张）</span></h4>
        	<table>
            	<tbody>
                    <tr><td><?php echo $DataPicture[0]['link']? $DataPicture[0]['link']:"未上传";?></td><td><input type="button" value="修改" onclick='alter(1)'/></td></tr>
                    <tr><td><?php echo $DataPicture[1]['link']? $DataPicture[1]['link']:"未上传";?></td><td><input type="button" value="修改" onclick="alter(2)"/></td></tr>
                    <tr><td><?php echo $DataPicture[2]['link']? $DataPicture[2]['link']:"未上传";?></td><td><input type="button" value="修改" onclick="alter(3)"/></td></tr>
                    <tr><td><?php echo $DataPicture[3]['link']? $DataPicture[3]['link']:"未上传";?></td><td><input type="button" value="修改" onclick="alter(4)"/></td></tr>
                    <tr><td><?php echo $DataPicture[4]['link']? $DataPicture[4]['link']:"未上传";?></td><td><input type="button" value="修改" onclick='alter(5)'/></td></tr>
                </tbody>
            </table>
