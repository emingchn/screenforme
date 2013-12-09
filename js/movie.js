
function moviedetails(inoformation){
	$("div#movie #movie_container #movie_info #movie_container #movie_info").empty();
	var apikey = "whsxrvc2yyu732zj39ayf4r5";
	var baseUrl = inoformation;
	// construct the uri with our apikey
	var moviesSelfUrl = baseUrl + '?apikey=' + apikey;

	$(document).ready(function() {
	  // send off the query
	  $.ajax({
	    url: moviesSelfUrl,
	    dataType: "jsonp",
	    success: searchMovieDetails
	  });
	});

	function searchMovieDetails(data) {
		$("div#movie #movie_container #movie_info").append('<div class="container" />');
		$("div#movie #movie_container #movie_info").append('<h3 class="title: ">' + data.title +'</h3>'); 
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'year: ' + data.year +'</h3>'); 
		$("div#movie #movie_container #movie_infv #movie_info_left").append('<h3 >'+'runtime: ' + data.runtmie +'</h3>');
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'critics_consensus: ' + data.critics_consensus +'</h3>');  
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'critics_rating: '+ data.ratings.critics_rating +'</h3>');
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'critics_score: ' + data.ratings.critics_score +'</h3>');
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'audience_rating: '+ data.ratings.audience_rating +'</h3>');
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'audience_score: '+ data.ratings.audience_score +'</h3>');
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'synopsis: ' + data.synopsis +'</h3>');
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'abridged_directors: ' + data.abridged_directors.name +'</h3>');
		$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 >'+'studio: '+ data.studio +'</h3>');

		var cast = data.links.cast;
		var castUrl = cast + '?apikey=' + apikey;

		$(document).ready(function() {
		  // send off the query
		  $.ajax({
		    url: castUrl,
		    dataType: "jsonp",
		    success: searchCast
		  });
		});
		function searchCast(data){
			var castArray = data.cast;
			$("div#movie #movie_container #movie_info").append('<h3 class="title"> cast </h3>');
			$.each(castArray, function(index, castDetial) {
				$("div#movie #movie_container #movie_info #movie_info_left #movie_info_left").append('<h3 > cast name :' + castDetial.name +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_left").append('<h3 > cast characters : ' + castDetial.characters +'</h3>');
			});	
		}

		var reviews = data.links.reviews;
		var reviewsUrl = reviews + '?apikey=' + apikey;
		$(document).ready(function() {
		  // send off the query
		  $.ajax({
		    url: reviewsUrl,
		    dataType: "jsonp",
		    success: searchReviews
		  });
		});
		function searchReviews(data){
			var reviewsArray = data.reviews;
			$("div#movie #movie_container #movie_info").append('<h3 class="title"> reviews </h3>');
			$.each(reviewsArray, function(index, reviewsDetial) {
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > critic:  :' + reviewsDetial.critic +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > date: ' + reviewsDetial.date +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > freshness: ' + reviewsDetial.freshness +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > publication: ' + reviewsDetial.publication +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > quote: ' + reviewsDetial.quote +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > links: ' + reviewsDetial.links.review +'</h3>');
			});	
		}

		
		var clips = data.links.clips;
		var clipsUrl = clips + '?apikey=' + apikey;

		// $(document).ready(function() {
		//   // send off the query
		//   $.ajax({
		//     url: clipsUrl,
		//     dataType: "jsonp",
		//     success: searchClips
		//   });
		// });
		function searchClips(data){
			var clipsArray = data.clips;
			$("div#movie #movie_container #movie_info").append('<h3 class="title"> clips </h3>');
			$.each(clipsArray, function(index, clipsDetial) {
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > title:  :' + clipsDetial.title +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<h3 > duration: ' + clipsDetial.duration +'</h3>');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<img  src = "' + clipsDetial.thumbnail +'" />');
				$("div#movie #movie_container #movie_info #movie_info_right").append('<embed src = "' + clipsDetial.links.alternate +'" />');
			});	
		}
	}
}
