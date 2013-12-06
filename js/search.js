$(function(){
  var $form_inputs =   $('form input');
  var $rainbow_and_border = $('.rain, .border');
  /* Used to provide loping animations in fallback mode */
  $form_inputs.bind('focus', function(){
  	$rainbow_and_border.addClass('end').removeClass('unfocus start');
  });
  $form_inputs.bind('blur', function(){
  	$rainbow_and_border.addClass('unfocus start').removeClass('end');
  });
  $form_inputs.first().delay(800).queue(function() {
	$(this).focus();
  });
});

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
	   $("div#result .container #row"+newnum+" #"+count+" #article"+count).append('<h3 class="title">' + movie.title + '   ('+ movie.year +')</h3>');
	   $("div#result .container #row"+newnum+" #"+count+" #article"+count).append('<a id="img'+count+'" class="image image-full"/>')
	   $("div#result .container #row"+newnum+" #"+count+" #article"+count+" #img"+count).append('<img height=300px width=100px src="' + movie.posters.original + '" />');
	   count = count +1;
	 }); 
	
	}
}

