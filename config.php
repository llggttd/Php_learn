<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	session_start();
	echo $_COOKIE['PHPSESSID']."</br>";
	$_SESSION['visit']++;
	echo '该页面你已访问'.$_SESSION['visit'].'次';
	session_commit();
	?>
</body>
</html>