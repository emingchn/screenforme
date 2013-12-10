<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>
	<div id="index" class="wrapper wrapper-style1 wrapper-first">
		<article class="container">
			<div id="comingsoon">
				<h2>Coming Soon: this is a index section, including the upcoming movie list and in theaters list.</h1><br />	
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
	<div id="movie" class="wrapper wrapper-style3">
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
					
					</div>
						
					<br class="clear" />
				</div>
				<div id="movie_info_right">
					<div id="rating">
						
					</div>
					<div id="cast">

					</div>
				</div>
			</div>
			<div id="movie_footer">
				<div id="comment">
					<form method="post" action="#">
					<textarea rows="4" cols="50" style="display: block" placeholder="Comment:"/></textarea><br/>
					<input type="submit" style="display: block" class="button form-button-submit" value="Submit"/> <br/><br/>
					</form>
				</div>
				<div id="movie_share">
					<p id="para"></p>
					<?php 
						if(empty($_SESSION['loggedin'])){	
					?>
					<a href="#signin" class="button button-big">Sign In</a> 
					<?php
						}else{
					?>	
					<a href="" id="copy_p" class="button button-big">Copy Link</a> 
					<?php
						}
					?>	
					<?php if (!$user) { ?>
					<p>You've to login with Faceook to share.</p>
       						 <a href="<?=$loginUrl?>" class="button button-big">Facebook Login</a>
    				<?php } else { ?>
        					<a id="copy_p" onclick="streamPublish('screenforme','Comment this please!','Comment this please!','','screenforme1'); return false;" class="button button-big">Share</a>
   					<?php } ?>
				</div>
			</div>
			<br class="clear" />
		</div>
		<br class="clear" />
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
		<article class="container" id="top">
			<div class="row">
				<div class="4u">
					<span class="me image image-full"><img src="images/me.jpg" alt="" /></span>
				</div>
				<div class="8u">
					<header>
						<h1>Hi. I'm <strong>Jane Doe</strong>.</h1>
					</header>
					<p>And this is <strong>Profile</strong>, a section containing information about shared movies and comments from frieds </p>
					<a href="#index" class="button button-big">Back to top</a>
				</div>
			</div>
		<?php include "profile.php"; ?>
		</article>
	</div>
	<?php
		}
	?>
	<div id="footers" class="wrapper wrapper-style4">
		<article class="container">
		<footer>
						<ul id="copyright" style="font-size:1.5em">
							<li>&copy; 2013 Screen For Me</li>
							<li>Yiming Cheng, Jun Wang</li>
							<li>Mashup project for the final.</li>
						</ul>
		</footer>
		</article>
	</div>

</body>
</html>