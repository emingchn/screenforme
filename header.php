<?php include_once "fbmain.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8 />
	<link rel="stylesheet" href="css/tabmenu.css" />
	<script src="js/jquery.js"></script> 
	<script src="js/jquery.validate.js"></script>
	<script src="js/formvalidation.js"></script> 
	<script src="js/config.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/search.js"></script>
	<script src="js/index.js"></script>
	<script src="js/tabmenu.js"></script>
	<script type="text/javascript">
            function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){        
                FB.ui({ method : 'feed', 
                        message: userPrompt,
                        link   :  hrefLink,
                        caption:  hrefTitle,
                        picture: ''
               },
    function(response){
      if(response && response.post_id) {
        self.location.href = 'history.php?hm='+$("#para1").text()+'&usr='+$("#para2").text()+'&title='+$("#para3").text();
      }
      else {
        alert("Not shared!");
      }
    });               
            }
   	</script>
   	<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
     <script type="text/javascript">
       FB.init({
         appId  : '<?=$fbconfig['appid']?>',
         status : true, // check login status
         cookie : true, // enable cookies to allow the server to access the session
         xfbml  : true  // parse XFBML
       });
       
     </script>
	<title>Screen For Me</title>
	<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
	</noscript>
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->

</head>	
<body>
	<nav id="nav">
				<ul class="container">
					<li><a style="background: #9E0E13; font-size: 110%;" onMouseOver="this.style.background='#5E5858'" onMouseOut="this.style.background='#9E0E13'" href="index.php">ScreenForMe</a></li>
					<li style="width:600px">
						<input type="text" id="search_info" name="search" placeholder="Movie name">
						<span><a style="background: #9E0E13" onMouseOver="this.style.background='#5E5858'" onMouseOut="this.style.background='#9E0E13'" href="#result" onclick="testsearch(document.getElementById('search_info').value)">Search</a></span>
					</li>
					<?php 
						if(empty($_SESSION['loggedin'])){	
					?>	
					<li><a href="#signup">Sign up</a></li>
					<li>|</li>
					<li><a href="#signin">Sign in</a></li>
					<?php
						}else{
					?>
					<li><a href="logout.php">Log out</a></li>
					<li><a href="index.php#profile">Welcome, <span id="identi"><?php echo $_SESSION['usr']?></span>!</a>
						
					<?php
						}
					?>
				</ul>
	</nav>