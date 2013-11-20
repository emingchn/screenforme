<?php
	session_start();
	session_destroy();
	$_SESSION = array();
?>
<meta content="0;signin.php" http-equiv="refresh">