<?php
include "connectdb.php";
$movie = stripslashes(trim($_GET['mn'])); 
$username = stripslashes(trim($_GET['user']));
	
if(!empty($movie)){ /*show comments*/
	if(!empty($_SESSION['loggedin']) && !empty($_SESSION['identifier'])){		
		if(filter_var($identifier, FILTER_VALIDATE_EMAIL)){
			$nameresource = mysql_query("SELECT userName FROM users WHERE email ='".$_SESSION['identifier']."'");
			$namerow = mysql_fetch_array($nameresource);
			$name = $namerow['userName'];
		}else{
			$name = $_SESSION['identifier'];
		}
		/*display private comments*/
		$countprivateresult = mysql_query("SELECT COUNT(*) as total1 FROM comment WHERE movie = '".$movie."' AND username='".$name."'");
		$datanumber1 = mysql_fetch_assoc($countprivateresult);
		$countprivate = $datanumber1['total1'];
		if($countprivate <= 5){													
			$result = mysql_query("SELECT * FROM comment WHERE username = '".$name."' and movie = '".$movie."' ORDER BY time DESC");
			?>
			<div "privatecomment_output" style="width:50%;float: left">
				<?php while ($row = mysql_fetch_assoc($result)) { ?>
				<hr class="carved"><p><?php echo $row['comment']; ?></p>
				<p style="color:#007722"><?php echo $row['friendname']; ?></p></br>
				<?php } ?>
			</div>
			<?php
		}else{
			$result = mysql_query("SELECT * FROM comment WHERE username = '".$name."' and movie = '".$movie."' ORDER BY time DESC");
			$i = 0;
			?>
			<div "privatecomment_output" style="width:50%;float: left">
				<?php 
				while ($row = mysql_fetch_assoc($result)) {
					if($i==5){
						break;
					} 
				?>
				<hr class="carved"><p><?php echo $row['comment']; ?></p>
				<p style="color:#007722"><?php echo $row['friendname']; ?></p></br>
				<?php $i++;} ?>
			</div>
			<?php
		}
	}

	
	/*display global comments*/
	
	$countpublicresult = mysql_query("SELECT COUNT(*) as total2 FROM globalcom WHERE movie = '".$movie."'");
	$datanumber2 = mysql_fetch_assoc($countpublicresult);
	$countpublic = $datanumber2['total2'];
	if($countpublic <= 5){
			$result = mysql_query("SELECT * FROM globalcom WHERE movie = '".$movie."' ORDER BY time DESC");
			?>
			<div "publiccomment_output" style="width:50%;float: right">
				<?php while ($row = mysql_fetch_assoc($result)) { ?>				
				<hr class="carved"><p><?php echo $row['comment']; ?></p>
				<p style="color:#007722"><?php echo $row['userName']; ?></p></br>
				<?php } ?>
			</div>
			<?php
	}else{
		$result = mysql_query("SELECT * FROM globalcom WHERE movie = '".$movie."' ORDER BY time DESC");
		$i = 0;
		?>
		<div "publiccomment_output" style="width:50%;float: right">
			<?php 
			while ($row = mysql_fetch_assoc($result)) {
				if($i==5){
					break;
				} 
			?>
			<hr class="carved"><p><?php echo $row['comment']; ?></p>
			<p style="color:#007722"><?php echo $row['username']; ?></p></br>
			<?php $i++;} ?>
		</div>
		<?php
	}
	

	
	if(!empty($username)){ /*submit comment*/
		/*private comments submit*/		
		?>	
		<div id = "comment_input" style="float: left;width: 50%">
			<form id="pcom" action = "insertCom.php" method = "post" style="width:50%;float:left"> 
				<textarea name = "comment" id = "comment" placeholder= "comment" style="width:500px;height:300px"></textarea><br>
				<input type="hidden" name = "usersname" id = "usersname" value= "<?php echo $username ?>" >
				<input type="hidden" name = "movie" id = "movie" value= "<?php echo $movie ?>" >
				<input type="hidden" name = "thumb" id = "thumb" value= "negativecount" >			
				<input type="text" name = "friendname" id = "friendname" placeholder="Commentor" style="width:150px"><br/><br/>
				<script type="text/javascript">
				function thumbup(){
					$("#thumb").val("positivecount");
					$("pcom").submit();					
				}
				function thumbdown(){
					$("#thumb").val("negativecount");
					$("pcom").submit();	
				}
				</script>
				<input type="button" class="button form-button-submit" name = "up" id="up" value = "Thumb Up" style="width:200px;display:inline" onclick="thumbup();"/><br/><br/>
				<input type="button" class="button form-button-submit" name = "down" id="down" value = "Thumb Down" style="width:200px;display:inline" onclick="thumbdown();"/><br/><br/><br/>
			</form>
			<br class="clear"/>
		</div>
		<?php
	}else{
		if(!empty($_SESSION['loggedin']) && !empty($_SESSION['identifier'])){
			/* logined */ 
			$comname = $name;
		}else{
			$comname = "Anonymous";
		}
		/*global comments submit*/	
		?>
		<div id = "comment_input" style="float: left;width: 50%">
			<form method = "post" action = "insertGlobal.php" style="width:50%;float:left"> 
				<textarea name = "comment" id = "comment" placeholder= "comment" style="width:500px;height:300px" > </textarea><br/>
				<input type="hidden" name = "comname" id = "comname" value= "<?php echo $comname ?>" >
				<input type="hidden" name = "movie" id = "movie" value= "<?php echo $movie ?>" >
				<input class="button form-button-submit" type="submit" name="com" value="Submit" style="margin-left: 170px" ><br><br><br>
			</form>
			<br class="clear"/>
		</div>
	<?php
	}	
}
?>