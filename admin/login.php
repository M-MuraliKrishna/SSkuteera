<?php
session_start();
include('includes/header.php');

if(isset($_SESSION['auth'])){
    $_SESSION['status']='Your already Logged In ';
    header("Location: index.php");
    exit(0);
}

?>

<div class="hold-transition login-page">
    <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>SS Kuteera</b> Admin</a>
        </div>
        <div class="card-body">
        <?php
            if (isset($_SESSION['auth_status'])){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey! </strong> <?php echo $_SESSION['auth_status']; ?>
                    <button type="button" class="close" data-dismiss='alert' aria-lable='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>

                </div>
                <?php
                unset($_SESSION['auth_status']);
            }

            ?>

        <?php include('message.php'); ?>
        

        <form action="logincode.php" method="POST">
            <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Remember Me
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

        <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
<!-- /.login-box -->
</div>

<?php include("includes/script.php"); ?>
<?php include("includes/footer.php"); ?>