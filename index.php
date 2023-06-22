<html>
<head>
	<title>Welcome to WestLondon Theatre</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		.container {
			margin-top: 50px;
		}

		.container h2 {
			font-size: 36px;
			font-weight: bold;
			margin-bottom: 20px;
			color: #ada5a6;
		}

		.container p {
			font-size: 20px;
			margin-bottom: 30px;
			color: #ffd1d6;
		}

		.container .btn {
			padding: 10px 20px;
			font-size: 18px;
			font-weight: bold;
			background-color: #333;
			color: #fff;
			text-decoration: none;
			border-radius: 5px;
		}

		.content {
			margin-top: 50px;
		}

		.content-top {
			display: flex;
			justify-content: space-between;
		}

		.listview_1_of_3 {
			width: 70%;
		}

		.listview_1_of_3 h3 {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
			color: #333;
		}

		.listview_1_of_3 .content-left {
			display: flex;
			margin-bottom: 20px;
		}

		.listview_1_of_3 .listimg_1_of_2 {
			width: 30%;
		}

		.listview_1_of_3 .listimg_1_of_2 img {
			width: 100%;
			height: auto;
		}

		.listview_1_of_3 .text {
			width: 70%;
			padding-left: 15px;
			box-sizing: border-box;
		}

		.listview_1_of_3 .text .extra-wrap {
			font-size: 16px;
			color: #666;
		}

		.movie-sidebar {
			width: 50%;
		}

		.movie-sidebar h3 {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
			color: #333;
		}

		.movie-sidebar .content-left {
			display: flex;
			margin-bottom: 20px;
		}

		.movie-sidebar .listimg_1_of_2 {
			width: 40%;
		}

		.movie-sidebar .listimg_1_of_2 img {
			width: 100%;
			height: auto;
		}

		.movie-sidebar .text {
			width: 60%;
			padding-left: 15px;
			box-sizing: border-box;
		}

		.movie-sidebar .text .extra-wrap1 {
			font-size: 16px;
			color: #666;
		}
	</style>
</head>
<body>
<?php include('header.php'); ?>

<div class="block">
	<div class="container">
		<h2>Welcome to WestLondon Theatre</h2>
		<p>Experience the Magic of Live Entertainment</p>
		<a href="#events-section" class="btn">View Events</a>
	</div>
</div>

<div class="content" id="events-section">
	<div class="wrap">
		<div class="content-top">
		<?php include('movie_sidebar.php'); ?>
			<div class="listview_1_of_3 images_1_of_3">
				<h3>Upcoming Shows/Movies</h3>
				<?php
				$qry3 = mysqli_query($con, "SELECT * FROM tbl_news");

				while ($n = mysqli_fetch_array($qry3)) {
				?>
					<div class="content-left">
						<div class="listimg listimg_1_of_2">
							<img src="admin/<?php echo $n['attachment']; ?>">
						</div>
						<div class="text list_1_of_2">
							<div class="extra-wrap">
								<span style="text-color:#000" class="data"><strong><?php echo $n['name']; ?></strong><br>
								<span style="text-color:#000" class="data"><strong>Artist: <?php echo $n['cast']; ?></strong><br>
								<div class="data">Date: <?php echo $n['news_date']; ?></div>
								<span class="text-top"><?php echo $n['description']; ?></span>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				<?php
				}
				?>
			</div>

			
		</div>
	</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
