<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<body>
	<?php require 'inc/header.php' ?>
    <!--获取笑话-->
    <?php
		@$titleid=isset($_GET['titleid'])?$_GET['titleid']:1;
		$sql="select * from contents where title=$titleid order by id desc";
		$res=mysql_query($sql);
	?>
    <table >
  <tr>
    <th>编号</th>
    <th>内容</th>
    <th>作者</th>
  </tr>
  <?php while($rows=mysql_fetch_assoc($res)): ?>
  
  <tr>
    <td><?php echo $rows['id'] ?></td>
    <td><?php echo $rows['contents'] ?></td>
    <td><?php echo $rows['author'] ?></td>
  </tr>
  <?php endwhile ?>
  
  
</table>

</body>
</html>