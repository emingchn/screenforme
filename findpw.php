<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>

		<?php
		if(!empty($_POST['email'])){
			$email = mysql_real_escape_string($_POST['email']);
			if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE email = '".$email."'"))!=1){ 
   				echo "<p>Sorry, that email address does not exist. Please go back and try again.</p>";  	
			}else{
				require 'class.phpmailer.php';
	            $mail = new PHPMailer(); 
	            $mail->IsSMTP();
	            $mail->CharSet    ="UTF-8";    
	            $mail->Encoding   = "base64";                         
	            $mail->SMTPAuth   = true;                   
	            $mail->SMTPSecure = "ssl";                  
	            $mail->Host       = "smtp.gmail.com";       
	            $mail->Port       = 465;                    
	            $mail->Username   = "emingchn@gmail.com";  
	            $mail->Password   = "intheend";        
	            $mail->SetFrom('emingchn@gmail.com', 'screenforme');    
	            $mail->Subject    = 'Reset your password';   
	            $mail->IsHTML(true);      
	            $mail->Body       = '<a href="screenformecse636.com/resetpw.php?email='.$email.'">Click here to reset your password.</a>';
	            $mail->AddAddress($email);
	            if(!$mail->Send()){
	                echo "<h1>failed</h1>";
	            }
	            else{
	            	echo "<br/><br/><br/><br/>";
	                echo "<h2>A reset mail has been sent.Please check mailbox.<h2>";
	            }  
			}
		}
		else{
			?>
			<br/>
			<br/>
			<br/>
		<h1>Reset password</h1><br/>
		<form method="post" action="index.php#findpw" name="findpw" id="findpw">
			<fieldset>
				<input type="text" name="email" id="email" placeholder="Email"/><br/><br/>
				<input type="submit" name="submit" value="submit" class="button button-big" />
			</fieldset>			
		</form>
		<?php
		}
		?>
	</div>
</body>
</html>