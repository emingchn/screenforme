<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>
	<div id="index" class="wrapper wrapper-style1 wrapper-first">
		<article class="container" style="margin:0 auto">
		<div id="upcoming"></div>
		<div style="margin-bottom: 50px" id="intheaters"></div>
				<script>
			var apikey = "whsxrvc2yyu732zj39ayf4r5";
			var baseUrl = "http://api.rottentomatoes.com/api/public/v1.0";
			// construct the uri with our apikey
			var moviesSearchUrl = baseUrl + '/movies.json?apikey=' + apikey;
			var listsSearchUrl = baseUrl + '/lists.json?apikey=' + apikey;
			$(document).ready(function() {
			  // send off the query
			  $.ajax({
			    url: listsSearchUrl,
			    dataType: "jsonp",
			    success: list
			  });
			});
			// callback for when we get back the results
			function list(data) {
				var listlink = data.links.movies;
				var listUrl = listlink + '?apikey=' + apikey;
				$(document).ready(function() {
				  $.ajax({
				    url: listUrl,
				    dataType: "jsonp",
				    success: Upcomming
				  });
				  
				});
				function Upcomming(data){
					var upcomminglink = data.links.upcoming;
					var intheaterslink = data.links.in_theaters
					var upcommingUrl = upcomminglink + '?apikey=' + apikey;
					var intheatersUrl = intheaterslink + '?apikey=' + apikey;
					$(document).ready(function() {
					  $("#intheaters").append('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h3 style="float:left">In Theaters</h3><hr style="width:1080px" class="carved">');
					  $("#upcoming").append('<h3 style="float:left">Upcoming</h3><hr style="width:1080px" class="carved">');
					  $.ajax({
					    url: upcommingUrl,
					    dataType: "jsonp",
					    success: upcomminglist
					  });
					  
					    $.ajax({
					    url: intheatersUrl,
					    dataType: "jsonp",
					    success: intheaterslist
					  });
					});
					function upcomminglist(data) {
						var movies = data.movies;
						for(var i=0;i<5;i++){
							var mids = (movies[i].links.self).split("/");
	 			            var mid = (mids[7].split("."))[0]; 
							$("#upcoming").append('<div style="float:left;margin:0 10px 0 10px" id="upcoming'+i+'""></div>')
							$("#upcoming #upcoming"+i).append('<p style="height:80px;width:150px">' + movies[i].title + '</p>');
							$("#upcoming #upcoming"+i).append('<a href="?mn='+ mid +'"><img style="height:250px;width:200px" src="' + movies[i].posters.detailed + '" /></a><br class="clear">');
						}
					
					}
					function intheaterslist(data) {
						var movies = data.movies;
						for(var i=0;i<5;i++){
							var mids = (movies[i].links.self).split("/");
	 			            var mid = (mids[7].split("."))[0]; 
							$("#intheaters").append('<div style="float:left;margin:0 10px 0 10px" id="intheaters'+i+'""></div>')
							$("#intheaters #intheaters"+i).append('<p style="height:80px;width:150px">' + movies[i].title + '</p>');
							$("#intheaters #intheaters"+i).append('<a href="?mn='+ mid +'"><img style="height:250px;width:200px" src="' + movies[i].posters.detailed + '" /></a><br class="clear">');
						}
					
					}
				}
			}
	 
	    </script>

	 
	    </script>
			</div>	
		</article>
	</div>	
	<div id="result" class="wrapper wrapper-style3">
			 
	</div>
	<div id="movie" class="wrapper wrapper-style3">
		<?php include "movie.php"; ?>
		<div id="movie_container">
			<div id="movie_info">
				<div id="movie_info_left">
					<div id="post_description">
						<div id="post">
							
						</div>
						<div id="description">
						
						</div>
						<br class="clear" />
						<hr class="carved">
					</div>
					
					<div id="reviews">
					<hr class="carved">
					</div>
						
					<br class="clear" />
				</div>
				<div id="movie_info_right">
					<div id="rating">
						
					</div>
					<div id="cast">

					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					   <div id="player"></div>

				</div>
			</div>
			<div id="movie_footer">
				<hr style="margin-bottom: 20px" class="carved">
				<div id="comment">
					<?php include "comment.php" ;?>
					<br class="clear"/>
				</div>
				<hr class="carved">
				<div id="movie_share">
					<p style="display: none" id="para"></p>
					<p style="display: none" id="para1"></p>
					<p style="display: none" id="para2"></p>
					<p style="display: none" id="para3"></p>
					<p style="display: none" id="para4"></p>
					<?php 
						if(empty($_SESSION['loggedin'])){	
					?>
					<br>
					<br>
					<br>
					<p>You've to login to share.</p>
					<a href="#signin" class="button button-big">Sign In</a> 
					<?php
						}else{
					?>	 
					<?php
						}
					?>	
					<?php if (!$user) { ?>
					<p>You've to login with Faceook to share.</p>
       						 <a href="<?=$loginUrl?>" class="button button-big">Facebook Login</a>
    				<?php } else { ?>
        					<a id="sharebutton" class="button button-big">Share</a>
        					<script type="text/javascript">
        					$("#sharebutton").click(function(){
        						var shareurl = $("#para").text();
        						streamPublish('screenforme','Comment this please!','Comment this please!',shareurl,'screenforme1'); return false;
        					})
        					</script>
        					
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
		<h1>Shared History</h1><br/><br/><br/>
		<ul>
			<li style="display:inline"><b>Movie Name</b></li>
			<li style="display:inline;margin-left: 120px"><img style="width: 50px;height: 50px" src="http://central-westernma.bbb.org/storage/167/images/facebook%20thumbs%20up.png"</li>
			<li style="display:inline;margin-left: 120px"><img style="width: 50px;height: 50px" src="http://ashcampbell.com/wp-content/uploads/2013/10/Not_facebook_not_like_thumbs_down.png"</li>
		</ul>
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
