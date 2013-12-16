<?php
	include "connectdb.php";
	$time = date("Y-m-d H-i-s");
	$username = $_POST['usersname'];
	$comment = $_POST['comment'];
	$movie = $_POST['movie'];
	$comname = $_POST['friendname'];
	$cric = $_POST['thumb'];
	$checkInsert = mysql_query("INSERT INTO comment (username,time,comment,movie,friendname) VALUES ('".$username."','".$time."','".$comment."','".$movie."','".$comname."')");

	
	$checkUpdate = mysql_query("UPDATE history SET ".$cric." = ".$cric."+1 WHERE username = '".$username."' and movie = '".$movie."'" );
	echo "Comment Succeed!";
?>