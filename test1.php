<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lib</title>
</head>
<body>
<pre><?php
		//header('Location:http://www.baidu.com');
		echo urlencode("http://www.baidu.com?id=123&first name=刘国涛")."\n";
		echo $_SERVER['REQUEST_METHOD'];
		var_dump($GLOBALS);
		echo getenv('path')."\n";
		var_dump(get_browser());
		setcookie('user2','lgt1',time()+5);
		session_start();
		if(!isset($_SESSION['user'])){
			$_SESSION['user']='lgt';
		}
		print_r($_SESSION);
		echo "\n";
		//unset($_SESSION['user']);
		session_commit();
		print_r($_SESSION);
		echo "\n";
		print_r($_COOKIE);
		echo 'session_name :'.$_COOKIE[session_name()]."\n";
		//echo 'session_id :'.$_COOKIE[session_id()]."\n";
		echo 'PHPSESSID :'.$_COOKIE['PHPSESSID']."\n";
		//require_once('config.php');
		?></pre>
</body>
</html>