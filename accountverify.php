<?php 
include "connectdb.php";
$verify = stripslashes(trim($_GET['verify'])); 
$username = stripslashes(trim($_GET['username'])); 
$query = mysql_query("SELECT * FROM user WHERE status = '0' AND userName ='$username' AND actiKey ='$verify'"); 
if(mysql_num_rows($query)==1){ 	
	mysql_query("UPDATE user SET status = '1' WHERE userName ='$username'"); 
    $msg = 'Your account is activated!'; 
}else{ 
    $msg = 'Error.';     
} 
echo $msg;
?>