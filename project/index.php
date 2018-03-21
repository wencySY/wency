<?php
	//首页功能
	//加载公共文件
	include_once 'public/public.php';
	
	//加载mysql的初始化文件
	include_once 'public/mysql.php';
	
	//获取分页相关信息
	//获取页码
	$page=isset($_GET['page'])?$_GET['page']:1;
	
	//设定每页显示的数据量
	$length=3;
	
	//求出分页偏移量
	$offset=($page-1)*$length;
	
	//获取总记录数
	$sql="select count(*) as c from 
	pr_student as s left join pr_class as c on s.c_id=c.id";
	$res=my_error($sql);
	$count=mysql_fetch_assoc($res);//这是结果集  需要解析
	$counts=$count['c'];		//总记录数
	//总页数
	$pages=ceil($counts/$length);
	
	//求出上一页和下一页对应的页码
	$prev=$page>1 ? $page-1 : 1;
	$next=$page<$pages ? $page+1 : $pages;
	
	//组织SQL语句查询所有学生信息
	$sql="select s.*,c.c_name,c.room from 
	pr_student as s left join pr_class as c on s.c_id=c.id
	order by s.id
	limit {$offset},{$length}";
	
	//执行
	$res=my_error($sql);
	//取出所有数据
	$student=array();
	while($row = mysql_fetch_assoc($res)){
		$student[]=$row;
	}
	//加载模板显示数据
	include_once 'html/index.html';
?>