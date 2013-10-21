<script type="text/javascript">
function show_info()
{
	var _show=document.getElementById("show");
	//alert(_show.checked);
	if(_show.checked==true)
	{
		var _info=document.getElementById("info");
		_info.value="1";
	}
	else
	{
		var _info=document.getElementById("info");
		_info.value="0";
	}
}
function showlink()
{
	var checked = document.getElementById("outlink").checked;
	if(checked==true)
	{
		var _link=document.getElementById("_link");
		_link.style.visibility="visible";
		var _info_link=document.getElementById("info_link");
		_info_link.value="1";
	}
	else
	{
		var _link=document.getElementById("_link");
		_link.style.visibility="hidden";
		var _info_link=document.getElementById("info_link");
		_info_link.value="0";
	}	
}
</script>
<script>
	function checkinput()
	{
		var t=document.getElementById('name');
		 if(!t.value)
		 {
			 alert('标题不能为空');
			 return false;
		 }
		 if (confirm("您确定添加?")) {
		 return true; 
		 }
		else {
		 return false; 
		 }
	}
</script>
<div id="add" >
    <form action="../../sub/AddCourse.php" method="POST" onsubmit = "return checkinput()"> 
    <table id="table" align="center" style="width:600px;">
     <input type="hidden" name="table" value="course"/>
	 <input type="hidden" value="1" id="info"/>
		<tr><td><span>课程名<span style="color:red">（必须填写）</span></span></td><td><input type="text" name="name" id="name"/></td></tr>
        <tr><td><span>课程描述<span style="color:red">（老师可以自己填写）</span></span></td><td><textarea rows="10" cols="30" name="description"></textarea></td></tr> 
        <tr><td><span>是否发布</span></td><td align="left"><input id="show" type="checkbox" checked='checked' name='available' value="1" onclick="show_info()"/></td></tr> 
        <tr><td><span>是否需要外链</span></td><td align="left"><input type="checkbox" id="outlink"   onclick="showlink()"/>
            <div id="_link" style="display:inline; visibility:hidden">链接：<input type="text" name="link" /></div> <input type="hidden"  id="info_link" value="0"/>
			</td></tr> 
            
        <tr><td><span>分类</span></td><td align="left"><select  hidefocus name="year">
             <option value=2>工学硕士
             <option value=3>计算机科学硕士
             <option value=4>软件工程硕士
             <option value=5>在职工程硕士
             <option value=1>博士生
             </select></td></tr>
        <tr><td colspan="2"><input type="submit" name='sub' value="提交"/></td></tr>
    </table>
    </form>
</div>
