<?php
// session_start();
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');

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
              <li class="breadcrumb-item active">Edit-Registered Users</li>
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
                <h2 class="card-title">Edit - Registered Users</h2>
                <a href="registered.php"  class="btn btn-danger float-right btn-sm">Back </a>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="code.php" method="POST">
                            <div class="modal-body">
                                <?php
                                    if(isset($_GET['user_id'])){
                                        $user_id = $_GET['user_id'];
                                        $query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
                                        $query_run= mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run)>0){
                                            foreach($query_run as $row){
                                                ?>
                                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Name" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="email" placeholder="Email id" required/>
                                                </div>                  
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['password']; ?>" name="password" placeholder="Password" required/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Phone number</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['phoneno']; ?>" name="phoneno" placeholder="Phone Number" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Give Role</label>
                                                    <select name="role_as" class="form-control" required>
                                                      <option value="">Select</option>
                                                      <option value="0">User</option>
                                                      <option value="1">Admin</option>
                                                    </select>
                                                </div>
                                                <?php
                                            }
                                        }
                                        else{
                                            echo "<h4>No Record Found.!</h4>";
                                        }
                                    }
                                ?>
                                    
                                
                            </div>            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info" name="updateUser">Update </button>
                            </div>
                        </form>
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

</div>

<?php include("includes/script.php"); ?>
<?php include("includes/footer.php"); ?>