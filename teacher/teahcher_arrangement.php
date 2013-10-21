<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研究生课程中心</title>
<link rel="stylesheet" type="text/css" href="../style/teacher_arrangement.css" />
<link rel="stylesheet" type="text/css" href="../style/main_menu.css" />
<link rel="stylesheet" type="text/css" href="../style/foot.css" />
<script language="javascript">// Example: obj = findObj("image1");
function findObj(theObj, theDoc)
{ 
var p, i, foundObj; 
if(!theDoc) theDoc = document; 
if( (p = theObj.indexOf("?")) > 0 && parent.frames.length) 
{    theDoc = parent.frames[theObj.substring(p+1)].document;    theObj = theObj.substring(0,p); } if(!(foundObj = theDoc[theObj]) && theDoc.all) foundObj = theDoc.all[theObj]; for (i=0; !foundObj && i < theDoc.forms.length; i++)     foundObj = theDoc.forms[i][theObj]; for(i=0; !foundObj && theDoc.layers && i < theDoc.layers.length; i++)     foundObj = findObj(theObj,theDoc.layers[i].document); if(!foundObj && document.getElementById) foundObj = document.getElementById(theObj);    return foundObj;
}
//添加一个参与人填写行
function AddSignRow(){ //读取最后一行的行号，存放在txtTRLastIndex文本框中 
var txtTRLastIndex = findObj("txtTRLastIndex",document);
var rowID = parseInt(txtTRLastIndex.value);

var signFrame = findObj("SignFrame",document);
//添加行
var newTR = signFrame.insertRow(signFrame.rows.length);
newTR.id = "SignItem" + rowID;

//添加列:周数
var newNameTD=newTR.insertCell(0);
//添加列内容
newNameTD.innerHTML = newTR.rowIndex.toString();

//添加列:教学内容
var newNameTD=newTR.insertCell(1);
//添加列内容
newNameTD.innerHTML = "<input name='Description[]"  + "' id='Description" + rowID + "' type='text' size='60' />";

//添加列:讲科学时
var newEmailTD=newTR.insertCell(2);
//添加列内容
newEmailTD.innerHTML = "<input name='CourseTime[]"+ "' id='CourseTime" + rowID + "' type='text' size='20' />";

//添加列:实验学时
var newTelTD=newTR.insertCell(3);
//添加列内容
newTelTD.innerHTML = "<input name='ExpTime[]"+ "' id='ExpTime" + rowID + "' type='text' size='10' />";




//添加列:删除按钮
var newDeleteTD=newTR.insertCell(4);
//添加列内容
newDeleteTD.innerHTML = "<div align='center' style='width:40px'><a href='javascript:;' onclick=\"DeleteSignRow('SignItem" + rowID + "')\">删除</a></div>";

//将行号推进下一行
txtTRLastIndex.value = (rowID + 1).toString() ;
}
//删除指定行
function DeleteSignRow(rowid){
var signFrame = findObj("SignFrame",document);
var signItem = findObj(rowid,document);

//获取将要删除的行的Index
var rowIndex = signItem.rowIndex;

//删除指定Index的行
signFrame.deleteRow(rowIndex);

//重新排列序号，如果没有序号，这一步省略
for(i=rowIndex;i<signFrame.rows.length;i++){
signFrame.rows[i].cells[0].innerHTML = i.toString();
}
}//清空列表
function ClearAllSign(){
if(confirm('确定要清空吗？')){
var signFrame = findObj("SignFrame",document);
var rowscount = signFrame.rows.length;

//循环删除行,从最后一行往前删除
for(i=rowscount - 1;i > 0; i--){
   signFrame.deleteRow(i);
}

//重置最后行号为1
var txtTRLastIndex = findObj("txtTRLastIndex",document);
txtTRLastIndex.value = "1";

//预添加一行
AddSignRow();
}
}
</script>


</head>

<body>
	<div id="all">
    	<?php
		 include_once('../course/formwork/main_menu.php');
			$data=$course->getInformation('ARRANGEMENT');
			$data=$data[0];
			if(!empty($data['description']))
			$arrangement=explode(';;',$data['description']);
			//var_dump($arrangement);
			//var_dump($data);
			
		 ?>
    	<div id="body1">
        	<div id="position">
            	<table style="width:100%; height:100%;">
            		<tr><td><span>你现在的位置：</span><span><a href="../course/?id=<?php echo $course->__get('id'); ?>"><?php echo $course->__get('name'); ?></a>--></span><span><a href="./?id=<?php echo $course->__get('id');?>">老师</a>--></span><span><a href="">教学安排</a></span><td align="right"><span><a href="../logout.php?id=<?php echo $course->__get('id'); ?>">【退出】</a></span></td></tr>
            	</table>
        	</div>
            <div id="message">
            	<div align="center">
                <form action="../sub/AddArrangement.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>"  />
				<table width="613" border="0" cellpadding="2" cellspacing="1" id="SignFrame" >
                  <tr id="trHeader">
                    <td width="5%" bgcolor="#96E0E2">周数</td>
                    <td width="65%" bgcolor="#96E0E2">教学内容</td>
                    <td width="10%" bgcolor="#96E0E2">讲课学时</td>
                    <td width="10%" bgcolor="#96E0E2">实验学时</td>
                    <td width="10%" align="center" bgcolor="#96E0E2">&nbsp;</td>
                  </tr>
                  <?php 
				  if(is_array($arrangement))
				  foreach($arrangement as $k=>$v){
					  if(!empty($v)){
					  echo '<tr>';
					  ++$k;
					  echo "<td>$k</td>";
					  $oneRecord=explode('||',$v);
					  echo "<td><input name=Description[] type='input'  value='{$oneRecord[0]}'  /></td>";
					  echo "<td><input name=CourseTime[] type='input'  value='{$oneRecord[1]}'  /></td>";
					  echo "<td><input name=ExpTime[] type='input'  value='{$oneRecord[2]}'  /></td>";
					  echo '</tr>';
					  }
				  }
				  ?>
                  
        		</table>
                
               
                  <input type="submit" name="sub" value="提交"  />
                
                 </form>
                  <input type="button" name="Submit" value="添加" onclick="AddSignRow()" /> 
                  <input type="button" name="Submit2" value="清空" onclick="ClearAllSign()" />
                  <input name='txtTRLastIndex' type='hidden' id='txtTRLastIndex' value="1" />
   			</div>
     

            </div>
      </div>
        <?php include_once('../globals/foot.php');?>
    </div>
</body>
</html>
