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
		</article>
	</div>	
	<div id="result" class="wrapper wrapper-style3">
			 
	</div>
	<div id="movie" class="wrapper wrapper-style1">
		<div id="movie_container">
			<div id="movie_info">
				<div id="movie_info_left">
					<div id="post_description">
						<div id="post">
							
						</div>
						<div id="description">
						
						</div>
						<br class="clear" />
					</div>
					<div id="reviews">
						
					<br class="clear" />
				</div>
				<div id="movie_info_right">
					<div id="rating">
						
					</div>
					<div id="cast_runtime">
						<div id="cast"> 
							
						</div>
						<div id="runtime">
							
						</div>
					</div>
				</div>
			</div>
			<div id="movie_footer">
				<div id="comment">
					
				</div>
				<div id="movie_share">
					<a href="" class="button button-big">
						Share it through facebook
					</a>
				</div>
			</div>
			<br class="clear" />
		</div>
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