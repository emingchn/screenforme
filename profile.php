<?php include "connectdb.php"; 
if(!empty($_SESSION['loggedin']) && !empty($_SESSION['identifier'])){		
	
	if(filter_var($identifier, FILTER_VALIDATE_EMAIL)){
		$nameresource = mysql_query("SELECT userName FROM users WHERE email ='".$_SESSION['identifier']."'");
		$namerow = mysql_fetch_array($nameresource);
		$profile = $namerow['userName'];
	}else{
		$profile = $_SESSION['identifier'];
	}
	$history = mysql_query("SELECT * FROM history WHERE userName = '".$profile."'"); 
	while ($row = mysql_fetch_assoc($history)){
		echo $row['title'];?><span style="width:15px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><?php
		echo $row['negativecount'];?> <span style="width:15px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><?php
		echo $row['positivecount'];?><br/><hr><?php
	}	
}
?>


