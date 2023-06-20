<style>
.movie-sidebar {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 5px;
}

.movie-sidebar h3 {
  font-size: 24px;
  margin-bottom: 15px;
}

.content-left {
  display: flex;
  margin-bottom: 20px;
}

.listimg {
  flex: 0 0 30%;
  max-width: 30%;
}

.listimg img {
  width: 100%;
  height: auto;
}

.text {
  flex: 0 0 70%;
  max-width: 70%;
  padding-left: 20px;
}

.link4 {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  text-decoration: none;
}

.data {
  font-size: 14px;
  color: #888;
}

.color2 {
  color: #555;
}
</style>

<div class="movie-sidebar">
  <h3>Current Shows</h3>
  <?php
  $today = date("Y-m-d");
  $qry2 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE status='0' ORDER BY rand() LIMIT 3");

  while ($m = mysqli_fetch_array($qry2)) {
  ?>
    <div class="content-left">
      <div class="listimg listimg_1_of_2">
        <a href="about.php?id=<?php echo $m['movie_id']; ?>"><img src="<?php echo $m['image']; ?>"></a>
      </div>
      <div class="text list_1_of_2">
        <div class="extra-wrap1">
          <a href="about.php?id=<?php echo $m['movie_id']; ?>" class="link4"><?php echo $m['movie_name']; ?></a><br>
          <span class="data">Date: <?php echo $m['release_date']; ?></span><br>
          Artist: <span class="data"><?php echo $m['cast']; ?></span><br>
          Description: <span class="color2"><?php echo $m['desc']; ?></span><br>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  <?php
  }
  ?>
</div>
