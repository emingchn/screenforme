<?php
session_start();

$dbhost = 'localhost';
$dbname = 'cse636';
$dbuser = 'screenforme';
$dbpw = 'admin';

mysql_connect($dbhost,$dbuser,$dbpw) or die ("Connection error:".mysql_error());
mysql_select_db($dbname) or die ("DB error".mysql_error());
?>