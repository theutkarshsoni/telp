<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CariKture</title>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 style="margin: 100px auto 50px; text-align: center;">Advanced Secuirty</h1>
	<div class="login-form" style="margin-bottom: 100px;">
		<form action="addUser.php" method="POST">
			<h3 style="margin: 0 auto 25px;">SIGNUP</h3>
			<?php
				if(isset($_SESSION['serror']) && !empty($_SESSION['serror'])){
					echo "<div class='alert' style='background: #f8d7da;'>User name has been taken. Try another one.</div><br>";
				}
			?>
			<label for="uname">User Name</label><br>
			<input type="text" id="uname" name="uname" style="width: 100%;" required><br><br>
			<label for="pwd">Password</label><br>
			<input type="password" id="pwd" name="pwd" style="width: 100%;" required><br><br>
			<label for="fname">First Name</label><br>
			<input type="text" id="fname" name="fname" style="width: 100%;" required><br><br>
			<label for="lname">Last Name</label><br>
			<input type="text" id="lname" name="lname" style="width: 100%;" required><br><br>
			<label for="address">Address</label><br>
			<input type="text" id="address" name="address" style="width: 100%;" required><br><br>
			<label for="phone">Phone</label><br>
			<input type="tel" id="phone" name="phone" style="width: 100%;" pattern="[6-9]{1}[0-9]{9}" required><br><br>
			<button type="submit" class="button" style="width: 100%; background: #27AE60;">Signup</button>
			<br><br>
			<p style="text-align: center; margin-bottom: 0;">Already have an account? <a href="./">Log In</a></p>
		</form>
	</div>
</body>
</html>