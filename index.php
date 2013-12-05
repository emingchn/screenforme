<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>
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
		<article >
			<header>
				<h2>Result of "Keyword".</h2>
				<span>heh.</span>
			</header>
			<div class="container">
			<div class="row">
				<div class="4u">
					<article class="box box-style2">
						<a href="http://flypixel.com/generic-smartphone/8949517882265310" class="image image-full"><img src="http://content8.flixster.com/site/10/26/09/10260954_ori.jpg" alt="" /></a>
						<h3><a href="http://flypixel.com/generic-smartphone/8949517882265310">Magna feugiat</a></h3>
						<p>Ornare nulla proin odio consequat.</p>
					</article>
				</div>
				<div class="4u">
					<article class="box box-style2">
						<a href="http://flypixel.com/n33" class="image image-full"><img src="http://content8.flixster.com/site/10/26/09/10260978_ori.jpg" alt="" /></a>
						<h3><a href="http://flypixel.com/n33">Veroeros primis</a></h3>
						<p>Ornare nulla proin odio consequat.</p>
					</article>
				</div>
				<div class="4u">
					<article class="box box-style2">
						<a href="http://flypixel.com/wood-ui-kit/3574765984616310" class="image image-full"><img src="http://content6.flixster.com/site/10/26/09/10260920_ori.jpg" alt="" /></a>
						<h3><a href="http://flypixel.com/wood-ui-kit/3574765984616310">Lorem ipsum</a></h3>
						<p>Ornare nulla proin odio consequat.</p>
					</article>
				</div>
			</div>
			<div class="row">
				<div class="4u">
					<article class="box box-style2">
						<a href="http://flypixel.com/n33-pattern-set-1/3522389001865317" class="image image-full"><img src="http://content6.flixster.com/site/10/26/09/10260920_ori.jpg" alt="" /></a>
						<h3><a href="http://flypixel.com/n33-pattern-set-1/3522389001865317">Tempus dolore</a></h3>
						<p>Ornare nulla proin odio consequat.</p>
					</article>
				</div>
				<div class="4u">
					<article class="box box-style2">
						<a href="http://flypixel.com/cityscape/9803996277226316" class="image image-full"><img src="http://content6.flixster.com/site/10/26/09/10260920_ori.jpg" alt="" /></a>
						<h3><a href="http://flypixel.com/cityscape/9803996277226316">Feugiat aliquam</a></h3>
						<p>Ornare nulla proin odio consequat.</p>
					</article>
				</div>
				<div class="4u">
					<article class="box box-style2">
						<a href="http://flypixel.com/n33" class="image image-full"><img src="http://content6.flixster.com/site/10/26/09/10260920_ori.jpg" alt="" /></a>
						<h3><a href="http://flypixel.com/n33">Sed amet ornare</a></h3>
						<p>Ornare nulla proin odio consequat.</p>
					</article>
				</div>
			</div>
			</div>
		</article>
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