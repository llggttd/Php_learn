<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>登陆成功</title>
	</head>
	<body>
		<?php
		require('db.php');
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="SELECT `password`,`verified` FROM `user` WHERE `username`='$username'";
		$result_id=mysql_query($sql) or die (mysql_error());
		$result=mysql_fetch_array($result_id);
//		print_r($result);
//		var_dump($password);
		
		if($result['password']==$password){
			if($result['verified']==false){
				echo "对不起，你的注册还没有激活！\n";
			}
			else{
				echo "你已经登陆！";
			}
		}
		else{
			echo "用户名或密码错误！\n";
		}
	?>
	</body>
	</html>