<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8 />
	<script src="js/jquery.js"></script> 
	<script src="js/jquery.validate.js"></script>
	<script src="js/formvalidation.js"></script> 
	<script src="js/config.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/search.js"></script>
	<script src="js/movie.js"></script>
	<script src="js/index.js"></script>
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
					<li><a href="index.php">ScreenForMe</a></li>
					<li>
						<input type="text" id="search_info" name="search" placeholder="Movie name">
						<span><a href="#result" onclick="testsearch(document.getElementById('search_info').value)">Search</a></span>
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
					<li><a href="index.php#profile">Profile</a>
					<?php
						}
					?>
				</ul>
	</nav>
</body>
