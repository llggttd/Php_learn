<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>激活成功</title>
</head>
<body>
	<?php
	require('db.php');
	$email=$_GET['email'];
	$verify_string=$_GET['verify_string'];
		if(isset($email)&&isset($verify_string)){
		$sql="SELECT `verify_string` FROM `user` WHERE `email`='$email'";
		$result_id=mysql_query($sql) or die (mysql_error());
		$result=mysql_fetch_array($result_id);
		if($result['verify_string']==$verify_string){
			$sql="UPDATE `user` SET `verified`=1 WHERE `email`='$email'";
			if(mysql_query($sql)){
				echo "你已激活你的帐户";
			}
			else{
				echo "激活帐户失败";
			}
		}
	}
	else{
		echo "你的激活连接有误!";
	}


	?>
</body>
</html>