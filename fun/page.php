<?
	function _PAGEFT($totle, $displaypg = 20, $url = '') {

		global $page, $firstcount, $pagenav, $_SERVER;

		$GLOBALS["displaypg"] = $displaypg;

		if (!$page)
			$page = 1;
		if (!$url) {
			$url = $_SERVER["REQUEST_URI"];//http://www.123.com/index.php/Mymodle/page/conn.php  得到index.php/Mymodle/page/conn.php
		}
			//echo $url;
		//URL分析：
		$parse_url = parse_url($url);
		//print_r($parse_url);
		if(isset($parse_url["query"]))
			$url_query = $parse_url["query"]; //单独取出URL的查询字串
		//echo $url_query;//page=2
		if (isset($url_query)) {
			//echo $url_query;
			$url_query = ereg_replace("(^|&)page=$page", "", $url_query);
			//echo $url_query;
			//echo $parse_url["query"];//page=2
			$url = str_replace($parse_url["query"], $url_query, $url);
			//echo $url;
			if ($url_query)
				$url .= "&page";
			else
				$url .= "page";
		} else {
			$url .= "?page";
		}
		//echo $url;
		$lastpg = ceil($totle / $displaypg); //最后页，也是总页数
		$page = min($lastpg, $page);
		$prepg = $page -1; //上一页
		$nextpg = ($page == $lastpg ? 0 : $page +1); //下一页
		$firstcount = ($page -1) * $displaypg;

		//开始分页导航条代码：
		$pagenav = "显示第 <B>" . ($totle ? ($firstcount +1) : 0) . "</B>-<B>" . min($firstcount + $displaypg, $totle) . "</B> 条记录，共 $totle 条记录";

		//如果只有一页则跳出函数：
		if ($lastpg <= 1)
			return false;

		$pagenav .= " <a href='$url=1'>首页</a> ";
		if ($prepg)
			$pagenav .= " <a href='$url=$prepg'>前页</a> ";
		else
			$pagenav .= " 前页 ";
		if ($nextpg)
			$pagenav .= " <a href='$url=$nextpg'>后页</a> ";
		else
			$pagenav .= " 后页 ";
		$pagenav .= " <a href='$url=$lastpg'>尾页</a> ";

		//下拉跳转列表，循环列出所有页码：
		$pagenav .= "　到第 <select name='topage' size='1' onchange='window.location=\"$url=\"+this.value'>\n";
		for ($i = 1; $i <= $lastpg; $i++) {
			if ($i == $page)
				$pagenav .= "<option value='$i' selected>$i</option>\n";
			else
				$pagenav .= "<option value='$i'>$i</option>\n";
		}
		$pagenav .= "</select> 页，共 $lastpg 页";
	}
?>