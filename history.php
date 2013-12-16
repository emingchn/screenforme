<?php 
include "connectdb.php";
$movie = stripslashes(trim($_GET['hm'])); 
$usr = stripslashes(trim($_GET['usr'])); 
$title = stripslashes(trim($_GET['title'])); 
echo $title;
echo "     ";
$inserthis = mysql_query("INSERT INTO history (userName, movie, shared, positivecount, negativecount,title) VALUES('".$usr."', '".$movie."', '1','0','0','".$title."')");  
echo "Shared";
?>