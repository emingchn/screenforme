<?php
	include "connectdb.php";
		echo "Global Comment Success!";
		$time = date("Y-m-d H-i-s");
		$comname = $_POST['comname'];
		$movie = $_POST['movie'];
		$comment = $_POST['comment'];
		$checkInsert = mysql_query("INSERT INTO globalcom (userName,time,comment,movie) VALUES ('".$comname."','".$time."','".$comment."','".$movie."')");
?>