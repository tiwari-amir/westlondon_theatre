
<head>
	<title>Staff-Customer Booking</title>
	<style>
		.content {
			padding-bottom: 0px !important;
		}

		.wrap {
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 20px;
		}

		.content-top {
			margin-top: 30px;
		}

		.content-top h3 {
			font-size: 24px;
			margin-bottom: 20px;
		}

		.col_1_of_4 {
			width: 25%;
			padding: 0 10px;
			box-sizing: border-box;
			float: left;
		}

		.imageRow {
			position: relative;
			overflow: hidden;
			margin-bottom: 20px;
		}

		.single {
			width: 100%;
			position: relative;
		}

		.single img {
			width: 100%;
			height: auto;
			transition: transform 0.3s ease-in-out;
		}

		.single:hover img {
			transform: scale(1.1);
		}

		.movie-text {
			padding: 10px 0;
		}

		.h-text {
			margin: 0;
			font-size: 18px;
		}

		.color2 {
			color: #207cca;
		}

		.clear::after {
			content: "";
			display: table;
			clear: both;
		}
	</style>
</head><?php
include('header.php');
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Select From Movies/Shows To Book
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Movies List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
      <div class="content">
		<div class="wrap">
			<div class="content-top">
				<h3>Current Movies/Shows...</h3>

				<?php
				$today = date("Y-m-d");
				$qry2 = mysqli_query($con, "SELECT * FROM tbl_movie");

				$count = 0;
				while ($m = mysqli_fetch_array($qry2)) {
					$count++;
				?>
					<div class="col_1_of_4">
						<div class="imageRow">
							<div class="single">
								<a href="about.php?id=<?php echo $m['movie_id']; ?>"><img src="../../<?php echo $m['image']; ?>" alt="" /></a>
							</div>
							<div class="movie-text">
								<h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id']; ?>"><?php echo $m['movie_name']; ?></a></h4>
								Artist: <span class="color2"><?php echo $m['cast']; ?></span><br>
							</div>
						</div>
					</div>

					<?php
					// Clear float after every fourth column
					if ($count % 4 == 0) {
						echo '<div class="clear"></div>';
					}
					?>
				<?php
				}
				?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>