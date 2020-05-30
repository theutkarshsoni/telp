<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CariKture</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 style="margin: 100px auto 50px; text-align: center;">Advanced Security</h1>
	<div class="login-form" style="margin-bottom: 100px;">
		<form action="checkUser.php" method="POST">
			<h3 style="margin: 0 auto 25px;">LOGIN</h3>
			<?php
				if(isset($_SESSION['lerror']) && !empty($_SESSION['lerror'])){
					echo "<div class='alert' style='background: #f8d7da;'>You have entered wrong credentials.</div><br>";
				}
			?>
			<label for="uname">Username</label><br>
			<input type="text" id="uname" name="uname" style="width: 100%;" required><br><br>
			<label for="pwd">Password</label><br>
			<input type="password" id="pwd" name="pwd" style="width: 100%;" required><br><br>
		  	<button type="submit" class="button" style="width: 100%; background: #27AE60;">Login</button>
		  	<br><br>
		  	<p style="text-align: center; margin-bottom: 0;">Don't have an account? <a href="signup.php">Sign Up</a></p>
		</form>
	</div>
</body>
</html>