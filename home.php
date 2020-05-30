<?php
	session_start();
	if($_SESSION['uname'] != null){
		$old_data = file_get_contents('db.json');  
	    $current_data = json_decode($old_data, true);
	    usort($current_data['comments'], function($a, $b) {
    		return $a['date'] < $b['date'];
		});
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
					<h3 style="margin-bottom: 30px;"><a href="#" style="color: #24a0ed!important;"><i class="fa fa-home"></i> Home</a></h3>
					<h3 style="margin-bottom: 30px;"><a href="profile.php" style="color: black!important;"><i class="fa fa-user" style="margin-right: 15px;"></i>Profile</a></h3>
					<h3><a href="security.php" style="color: black!important;"><i class="fa fa-lock" style="margin-right: 15px;"></i>Security</a></h3>
				</div>
				<div style="width: 75%; float: left;">
					<h1 style="margin-top: 0;">Comment Wall <small style="font-weight: 400; font-size: 16px;">last <?php echo count($current_data['comments']); ?> posts</small></h1>
					<?php
						if(!$current_data['comments']){
							echo "<h4>No comments</h4>";
						}
						else{
							if(isset($_SESSION['ctemp']) && !empty($_SESSION['ctemp'])){
								echo "<div class='alert' style='background: #d4edda;'>Your comment added successfully.</div><br>";
							}
							foreach($current_data['comments'] as $value) {
						        ?>
						        <div style="border-left: 1px solid #ced4da; padding-left: 25px;">
						        	<h4><?php print_r($value['comment']); ?></h4>
						        	<p><span>----</span> <b><?php print_r($value['uname']); ?></b> at <?php print_r($value['date']); ?></p>
						        </div>
						        <br>
						        <?php
						    }
						}
					?>
					<br><br>
					<form action="addComment.php" method="POST">
						<label for="comment">Leave comment</label><br>
						<textarea id="comment" rows="5" name="comment" style="width: 100%;" required></textarea><br><br>
					  	<button type="submit" class="button" style="background: #24a0ed;"><i class="fa fa-comment"></i> Comment</button>
					</form>
				</div>
			</div>
			<br>
			<div style="background: #ECF0F1; padding: 25px; text-align: center;">Copyright by <i class="fa fa-copyright"></i> Advanced Security 2020</div>
			<script type="text/javascript" src="fontawesome.min.js"></script>
		</body>
		</html>
		<?php
	}
	else{
    	header("Location: ./");
    	die();
	}
?>	