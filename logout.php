<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>
<?php
	session_start();
	session_destroy();
	$_SESSION = array();
?>
<meta content="0;index.php" http-equiv="refresh">