<html>
	<head>
		<title>user found</title>
	</head>
	<body>
		<h2>user found from mysql database.</h2>
		<?php
			$username=$_POST['username'];
			if(!$username){
				echo "error:There is no data passed.";
				exit;
			}
			//进行转义操作,对名字
			if(!get_magic_quotes_gpc()){
				$username=addslashes($username);
			}
			@ $db=mysqli_connect('localhost','root','','mydatabase');
			if(mysqli_connect_errno()){
				echo "error:could not connect to mysql database.";
				exit;
			}
			
			$sql="select * from my_student where name='".$username."'";
			$result=mysqli_query($db,$sql);
			$rownum=mysqli_num_rows($result);
			while($row=mysqli_fetch_assoc($result)){
				
				echo "id:".$row["id"]."<br/>";
				echo "name:".$row["name"]."<br/>";
				echo "number:".$row["number"]."<br/>";
				echo "sex:".$row["sex"]."<br/>";
			} 
			mysqli_free_result($result);
			mysqli_close($db);
			
			function my_error($sql){
				$res=mysqli_query($sql);
				
				if(!$res){
					echo 'SQL语句有语法错误!<br/>';
					echo '错误编码是'.mysql_errno().'<br/>';
					echo '错误信息是:'.iconv('GBK','UTF-8',mysql_errno()).'<br/>';
					exit;
				}
				
				return $res;
			}
		?>
	</body>
</html>