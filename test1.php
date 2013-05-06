<pre><?php
//header('Location:http://www.baidu.com');

echo getenv('path');
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