<?php
include('header.php');
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Running Movies</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th class="col-md-1">S.N.</th>
                  <th class="col-md-3">Name</th>
                  <th class="col-md-4">Email</th>
                  <th class="col-md-4">Phone</th>
				  <th class="col-md-4">Age</th>
				  <th class="col-md-4">Gender</th>
                </tr>
                <?php 
					$qry8=mysqli_query($con,"select * from tbl_registration");
					$no=1;
					while($scn=mysqli_fetch_array($qry8)) {
					?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><span class="badge bg-blue"><?php echo $scn['name'];?></span></td>
				  <td><span class="badge bg-green"><?php echo $scn['email'];?></span></td>
				  <td><span class="badge bg-cyan"><?php echo $scn['phone'];?></span></td>
				  <td><span class="badge bg-green"><?php echo $scn['age'];?></span></td>
				  <td><span class="badge bg-green"><?php echo $scn['gender'];?></span></td>
                  </tr>
                  <?php
					       $no=$no+1;
					  
					}
                  ?>
              </table>
            </div>
            <!-- /.box-body -->
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