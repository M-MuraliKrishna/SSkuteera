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
              <li class="breadcrumb-item active">Contact Enquiry's</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Contact</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="code.php" method="POST">
              <div class="modal-body">
                  <input type="hidden" name="delete_id" class="delete_user_id">
                  <p>
                    Are you sure. You want to delete this data ?
                  </p>
               </div>            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="Deletecontactbtn">Yes, Delete.! </button>
              </div>
            </form>
          </div>
        </div>
      </div>

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
                <h2 class="card-title">Contact Enquiry's</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>                    
                    <th>Message</th>                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query = "SELECT * FROM contactus";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0){
                          foreach($query_run as $rows){
                            // echo $rows['name'];
                            ?>
                            <tr>
                              <td><?php echo $rows['id']; ?></td>
                              <td>  <?php echo $rows['name']; ?>  </td>
                              <td><?php echo $rows['email']; ?></td>
                              <td><?php echo $rows['mobile']; ?></td>
                              <td><?php echo $rows['message']; ?></td>    
                              <td>
                                <button type="button" value="<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm deletebtn">Delete</button>
                              </td>
                            </tr>

                            <?php
                          }
                        }
                        else{
                          ?>
                          <tr>
                            <td>No Record Found</td>
                          </tr>

                          <?php
                        }
                    ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>                    
                    <th>Message</th>                    
                    <th>Action</th>
                  </tr>
                  </tfoot>
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
    $(document).ready(function (){
      $('.deletebtn').click(function (e){
        e.preventDefault();

        var user_id = $(this).val();
        // console.log(user_id);
        $('.delete_user_id').val(user_id);
        $('#DeleteModel').modal('show');

      });
    });
   
</script>
<?php include("includes/footer.php"); ?>