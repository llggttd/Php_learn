<pre><?php

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
echo $_COOKIE[session_name('123')];
echo $_COOKIE['PHPSESSID'];
//require_once('config.php');