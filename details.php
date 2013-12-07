<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Image-less CSS3 Glowing Form Implementation</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script>
    	function testsearch(inoformation){
    		var apikey = "whsxrvc2yyu732zj39ayf4r5";
			var baseUrl = "http://api.rottentomatoes.com/api/public/v1.0";
			// construct the uri with our apikey
			var moviesSearchUrl = baseUrl + '/movies.json?apikey=' + apikey;
			var listsSearchUrl = baseUrl + '/lists.json?apikey=' + apikey;
			var query = inoformation;
			$(document).ready(function() {
			  // send off the query
			  $.ajax({
			    url: moviesSearchUrl + '&q=' + encodeURI(query),
			    dataType: "jsonp",
			    success: searchCallback
			  });
			});
			// callback for when we get back the results
			function searchCallback(data) {
			 $(document.body).append('Found ' + data.total + ' results for ' + query);
			 var movies = data.movies;
			 var selflink = data.links;
			 $.each(movies, function(index, movie) {
			 	$(document.body).append('<h3>' + 'title:' + movie.title + '</h3>');
			 	$(document.body).append('<h3>' + 'year:' + movie.year + '</h3>');
			 	$(document.body).append('<h3>' + 'runtime:' + movie.runtime + '</h3>');
			   $(document.body).append('<h3 >' + 'release_dates:' + movie.release_dates.theater + '</h3>');
			   $(document.body).append('<h3 >' + 'critics_score:' + movie.ratings.critics_score + '</h3>');
			   $(document.body).append('<h3 >' + 'audience_score:' + movie.ratings.audience_score + '</h3>');
			   $(document.body).append('<h3 >' + 'synopsis:' + movie.synopsis + '</h3>');
			   $(document.body).append('<h3 >' + 'reviews:' + movie.reviews + '</h3>');


			   $(document.body).append('<h3 >' + 'MPAA Rating is:  ' + movie.mpaa_rating+ '</h3>');
			   $(document.body).append('<img  src="' + movie.posters.original + '" />');

			 });
			}
    	}
    </script>
	</head>
	<body id="home">
		<div class="rain">
			<div class="border start">
				<form>
					<label for="search">Search movie</label>
					<input id="search_info" name="search" type="text" placeholder="Movie name"/>
					<input type="button" onclick="testsearch(document.getElementById('search_info').value)" value="on click"/></input>
				</form>
			</div>
		</div>
	</body>
</html>