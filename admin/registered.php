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
      <div class="modal fade" id="AddUserModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="code.php" method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required/>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <span class="email_error text-danger ml-2"></span>
                    <input type="email" class="form-control email_id" name="email" placeholder="Email id" required/>
                  </div>                  
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Password" required/>
                  </div>
                  <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confpwd" onkeyup="chkpwd();" placeholder="Confirm Password" required/>
                    <span id="msg"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="">Phone number</label>
                    <input type="text" class="form-control" name="phoneno" placeholder="Phone Number" required/>
                  </div>
                </div>
              </div>            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addUser">Save </button>
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
              <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
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
                <button type="submit" class="btn btn-primary" name="DeleteUserbtn">Yes, Delete.! </button>
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
              <li class="breadcrumb-item active">Registered Users</li>
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
                <h2 class="card-title">Registered Users</h2>
                <a href="#" data-toggle="modal" data-target="#AddUserModel" class="btn btn-primary float-right btn-sm">Add User </a>
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
                    <th>Role</th>                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query = "SELECT * FROM users";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0){
                          foreach($query_run as $rows){
                            // echo $rows['name'];
                            ?>
                            <tr>
                              <td><?php echo $rows['id']; ?></td>
                              <td>  <?php echo $rows['name']; ?>  </td>
                              <td><?php echo $rows['email']; ?></td>
                              <td><?php echo $rows['phoneno']; ?></td>
                              <td><?php
                                if($rows['role_as']=="0"){
                                  echo "User";
                                }
                                elseif ( $rows['role_as'] == '1') {
                                // elseif ( $rows['role_as'] == '1'){           if you want to add futher roles
                                  echo "Admin";
                                }
                                else{
                                  echo "Invalid User";
                                }
                                  
                                  ?></td>
                              
                              <td>
                                <a href="registered-edit.php?user_id=<?php echo $rows['id']; ?>" class="btn btn-info btn-sm">Edit</a>
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
                    <th>Role</th>                    
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
        $('.email_id').keyup(function(e){
          var email = $('.email_id').val();
          // console.log(email);

          $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              'check_Emailbtn':1,
              'email':email,
            },
            success: function(response){
              $('.email_error').text(response);
            }
          });

        });
    });
</script>

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

    var chkpwd=function(){
      if(document.getElementById('pwd').value == document.getElementById('confpwd').value){
        document.getElementById('msg').innerHTML="Password is matching";
        document.getElementById('msg').style.color="green";
      }
      else{
        document.getElementById('msg').innerHTML="Password is not matching";
        document.getElementById('msg').style.color="red";
      }
    }
</script>


<?php include("includes/footer.php"); ?>