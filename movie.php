<?php 
include "connectdb.php";
$mid = stripslashes(trim($_GET['mn'])); 
$shared = stripslashes(trim($_GET['user']));

$api = "http://api.rottentomatoes.com/api/public/v1.0/movies/".$mid.".json";
echo "<p id='movieid' style='display:none'>$api</p>";	
?>
<script language='javascript' src='js/youtube.js'></script>
<script language='javascript' src='https://apis.google.com/js/client.js'></script>
<script type="text/javascript" >
function showmovie(){
	var data = $("#movieid").text(); 	
	moviedetails(data);
	$("html,body").animate({scrollTop: $("#movie").offset().top}, 1000);
}

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
	$("div#movie #movie_container #movie_footer #movie_share #para1").empty();
	$("div#movie #movie_container #movie_footer #movie_share #para2").empty();
	$("div#movie #movie_container #movie_footer #movie_share #para3").empty();
	$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").empty();
	$("div#movie #movie_container #movie_info #movie_info_left #post_description #post").empty();
	$("div#movie #movie_container #movie_info #movie_info_right #rating").empty();
	$("div#movie #movie_container #movie_info #movie_info_right #cast").empty();
	$("div#movie #movie_container #movie_info #movie_info_left #reviews").empty();
	$("div#movie #movie_container #movie_info #movie_container #movie_info").empty();
	$("div#movie #movie_container #movie_info #movie_container #movie_info").empty();
	/*********append********/

		$("div#movie #movie_container #movie_footer #movie_share #para").append('screenformecse636.com/index.php?mn='+data.id+'&user='+identi);
		$("div#movie #movie_container #movie_footer #movie_share #para1").append(data.id);
		$("div#movie #movie_container #movie_footer #movie_share #para2").append(identi);
		$("div#movie #movie_container #movie_footer #movie_share #para3").append(data.title);
		onClientLoad();
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<h2 style="margin-bottom:2em" class="title:">' + data.title +'</h2>'); 
		
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #post").append('<img width=350px height=450px src = "' + data.posters.original +'" />'); 
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<p style="color:#335588;margin-bottom:2em"><b>Year</b>: ' + data.year +'</p>'); 
		$("div#movie #movie_container #movie_info #movie_info_right #rating").append('<p style="margin-bottom:2em;color:red"><b>Critics score</b>: ' + data.ratings.critics_score +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #rating").append('<p style="margin-bottom:2em;color:red"><b>Audience score</b>: '+ data.ratings.audience_score +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p style="margin-bottom:2em"><b>Director</b>: '+ data.abridged_directors[0].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p ><b>Cast</b>: '+ data.abridged_cast[0].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p >'+ data.abridged_cast[1].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_right #cast").append('<p >'+ data.abridged_cast[2].name +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<p style="color:#005522" ><b>Studio</b>:'+ data.studio +'</p>');
		$("div#movie #movie_container #movie_info #movie_info_left #post_description #description").append('<p id="synopsis">' + data.synopsis +'</p>');
		var cast = data.links.cast;
		var castUrl = cast + '?apikey=' + apikey;

		var reviews = data.links.reviews;
		var reviewsUrl = reviews + '?apikey=' + apikey;
		$(document).ready(function() {
		  
  var o = document.getElementById("synopsis");
  var s = o.innerHTML;
  var p = document.createElement("span");
  var n = document.createElement("a");
  p.innerHTML = s.substring(0,100);
  n.innerHTML = s.length > 100 ? "...Details" : "";
  n.href = "#movie";
  
  n.onclick = function(){
    if (n.innerHTML == "...Details"){
      n.innerHTML = "Fold";
      p.innerHTML = s;
    }else{
      n.innerHTML = "...Details";
      p.innerHTML = s.substring(0,100);
    }
  }
  
  o.innerHTML = "";
  o.appendChild(p);
  o.appendChild(n);

		  // send off the query
		  $.ajax({
		    url: reviewsUrl,
		    dataType: "jsonp",
		    success: searchReviews
		  });
		});
		function searchReviews(data){

			var reviewsArray = data.reviews;
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p style="text-align:left" class="quote">' + reviewsArray[0].quote +'</p>');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<h2 style="color:#007722;text-align:right" class="critic">' + reviewsArray[0].critic +'</h2><br /><hr class="carved">');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p style="text-align:left" class="quote">' + reviewsArray[1].quote +'</p>');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<h2 style="color:#007722;text-align:right" class="critic">' + reviewsArray[1].critic +'</h2><br /><hr class="carved">');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<p style="text-align:left" class="quote">' + reviewsArray[2].quote +'</p>');
			$("div#movie #movie_container #movie_info #movie_info_left #reviews").append('<h2 style="color:#007722;text-align:right" class="critic">' + reviewsArray[2].critic +'</h2><br />');	
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

</script>

<?php 
if(empty($mid)){
	echo "";
}else{
	echo '<script type="text/javascript">'; 
	echo 'showmovie()'; 
	echo '</script>';
}
?>