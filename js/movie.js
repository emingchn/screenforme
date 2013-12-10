
function moviedetails(information){

	var apikey = "whsxrvc2yyu732zj39ayf4r5";
	var baseUrl = information;
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
	var identi = $("#identi").text();
		/****empty*********/
	$("div#movie #movie_container #movie_footer #movie_share #para").empty();
	$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").empty();
	$("div#movie #movie_container #movie_info #movie_info_left #post_description #post").empty();
	$("div#movie #movie_container #movie_info #movie_info_right #rating").empty();
	$("div#movie #movie_container #movie_info #movie_info_right #cast").empty();
	$("div#movie #movie_container #movie_info #movie_info_left #reviews").empty();
	$("div#movie #movie_container #movie_info #movie_container #movie_info").empty();
	$("div#movie #movie_container #movie_info #movie_container #movie_info").empty();
	/*********append********/
		$("div#movie #movie_container #movie_footer #movie_share #para").append('localhost/screenforme/index.php?mn='+data.id+'user='+identi);
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<h3 class="title:">' + data.title +'</h3>'); 
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #post").append('<img width=350px height=450px src = "' + data.posters.original +'" />'); 
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<p style="color:#335588"><b>Year</b>: ' + data.year +'</p>'); 
		$("div#movie #movie_container #movie_info #movie_info_right #rating").append('<p >'+'Critics score: ' + data.ratings.critics_score +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #rating").append('<p >'+'Audience score: '+ data.ratings.audience_score +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p >'+'Director: '+ data.abridged_directors[0].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p >'+'cast: '+ data.abridged_cast[0].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p >'+'cast: '+ data.abridged_cast[1].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p >'+'cast: '+ data.abridged_cast[2].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<p style="color:#005522" ><b>Studio</b>:'+ data.studio +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<p >' + data.synopsis +'</p>');

		var cast = data.links.cast;
		var castUrl = cast + '?apikey=' + apikey;

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
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<h2 class="title"> Reviews </h3>');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p class="quote">' + reviewsArray[0].quote +'</p>');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p style="color:#007722" class="critic">' + reviewsArray[0].critic +'</p><br />');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p class="quote">' + reviewsArray[1].quote +'</p>');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p style="color:#007722" class="critic">' + reviewsArray[1].critic +'</p><br />');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p class="quote">' + reviewsArray[2].quote +'</p>');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p style="color:#007722" class="critic">' + reviewsArray[2].critic +'</p><br />');	
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
			$("div#movie #movie_container #movie_info").append('<p class="title"> clips </p>');
			$("div#movie #movie_container #movie_info #movie_info_right").append('<p > title:  :' + clipsArray[0].title +'</p>');
			$("div#movie #movie_container #movie_info #movie_info_right").append('<embed src = "' + clipsArray[0].links.alternate +'" />');	
		}
	}
}
