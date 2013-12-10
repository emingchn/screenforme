<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>
	<div id="index" class="wrapper wrapper-style1 wrapper-first">
		<article class="container">
		<ul id="tabmenu">
			<li id="comingsoon">
				<a href="?1">Coming Soon</a>
				<ul>
					<li><a href="?21">upcoming 1</a></li>
		            <li><a href="?22">upcoming 2</a></li>
		            <li><a href="?23">upcoming 3</a></li>
		            <li><a href="?24">upcoming 4</a></li>
				</ul>
			</li>
			<li id="intheaters">
				<a href="?2">In Theaters</a>
				<ul>
	 				<li><a href="?12">In Theaters 1</a></li>
           		 	<li><a href="?12">In Theaters 2</a></li>
           		 	<li><a href="?13">In Theaters 3</a></li>
				</ul>
			</li>
		</ul>
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
						<hr>
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
				<hr>
				<div id="comment">
					<div id="com" style="width:50%;float: left">
						<div id="globalcom">
							global comment 1<br/>
							global comment 2<br/>
							global comment 3<br/>
						</div>
						<hr>
						<div id="privatecom">
							private comment 1<br/>
							private comment 2<br/>
							private comment 3<br/>
						</div>
					</div>
					<form method="post" action="#" style="width:50%;float:left;padding-left: 150px;">
					<textarea style="display: block;width:400px;heigth:400px" placeholder="Comment:"/></textarea><br/>
					<input type="submit" style="display: block" class="button form-button-submit" value="Submit"/> <br/><br/>
					</form>
					<br class="clear"/>
				</div>
				<hr>
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