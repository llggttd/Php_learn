<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>完成注册</title>
</head>
<body>
<?php
require('db.php');
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$verify_string='';
for($i=0;$i<40;$i++ ){
	$verify_string.=chr(mt_rand(97,122));
}
$verify_url="http://localhost/www/verify.php?email=$email&verify_string=$verify_string";
$createtime=time();
//var_dump($verify_string);
//var_dump($createtime);
$sql="INSERT INTO `user`(`username`, `email`, `password`, `verify_string`, `verified`) VALUES ('$username','$email','$password','$verify_string','0')";
//var_dump($sql);
if(mysql_query($sql) ){
	echo "你的请求已提交，请在一周内激活你的帐号。\n请点击下面的链接激活你的帐户\n";
	echo '<a href="verify.php?email='.$email.'&verify_string='.$verify_string.'">'.$verify_url.'</a>';
}
else{
	echo "提交出错，请重新提交！\n";
}
?>	
</body>
</html>