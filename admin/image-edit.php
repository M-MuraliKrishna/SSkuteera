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
              <li class="breadcrumb-item active">Edit Images</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Edit - Images</h2>
                <a href="imageAdd.php"  class="btn btn-danger float-right btn-sm">Back </a>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <?php
                    if(isset($_POST['imgedit'])){
                      $id=$_POST['imgedit_id'];

                      $query= "SELECT * FROM images WHERE id='$id' ";
                      $query_run = mysqli_query($conn,$query);

                      foreach($query_run as $row){
                        ?>

                        
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="row">

                          <input type="hidden" name="imgedit_id" value="<?php echo $row['id']; ?>">
                          <div class="form-group col-12">
                            <label for="">Image Name</label>
                            <input type="text" class="form-control" name="imageName" value="<?php echo $row['imageName']; ?>" placeholder="Image Name" required/>
                          </div>
                          
                          <div class="form-group col-12">
                            <!-- <label for="customFile">Custom File</label> -->
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" value="<?php echo $row['imagePic']; ?>" name="imagePic" required/>
                              <label class="custom-file-label" for="customFile">Choose file </label>
                            </div>
                          </div>
                          
                        </div>
                      </div>            
                      <div class="modal-footer">
                        <a href="imageAdd.php" class="btn btn-secondary" >Close</a>
                        <button type="submit" class="btn btn-primary" name="updateImage">Update </button>
                      </div>
                    </form>
                    <?php
                      }
                    }
                    ?>
                    </div>
                </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <?php include("includes/script.php"); ?>
  <script>
    $('#customFile').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
<?php include("includes/footer.php"); ?>