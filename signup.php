<?php  
if(!empty($_POST['username']) && !empty($_POST['password']))  
{  
    $username = mysql_real_escape_string($_POST['username']);  
    $password = md5(mysql_real_escape_string($_POST['password']));  
    $email = mysql_real_escape_string($_POST['email']);  
      
     $checkusername = mysql_query("SELECT * FROM users WHERE userName = '".$username."'");
     $checkemail = mysql_query("SELECT * FROM users WHERE email = '".$email."'");
       
     if(mysql_num_rows($checkusername) == 1||mysql_num_rows($checkemail) == 1)  
     {  
        echo "<h1>Error</h1>";  
        echo "<p>Sorry, that username or email address is taken. Please go back and <a href=\"index.php\">try again</a>.</p>"; 
     }  
     else  
     {  
        $regtime = time();
        $actikey = md5($username.$password.$regtime);
        $registerquery = mysql_query("INSERT INTO users (userName, password, email, actiKey) VALUES('".$username."', '".$password."', '".$email."','".$actikey."')");  
        if($registerquery)  
        {  
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
            $mail->Subject    = 'Activate your account at Screenforme.com';   
            $mail->IsHTML(true);      
            $mail->Body       = '<a href="localhost/screenforme/accountverify.php?verify='.$actikey.'&username='.$username.'">Click here to activate your account.</a>';
            $mail->AddAddress($email, $username);
            if(!$mail->Send()){
                echo "<h1>failed</h1>";
            }
            else{
                echo "<p>Your account was successfully created. Please check mailbox for activation.";
            }  
        }   
        else  
        {  
            echo "<h1>Error</h1>";  
            echo "<p>Sorry, your registration failed. Please go back and <a href=\"index.php\">try again</a>.</p>";   
        }         
     }  
}  
else  
{  
    ?>  
      
   <h1>Register</h1><br />          
    <form method="post" action="index.php#signup" name="registerform" id="registerform">  
    <fieldset>  
        <input type="text" name="username" id="username" placeholder="Username"/><br /><br />   
        <input type="password" name="password" id="password" placeholder="Password"/><br /><br />   
        <input type="password" name="repassword" id="repassword" placeholder="Re-enter password" /><br /><br />  
        <input type="text" name="email" id="email" placeholder="Email" /><br /> <br /> 
        <input class="button form-button-submit" type="submit" name="register" id="register" value="Register" />  
    </fieldset>  
    </form>  
      
    <?php  
}  
?>  
  
