<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8 />
	<script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript" src="js/formvalidation.js"></script> 
	<script src="js/config.js"></script>
	<script src="js/skel.min.js"></script>
	<title>Screen For Me</title>
	<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
	</noscript>
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
</head>	
<body>
	<nav id="nav">
				<ul class="container">
					<li><a href="#index">ScreenForMe</a></li>
					<li>
						<input type="text">
						<span><a href="#result">Search</a></span>
					</li>
					<?php 
						if(empty($_SESSION['loggedin'])){	
					?>	
					<li><a href="#signup">Sign up</a></li>
					<li>|</li>
					<li><a href="#signin">Sign in</a></li>
					<?php
					}else{
					?>
					<li><a href="logout.php">Log out</a></li>
					<?php
					}
					?>
				</ul>
	</nav>
	<div id="main">