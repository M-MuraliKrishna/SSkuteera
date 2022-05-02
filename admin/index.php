<?php
// session_start();
include('authentication.php');
include('config/dbconn.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <?php include('message.php'); ?>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
                  $query="SELECT id FROM images ORDER BY id";
                  $query_run = mysqli_query($conn,$query);
                  $row = mysqli_num_rows($query_run);
                  echo "<h3> ".$row." </h3> ";
                ?>

                <p>Images</p>
              </div>
              <div class="icon">
                <i class="fas fa-images"></i>
              </div>
              <a href="imageAdd.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php 
                  $query="SELECT id FROM accomoimages ORDER BY id";
                  $query_run = mysqli_query($conn,$query);
                  $row = mysqli_num_rows($query_run);
                  echo "<h3> ".$row." </h3> ";
                ?>                                       <!--<sup style="font-size: 20px">%</sup>-->

                <p>Accommodations  </p>
              </div>
              <div class="icon">
                <i class="fas fa-file-video"></i>
              </div>
              <a href="accomo.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                  $query="SELECT id FROM users ORDER BY id";
                  $query_run = mysqli_query($conn,$query);
                  $row = mysqli_num_rows($query_run);
                  echo "<h3> ".$row." </h3> ";
                ?>
                <p>Users / Staff</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="registered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php 
                  $query="SELECT id FROM contactus ORDER BY id";
                  $query_run = mysqli_query($conn,$query);
                  $row = mysqli_num_rows($query_run);
                  echo "<h3> ".$row." </h3> ";
                ?>

                <p>Enquirys</p>
              </div>
              <div class="icon">
                <i class="fas fa-question-circle"></i>
              </div>
              <a href="contactQ.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <?php include("includes/script.php"); ?>
<?php include("includes/footer.php"); ?>