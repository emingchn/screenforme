		<?php 
		if(!empty($_SESSION['loggedin']) && !empty($_SESSION['identifier'])){
			//let the user access the main page
		?>
		
			<h1>Welcome!</h1>
			<a href="logout.php">logout</a>
		
		<?php	
		}
		elseif (!empty($_POST['identifier'])) {
			$identifier = mysql_real_escape_string($_POST['identifier']);
			$password = md5(mysql_real_escape_string($_POST['pwd']));
			$checklogin = null;
			if(filter_var($identifier, FILTER_VALIDATE_EMAIL)){
    			$checklogin = mysql_query("SELECT * FROM users WHERE email = '".$identifier."' AND password = '".$password."' AND status = '1'");
			}else{
				$checklogin = mysql_query("SELECT * FROM users WHERE userName = '".$identifier."' AND password = '".$password."' AND status = '1'");
			}						
			if(mysql_num_rows($checklogin) == 1){
				$row = mysql_fetch_array($checklogin);
				$email = $row['email'];
				$usr = $row['userName'];				
				$_SESSION['identifier'] = $identifier;
				$_SESSION['email'] = $email;
				$_SESSION['usr'] = $usr;
				$_SESSION['loggedin'] = 1;
				echo "<h1>Success</h1><br /><br /><br /><br />";
				echo "<h3>We are now redirecting you to the member area.</h3>";
				echo "<meta content='1;index.php' http-equiv='refresh'/>"; 
			}
			else{
				echo "<h1>Error</h1><br /><br /><br /><br />"; 
        		echo "<p>Sorry, your account could not be found. Please click here to<a href=\"index.php\"> try again</a>.</p>";  
			}
			// let the user login
		?>
		
		<?php
		}
		else{// display the login form
		?>
		<h1>Login</h1>  <br /> 
      <br /> 
   <p>Thanks for visiting! Need a new account?<a href="index.php#signup">click here to register</a>.</p><br />   
      
    <form method="post" action="index.php#signin" name="loginform" id="loginform">  
    <fieldset>  
        <input type="text" name="identifier" id="identifier" placeholder="Username or Email"/><br /> <br />  
        <input type="password" name="pwd" id="pwd" placeholder="Password"/><br />  <br /> 
        <br/>
        <input class="button form-button-submit" type="submit" name="login" id="login" value="Login" />  <br />
        <a href= "index.php#findpw">Forget password?</a>
    </fieldset>  
    </form>
			
		<?php
		}
		?>
	</div>
</body>