<?php
session_start();
echo $_COOKIE['PHPSESSID'];
echo $_SESSION['user'];
?>