<?php
include('config.php');
session_start();
date_default_timezone_set('Europe/London');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>WestLondon Theatre | Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body {
		background-image: url("https://c1.wallpaperflare.com/path/570/413/91/interior-theatre-theater-empty-theater-87d7d2e44fd62221f578a00975ca3cab.jpg");
		background-size: 100%;
		margin: 0;
		padding: 0;
	}

	.container {
		max-width: 1200px;
		margin: 0 auto;
		padding: 0 20px;
	}

	.header {
		background: none;
		padding: 20px 0;
	}

	.h-logo {
		margin-top: 10px;
		margin-right: 10px;
	}

	.h-logo a {
		font-size: 28px;
		font-weight: bold;
		text-decoration: none;
		color: #fff;
	}

	.nav-wrap {
		margin-top: 25px;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.group {
		list-style: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
	}

	.group li {
		display: inline-block;
	}

	.group li a {
		display: block;
		padding: 10px 15px;
		font-size: 18px;
		font-weight: bold;
		text-decoration: none;
		color: #fff;
	}

	.group li a:hover {
		color: #ffd700;
	}

	.block {
		padding: 100px 0;
		text-align: center;
		color: #fff;
		height: 100vh;
	}

	.block h2 {
		font-size: 48px;
		font-weight: bold;
		margin-bottom: 30px;
	}

	.block p {
		font-size: 24px;
		margin-bottom: 30px;
	}

	.block .btn {
		display: inline-block;
		padding: 15px 30px;
		font-size: 18px;
		font-weight: bold;
		text-decoration: none;
		background-color: #ffd700;
		color: #333;
		border-radius: 5px;
		transition: background-color 0.3s ease;
	}

	.block .btn:hover {
		background-color: #ffcc00;
	}
</style>
</head>
<body>
<div class="header">
	<div class="container">
		<div class="h-logo">
			<a href="index.php">WestLondon Theatre</a>
		</div>
		<div class="nav-wrap">
			<ul class="group" id="example-one">
				<li><a href="index.php">Home</a></li>
				<li><a href="movies_events.php">Shows</a></li>
				<li>
					<?php if(isset($_SESSION['user'])){
						$us = mysqli_query($con,"select * from tbl_registration where user_id='".$_SESSION['user']."'");
						$user = mysqli_fetch_array($us);
						?>
						<a href="profile.php"><?php echo $user['name'];?></a>
						<a href="logout.php">Logout</a>
					<?php }else{ ?>
						<a href="login.php">Login</a>
					<?php } ?>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
