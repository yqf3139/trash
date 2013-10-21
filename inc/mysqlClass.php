<?php
  class Mysqls{
	private $dblink='';//数据库连接
	private $config = array('host'=>"127.0.0.1",'username'=>"root",'password'=>"3139",'dbname'=>"website_database");//当前使用
	
	function __construct(){
	}
	function query($sql,$affect_num=false){//affect_num:是否返回影响行数
		if(!$this->dblink){//只有执行sql的时候才有数据库链接
			$this->dblink = mysql_connect($this->config['host'],$this->config['username'],$this->config['password']) or die('连接失败:' . mysql_error());
			mysql_select_db($this->config['dbname'],$this->dblink) or die('连接失败:'.mysql_error());
			mysql_query("set names utf8",$this->dblink);
		}
 //   $sql=mysqli_real_escape_string($dblink,$sql);
		$res = mysql_query($sql,$this->dblink);
		if($affect_num){
			return $res?mysql_affected_rows($this->dblink):0;
		}
		return $res;
	}
	function getRow($sql){	//取出一条数据
		$query = $this->query($sql);
		$data = mysql_fetch_array($query,MYSQL_ASSOC);
		return $data?$data:array();
	}
	function getRows($sql){		//取出多条数据
		$query = $this->query($sql);
		$data = array();
		while($row = mysql_fetch_array($query,MYSQL_ASSOC)){
			$data[] = $row;
		}
		return $data;
	}
  
	function insert($table, $data,$return = false,$debug=false) {//插入数据,debug为真返回sql
		if(!$table) {
			return false;
		}
		$fields = array();
		$values = array();
		foreach ($data as $field => $value){
			$fields[] = '`'.$field.'`';
			$values[] = "'".addslashes($value)."'";
		}
		if(empty($fields) || empty($values)) {
			return false;
		}
		$sql = 'INSERT INTO `'.$table.'` 
				('.join(',',$fields).') 
				VALUES ('.join(',',$values).')';
		if($debug){
			return $sql;
      }
		$query = $this->query($sql);
		return $return ? mysql_insert_id() : $query;
	}
	function update($table, $condition, $data, $limit = 1,$debug=false) {//更新数据
		if(!$table) {
			return false;
		}
		$set = array();
		foreach ($data as $field => $value) {
			$set[] = '`'.$field.'`='."'".addslashes($value)."'";
		}
		if(empty($set)) {
			return false;
		}
		$sql = 'UPDATE `'.$table.'` 
				SET '.join(',',$set).' 
				WHERE '.$condition.' '.
				($limit ? 'LIMIT '.$limit : '');
		if($debug){
			return $sql;
		}
		return $this->query($sql);
	}
  function getAttribute($table){
    $sql="select *from `{$table}` limit 1";
    $data=$this->query($sql);
    $res=array();
    for($i=0; @mysql_field_name($data,$i);$i++) 
      $res[mysql_field_name($data,$i)]=mysql_field_type($data,$i);
    return $res;
  }
  /*
	function getPage($sql,$page,$limit,$param=null){
		if(is_numeric($sql)){
			$total = $sql;
		}else if($sql){
			$temp = $this->getRow($sql);
			$total = $temp['total'];
		}else{
			return '';
		}
		if($total <= $limit){
			return '';	
		}
		$total_page = ceil($total/$limit);
		$start_page = $page>3?$page-3:1;
		$end_page = $page+5<$total_page?($page+5):$total_page;
		
		$html = "<div class=\"page clearfix\"> <a href=\"?page=1{$param}\" target=\"_self\">首页</a>";
		for($pg=$start_page;$pg<=$end_page;$pg++){
			if($page==$pg){
				$html.=" <span class=\"cur\">{$pg}</span> ";
			}else{
				$html.=" <a href=\"?page={$pg}{$param}\" target=\"_self\">{$pg}</a> ";
			}
		}
		$npage=$page+1;
		if($npage<=$total_page){
			$html.="<a href=\"?page={$npage}{$param}\" target=\"_self\">下一页</a> ";
		}
//		$html.="<a href=\"?page={$total_page}{$param}\" target=\"_self\">末页</a> ";
		$html.='</div>';
		return $html;
	}
	function getAjaxPage($sql,$page,$limit,$jsfun){//获取ajax切换用的分页,jsfun:getPost(1,3,0,page)前面参数自定义，page统一
		if(is_numeric($sql)){
			$total = $sql;
		}else if($sql){
			$temp = $this->getRow($sql);
			$total = $temp['total'];
		}
		
		if($total <= $limit){
			return '';	
		}
		$total_page = ceil($total/$limit);
		$start_page = $page>3?$page-3:1;
		$end_page = $page+5<$total_page?($page+5):$total_page;
		
		$html = '<div class="page clearfix"><a href="javascript:void(null);" onclick="'.str_replace('page',1,$jsfun).';">首页</a>';
		for($pg=$start_page;$pg<=$end_page;$pg++){
			if($page == $pg){
				$html .= '<span class="cur">'.$pg.'</span>';
			}else{
				$html .= ' <a href="javascript:void(null);" onclick="'.str_replace('page',$pg,$jsfun).';">'.$pg.'</a> ';
			}
		}
		$npage = $page+1;
		if($npage <= $total_page){
			$html .= '<a href="javascript:void(null);" onclick="'.str_replace('page',$npage,$jsfun).';">下一页</a> ';
		}
		$html .= '<a href="javascript:void(null);" onclick="'.str_replace('page',$total_page,$jsfun).';">末页</a> ';
		$html .= '</div>';
		return $html;
	}
   */
}
