<?php
include('authentication.php');
// session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');
 
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!--Add User Modal -->
      <div class="modal fade" id="AddIntroIMageModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="form-group">
                    <label for="">Image Name</label>
                    <input type="text" class="form-control" name="introimageName" placeholder="Image Name" required/>
                  </div>
                  
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="introImage" required/>
                      <label class="custom-file-label" for="customFile">Choose file </label>
                    </div>
                  </div>
                  
                  
                </div>
              </div>            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addIntroImage">Save </button>
              </div>
            </form>
          </div>
        </div>
      </div>



    <!-- Delete Modal -->
      <div class="modal fade" id="DeleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="code.php" method="POST">
              <div class="modal-body">
                  <input type="hidden" name="delete_id" class="delete_image_id">
                  <p>
                    Are you sure. You want to delete this data ?
                  </p>
               </div>            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="DeleteIntroImagebtn">Yes, Delete.! </button>
              </div>
            </form>
          </div>
        </div>
      </div>



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
              <li class="breadcrumb-item active">Add Images</li>
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
              <?php
                    if (isset($_SESSION['status'])){
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey! </strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="close" data-dismiss='alert' aria-lable='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>

                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }

              ?>

            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Intro-Images</h2>
                <a href="#" data-toggle="modal" data-target="#AddIntroIMageModel" class="btn btn-primary float-right btn-sm">Add Intro-Image </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image Name</th>
                    <th>Image</th>    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query = "SELECT * FROM introimage";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0){
                          while($rows = mysqli_fetch_assoc($query_run)){
                            // echo $rows['name'];

                            ?>
                            <tr>
                              <td><?php echo $rows['id']; ?></td>
                              <td><?php echo $rows['introimageName']; ?></td>                              
                              <td><?php echo '<img src="uploads/'.$rows['introImage'].'" width="200px" height="100px" alt='.$rows['introimageName'] .'>' ?></td>
                              <td>
                                <form action="introImage-edit.php" method="POST">
                                  <input type="hidden" name="introimgedit_id" value="<?php echo $rows['id']; ?>">
                                  <button type="submit" name="introimgedit"  class="btn btn-info btn-sm">Edit</button>
                                </form>   <br>                     
                                <button type="button" value="<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm deletebtn">Delete</button>
                              </td>
                            </tr>

                            <?php
                          }
                        }
                        
                    ?>
                  
                  </tbody>
                  
                </table>
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

<script>
    $(document).ready(function (){
      $('.deletebtn').click(function (e){
        e.preventDefault();

        var user_id = $(this).val();
        // console.log(user_id);
        $('.delete_image_id').val(user_id);
        $('#DeleteModel').modal('show');


      });
    });
</script>


<?php include("includes/footer.php"); ?>