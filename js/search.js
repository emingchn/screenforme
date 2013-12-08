$.getScript("js/movie.js");
function testsearch(inoformation){
	$("div#result").empty();
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
	 $("div#result").append('Found ' + data.total + ' results for ' + query);
	 $("div#result").append('<div class="container" />');
	var count = 0;
	var num = 0;
	var movies = data.movies;

	$.each(movies, function(index, movie) {
		if(count%3==0){
			$("div#result .container").append('<div class="row" id="row'+num+'" />');
			num=num+1;
	 	}
	 	var newnum = num-1;
	   $("div#result .container #row"+newnum).append('<div id="'+count+'" class="4u" />'); 
	   $("div#result .container #row"+newnum+" #"+count).append('<article id="article'+count+'" class="box box-style2" />');
	   $("div#result .container #row"+newnum+" #"+count+" #article"+count).append('<h3 class="title"><a href="#movie">' + movie.title + '   ('+ movie.year +')</a></h3>');
	   $("div#result .container #row"+newnum+" #"+count+" #article"+count).append('<a id="img'+count+'" class="image image-full"/>')
	   $("div#result .container #row"+newnum+" #"+count+" #article"+count+" #img"+count).append('<a href="#movie" onclick = "moviedetails(\''+movie.links.self+'\')"> <img height=300px width=100px src="' + movie.posters.original + '" /></a>');																						
	   count = count +1;
	 }); 
	
	}
}

