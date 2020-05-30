<?php 
	session_start();
	if($_SESSION['uname'] != null){
		$old_data = file_get_contents('db.json');  
	    $current_data = json_decode($old_data, true);
	    $flag = 0;
	    foreach($current_data['users'] as $value) {
	        if($_SESSION['uname'] == $value['uname'] ){
	        	$flag = 0;
	            break;
	        }
	        else{
	            $flag = 1;
	        }
	    }
	    if($flag == 1){
	    	header("Location: ./");
	    	die();
	    }
	    else{
	    	?>
	    	<!DOCTYPE html>
				<html>
				<head>
					<title>CariKture</title>
					<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
					<link rel="stylesheet" type="text/css" href="style.css">
				</head>
				<body>
					<ul>
						<li><a href="#"><b>Advanced Security</b></a></li>
						<li style="float: right;" class="dropdown">
							Welcome, <?php echo $_SESSION['uname']; ?><a href="javascript:void(0)" class="dropbtn"><i class="fa fa-caret-down"></i></a>
							<div class="dropdown-content">
								<a href="profile.php"><i class="fa fa-user" style="margin-right: 10px;"></i>Profile</a>
								<a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
							</div>
						</li>
					</ul>
					<div class="row" style="padding: 50px 100px;">
						<div style="width: 25%; float: left;">
							<h3 style="margin-bottom: 30px;"><a href="home.php" style="color: black!important;"><i class="fa fa-home"></i> Home</a></h3>
							<h3 style="margin-bottom: 30px;"><a href="profile.php" style="color: black!important;"><i class="fa fa-user" style="margin-right: 15px;"></i>Profile</a></h3>
							<h3><a href="#" style="color: #24a0ed!important;"><i class="fa fa-lock" style="margin-right: 15px;"></i>Security</a></h3>
						</div>
						<div style="width: 75%; float: left;">	        	
					     	<div style="border: 1px solid #ced4da; border-radius: 5px;">
					     		<div style="background: #ECF0F1; padding: 20px;">Update Password</div>
					     		<div style="padding: 20px;">
					     			<form action="updatePwd.php" method="POST">
					     				<?php
											if(isset($_SESSION['ptemp']) && $_SESSION['ptemp'] == 'success'){
												echo "<div class='alert' style='background: #d4edda;'>Your password updated successfully.</div><br>";
											}
											if(isset($_SESSION['ptemp']) && $_SESSION['ptemp'] == 'error'){
												echo "<div class='alert' style='background: #f8d7da;'>The passwords didn't match.</div><br>";
											}
										?>
										<label for="npwd">New Password</label><br>
										<input type="password" id="npwd" name="npwd" style="width: 100%;"required><br><br>
										<label for="cnpwd">Confirm New Password</label><br>
										<input type="password" id="cnpwd" name="cnpwd" style="width: 100%;"required><br><br>
										<button type="submit" class="button" style="background: #24a0ed;">Submit</button>
										<br><br>
									</form>
					     		</div>
					     	</div>
					    </div>
					</div>
					 <br>
					<div style="background: #ECF0F1; padding: 25px; text-align: center;">Copyright by <i class="fa fa-copyright"></i> Advanced Security 2020</div>
					<script type="text/javascript" src="fontawesome.min.js"></script>
				</body>
				</html>
	    	<?php
	    }
	}
	else{
    	header("Location: ./");
    	die();
	}
?>