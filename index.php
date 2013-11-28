<?php include "connectdb.php"; ?>
<?php include_once 'header.php'; ?>
	<div class="wrapper wrapper-style1 wrapper-first">
		<article id="index" class="container">
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
			<h1>index</h1><br />
		</article>
	</div>	
	<div class="wrapper wrapper-style3">
		<article id="result">
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
			<h1>result</h1><br />
		</article>
	</div>
	<?php 
		if(empty($_SESSION['loggedin'])){	
	?>		
	<div class="wrapper wrapper-style4">

		<article id="signin" class="container small">
		<br />
		<br />
		<br />
		<br />
		<?php include "signin.php";?>
		</article>

	</div>	
	<div class="wrapper wrapper-style4">

		<article id="signup" class="container small">
		<br />
		<br />
		<br />
		<br />
		<?php include "signup.php"; ?>
		</article>
	</div>
	<div class="wrapper wrapper-style4">
		<article id="findpw" class="container small">
		<br />
		<br />
		<br />
		<br />	
		<?php include "findpw.php"; ?>
		</article>
	</div>
	<?php
		}
	?>
</div>
</body>
</html>