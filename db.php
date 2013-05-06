<?php
$host='127.0.0.1:3306';
$db_user='root';
$db_password='lgt633744';
$database='lgt';
$connect=mysql_connect($host,$db_user,$db_password);
mysql_select_db($database,$connect) or die (mysql_error());

?>