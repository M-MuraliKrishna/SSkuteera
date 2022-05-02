<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SS Kuteera</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php 
              if(isset($_SESSION['auth']))
              {
                echo $_SESSION['auth_user']['user_name']; 
              }
              else{
                echo "Not Logged In ";
              }
            
            ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="introImage.php" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Intro Image
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>            
          </li>          
          <li class="nav-item">
            <a href="introVideo.php" class="nav-link">
              <i class="nav-icon fas fa-file-video"></i>
              <p>
                Intro Video
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="imageAdd.php" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Gallery Images
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="activitesImage.php" class="nav-link">
              <i class="nav-icon fa fa-rss"></i>
              <p>
                 Activites Images
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="accomo.php" class="nav-link">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Accommodation Images
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Enquiry's
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="contactQ.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Enquiry's</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="feedbackQ.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedback Enquiry's</p>
                </a>
              </li>              
            </ul>
          </li>
          
          <br>
         
          <li class="nav-header">Settings</li>
          
          <!-- <li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
              <p>Login & Register </p>
            </a>            
          </li> -->
          
          <li class="nav-item">
            <a href="registered.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p> Registered Users</p>
            </a>            
          </li>
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>