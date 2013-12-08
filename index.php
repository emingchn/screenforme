<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>
<html>
<head>
</head>
<body>
	<div id="index" class="wrapper wrapper-style1 wrapper-first">
		<article class="container">
			<div id="comingsoon">
				<h2>Coming Soon</h1><br />	
				<ul>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div id="intheaters">
				<h2>In Theaters</h1><br />	
				<ul>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div id="slideshow">
				
			</div>	
			<a href="" class="button button-big">
				Share it through facebook
			</a>
		</article>
	</div>	
	<div id="result" class="wrapper wrapper-style3">
			 
	</div>
	<div id="movie" class="wrapper wrapper-style3">

	</div>
	<?php 
		if(empty($_SESSION['loggedin'])){	
	?>		
	<div id="signin" class="wrapper wrapper-style4">
		<article class="container small">
		<?php include "signin.php";?>
		</article>
	</div>	
	<div id="findpw" class="wrapper wrapper-style4">
		<article  class="container small">	
		<?php include "findpw.php"; ?>
		</article>
	</div>
	<div id="signup" class="wrapper wrapper-style4">
		<article class="container small">
		<?php include "signup.php"; ?>
		</article>
	</div>
	<?php
		}else{
	?>
	<div id="profile" class="wrapper wrapper-style3">
		<article>	
		<h1>profile</h1><br />
		<h1>profile</h1><br />
		<h1>profile</h1><br />
		<h1>profile</h1><br />
		<h1>profile</h1><br />
		<?php include "profile.php"; ?>
		</article>
	</div>
	<?php
		}
	?>
</body>
</html>