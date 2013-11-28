<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>

	<?php 
	$email = stripslashes(trim($_GET['email'])); 
	if(!empty($_POST['password'])){
		$password = md5(mysql_real_escape_string($_POST['password']));
		$resetpw = mysql_query("UPDATE user SET password = '".$password."' WHERE email = '".$_SESSION['email']."'");
		if($resetpw){
			echo "Success! You can use the new password now.";
		}else{
			echo "oops.";
		}
	}
	else{
		$_SESSION['email'] = $email; 
	?>
		<h1>Reset your password</h1>
		<form method="post" action="resetpw.php" name="reset" id="reset">
			<fieldset>
				<lable for="">Enter new password.</lable>
				<input type="password" name="password" id="password">
				<br/>
				<lable for="">Enter new password again.</lable>
				<input type="password" name="repassword" id="repassword">
				<br/>
				<input type="submit" name="submit" id="submit"> 
			</fieldset>
		</form>			
	<?php
	}
	?>
</div>
</body>
</html>