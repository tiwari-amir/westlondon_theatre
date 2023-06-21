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

	.section {
		margin-bottom: 30px;
	}

	.about {
		width: 50%;
		float: left;
	}

	.about-top {
		margin-top: 30px;
		display: flex;
		align-items: flex-start;
	}

	.grid.images_3_of_2 {
		width: 40%;
		margin-right: 30px;
	}

	.grid.images_3_of_2 img {
		width: 100%;
		height: auto;
	}

	.desc {
		width: 60%;
	}

	.p-link {
		margin: 0;
		font-size: 15px;
	}

	.watch_but {
		display: inline-block;
		margin-top: 20px;
		padding: 10px 20px;
		background-color: #207cca;
		color: #fff;
		text-decoration: none;
		border-radius: 4px;
		transition: background-color 0.3s ease;
	}

	.watch_but:hover {
		background-color: #134d82;
	}

	.table {
		width: 100%;
		border-collapse: collapse;
		margin-top: 30px;
	}

	.table td {
		padding: 10px;
	}

	.btn {
		display: inline-block;
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
	}

	.btn-default {
		color: #333;
		background-color: #fff;
		border-color: #ccc;
	}

	.btn-info {
		color: #fff;
		background-color: #5bc0de;
		border-color: #46b8da;
	}

	.btn-info:hover {
		color: #fff;
		background-color: #31b0d5;
		border-color: #269abc;
	}

	.btn-danger {
		color: #fff;
		background-color: #d9534f;
		border-color: #d43f3a;
	}

	.btn-danger:hover {
		color: #fff;
		background-color: #c9302c;
		border-color: #ac2925;
	}
</style>
<?php
include('header.php');
if (!isset($_SESSION['user'])) {
	header('location:login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
?>

<div class="content">
	<div class="wrap">
		<div class="content-top">
			<div class="section group">
				<div class="about span_1_of_2">
					<h3><?php echo $movie['movie_name']; ?></h3>
					<div class="about-top">
						<div class="grid images_3_of_2">
							<img src="<?php echo $movie['image']; ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<p class="p-link" style="font-size:15px">Artist: <?php echo $movie['cast']; ?></p>
							<p class="p-link" style="font-size:15px">Date: <?php echo date('d-M-Y', strtotime($movie['release_date'])); ?></p>
							<p style="font-size:15px"><?php echo $movie['desc']; ?></p>
							
						</div>
						<div class="clear"></div>
					</div>
					<table class="table table-hover table-bordered text-center">
						<?php
						$s = mysqli_query($con, "select * from tbl_shows where s_id='" . $_SESSION['show'] . "'");
						$shw = mysqli_fetch_array($s);

						$t = mysqli_query($con, "select * from tbl_theatre where id='" . $shw['theatre_id'] . "'");
						$theatre = mysqli_fetch_array($t);
						?>
						<tr>
							<td class="col-md-6">
								Theatre
							</td>
							<td>
								<?php echo $theatre['name'] . ", " . $theatre['place']; ?>
							</td>
						</tr>
						<tr>
							<td>
								Screen
							</td>
							<td>
								<?php
								$ttm = mysqli_query($con, "select  * from tbl_show_time where st_id='" . $shw['st_id'] . "'");

								$ttme = mysqli_fetch_array($ttm);

								$sn = mysqli_query($con, "select  * from tbl_screens where screen_id='" . $ttme['screen_id'] . "'");

								$screen = mysqli_fetch_array($sn);
								echo $screen['screen_name'];

								?>
							</td>
						</tr>
							<tr>
								<td>
									Date
								</td>
								<td>
									<?php
									if (isset($_GET['date'])) {
										$date = $_GET['date'];
									} else {
										if ($shw['start_date'] > date('Y-m-d')) {
											$date = date('Y-m-d', strtotime($shw['start_date'] . "-1 days"));
										} else {
											$date = date('Y-m-d');
										}
										$_SESSION['dd'] = $date;
									}
									?>
									<div class="col-md-12 text-center" style="padding-bottom:20px">
										<?php if ($date > $_SESSION['dd']) { ?><a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "-1 days")); ?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button></a> <?php } ?><span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y', strtotime($date)); ?></span>
										<?php if ($date != date('Y-m-d', strtotime($_SESSION['dd'] . "+4 days"))) { ?>
											<a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "+1 days")); ?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
										<?php }
										$av = mysqli_query($con, "select sum(no_seats) from tbl_bookings where show_id='" . $_SESSION['show'] . "' and ticket_date='$date'");
										$avl = mysqli_fetch_array($av);
										?>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									Show Time
								</td>
								<td>
									<?php echo date('h:i A', strtotime($ttme['start_time'])) . " " . $ttme['name']; ?> Show
								</td>
							</tr>
							<tr>
								<td colspan=2>
								
								</td>
										</tr>	
							<tr>
								<td>
									Number of Seats
								</td>
								<td>
									<form action="process_booking.php" method="post">
										<input type="hidden" name="screen" value="<?php echo $screen['screen_id']; ?>" />
										<input type="text" required title="Number of Seats" max="<?php echo $screen['seats'] - $avl[0]; ?>" min="0" name="seats" class="form-control" value=""  style="text-align:center" id="seats"/ readonly>
										<input type="hidden" name="amount" id="hm" value="<?php echo $screen['charge']; ?>" />
										<input type="hidden" name="date" value="<?php echo $date; ?>" />
										
								</td>
							</tr>
							<tr>
							<tr>
								<td>
								Selected Seats
								</td>
								<td> 
								<span id="seat-details" name="selectedseats"></span>
								<br>
								

							</td>
							</tr>
								<td>
									Amount
								</td>
								<td id="amount-value" style="font-weight:bold;font-size:18px">
									£ <?php echo $screen['charge']; ?>
								</td>
								</tr>	
							<tr>
								<td colspan="2"><?php if ($avl[0] == $screen['seats']) { ?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
											<button class="btn btn-info" style="width:100%">Book Now</button>
										<?php } ?>
									</form>
									</td>
									</tr>
									</table>
									<table>
										<tr>
											<td></td>
										</tr>
									</table>
								</div>
								<?php include('seat_layout.php');?>
								<?php include('movie_sidebar.php'); ?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<?php include('footer.php'); ?>
				<?php
				//$charge = $screen['charge']; // Assuming $screen['charge'] holds the desired value
				?>
				<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var charge = <?php echo $screen['charge']; ?>;

    $('#seats').change(function() {
      var seats = $(this).val();
      var amount = charge * seats;
      $('#amount-value').html("£ " + amount);
      $('#amount').val(amount);
    });
  });
</script>

</div>
</div>
</div>

</body>
</html>
