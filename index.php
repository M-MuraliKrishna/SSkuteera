<?php
include('config/dbconn.php');
?>

<html>
<head>
<title>Home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<!-- flatpicker  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
<div class="text-center"> 
<a class="navbar-brand " href="#">
      <img src="img/image.png" alt="" width="50" height="50" >
     <h3 style="color:#2c9184;">SS KUTEERA</h3>
</a>
</div>

<nav class="navbar navbar-expand-lg navbar-dark nav-bg">
  <div class="container">
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item"><a class="nav-link" href="tel:+91 8904771909" data-toggle="tooltip1" title="+91 8904771909">
            <span style="font-size:20px"><i class="fa fa-phone"></i></span>
            </a></li>
          <li class="nav-item"><a class="nav-link" href="mailto:murali890477@gmail.com" data-toggle="tooltip2" title="murali890477@gmail.com">
            <span style="font-size:20px"><i class="fa fa-envelope"></i></span>
            </a></li>
          <li class="nav-item"><a class="nav-link" href="#map-container-google-12" data-toggle="tooltip3" title="5FR2+5XR, Madhure Amanikere, Karnataka 560089">
            <span style="font-size:20px"><i class="fa fa-map-marker"></i></span>
            </a></li>
          </ul>
        </ul>
      </ul>

      
     
    </div>
  </div>
</nav>

<!-- Button trigger modal -->
<!-- <a class="whats-app" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa fa-plus my-float"></i>
</a> -->

<!--INQUIRY Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="form-c container">
          <h3 class="text-center">INQUIRY</h3>
          <hr>
            <form method="POST" id="frmContactUs">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-org text-light"><i class="fa fa-users"> </i></span>
                </div>
                <input type="number" class="form-control" placeholder="No of Persons"  id="noPersons" name="noPersons" required/>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-org text-light"><i class="fa fa-calendar"> </i></span>
                </div>
                <input type="datetime-local" class="form-control" placeholder="Date for Occasion"  id="dateOccasion" name="dateOccasion" required/>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-org text-light"><i class="fa fa-male"> </i></span>
                </div>
                <input type="text" class="form-control" placeholder="Name"  id="name" name="name" required/>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-org text-light"><i class="fa fa-envelope"> </i></span>
                </div>
                <input type="email" class="form-control" placeholder="Email"  id="email" name="email" required/>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-org text-light"><i class="fa fa-phone"> </i></span>
                </div>
                <input type="text" class="form-control" placeholder="Mobile Number" id="mobile" name="mobile" required/>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-org text-light"><i class="fa fa-globe"> </i></span>
                </div>
                <textarea rows="3" class="form-control" id="message" name="message" placeholder="Message" required></textarea>
              </div>
              <br >
              <button type="submit" class="form-control btn btn-outline-org" name="submit" id="submit"  >SUBMIT QUERY</button>
              <span style="color:red;text-align:center;" id="msg"></span>
            </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!-- intro image  -->
<?php
  $query = "SELECT * FROM introimage ORDER BY id DESC LIMIT 1";
  $query_run = mysqli_query($conn, $query);

  if(mysqli_num_rows($query_run) > 0){
    while($rows = mysqli_fetch_assoc($query_run)){
      // echo $rows['name'];

      ?>
<div class="container-fluid ylw view hm-yellow-strong" style=" background-image:url('<?php echo 'admin/uploads/'.$rows['introImage']; ?>');  ">
  <div class="container ">
    <h3 class="text-light">
            make memories at the right place, make memories with us
            
        <span><i class="fa fa-quote-right"></i></span>
            </h3>
            
    <h1 class="display-1 wel">Welcome!</h1>
  </div>
</div>
<?php
        }
      }
      
    ?>





<!-- intro Video -->
<?php
  $query = "SELECT * FROM introvideo ORDER BY id DESC LIMIT 1";
  $query_run = mysqli_query($conn, $query);

  if(mysqli_num_rows($query_run) > 0){
    while($rows = mysqli_fetch_assoc($query_run)){
      // echo $rows['name'];

      ?>
<div class="container-fluid"> 
  <div class="row mb-2 p-5">
    <div class="col-lg-4  video-text">
      <h1 class="display-4 text-ylw "> WHAT ARE WE? </h1>
    </div>
    <div class="col-lg-8">
      <video  autoplay loop  muted width="100%" height="400px" controls>
              <source src="<?php echo 'admin/uploads/'.$rows['introVideo']; ?>" type="video/mp4" />
            </video>
            <?php
          }
        }
        
      ?>

    </div>
  </div>
</div>

<!-- Activites section  -->


<div class="container-fluid p-5">
  <div class="row">
    <p class="act">ACTIVITIES</p>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row" style="margin:30px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <?php
              $query = "SELECT * FROM activitesimage ORDER BY id DESC LIMIT 6";
              $query_run = mysqli_query($conn, $query);

              if(mysqli_num_rows($query_run) > 0){
                while($rows = mysqli_fetch_assoc($query_run)){
                  // echo $rows['name'];

                  ?>
          <div class="col-lg-4 p-1">
            <div class="card">
              <div class="card-body" >
                <h5 class="card-title" style="text-align: center;"><?php echo $rows['activitesimageName'] ;?></h5>
                <img src="<?php echo "admin/uploads/".$rows['activitesImage'] ;?>" class="activity-img" >
              </div>
            </div>
          </div>
          <?php
                  }
                }
                
              ?>
      </div> 
    </div>
    
  </div>
</div>

<!--galleryyy-->
<div class="container-fluid gallery">
  <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-inner text-center">

      <div class="carousel-item active">
        <div class="gal">
          <table class="g-table">
            <tr>
              <td>
                <h1 class="gal-text d-none d-md-block"><span><i class="fa fa-quote-left"> Activites</i></span> </h1><br>
              <!-- </td>            
              <td> -->
                <?php
                  $query = "SELECT * FROM activitesimage ORDER BY id DESC LIMIT 6";
                  $query_run = mysqli_query($conn, $query);
                  
                  if(mysqli_num_rows($query_run) > 0){
                    while($rows = mysqli_fetch_assoc($query_run)){
                      // echo $rows['name'];
                      
                      ?>
                      <!-- <div class="gal-card"> -->
                    <img src="<?php echo "admin/uploads/".$rows['activitesImage'] ;?>"  class="gal-img p-2">
                    <!-- </div> -->
                  <?php
                      }
                    }                  
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>

      <div class="carousel-item">
        <div class="gal">
          <table class="g-table">
            <tr>
              <td>
                <h1 class="gal-text d-none d-md-block"><span><i class="fa fa-quote-left"> Accommodation</i></span> </h1><br>
              <!-- </td>            
              <td> -->
                <?php
                  $query = "SELECT * FROM accomoimages ORDER BY id DESC LIMIT 6";
                  $query_run = mysqli_query($conn, $query);
                  
                  if(mysqli_num_rows($query_run) > 0){
                    while($rows = mysqli_fetch_assoc($query_run)){
                      // echo $rows['name'];
                      
                      ?>
                    <img src="<?php echo "admin/uploads/accommodation_images/".$rows['accomoImage'] ;?>" width="300px" height="200px" class="p-2">
                    
                  <?php
                      }
                    }                  
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>

      <div class="carousel-item ">
        <div class="gal">
          <table class="g-table">
            <tr>
              <td>
                <h1 class="gal-text d-none d-md-block"><span><i class="fa fa-quote-left "> Gallery</i></span></h1><br>
              <!-- </td>            
              <td> -->
                <?php
                  $query = "SELECT * FROM images ORDER BY id DESC LIMIT 6";
                  $query_run = mysqli_query($conn, $query);
                  
                  if(mysqli_num_rows($query_run) > 0){
                    while($rows = mysqli_fetch_assoc($query_run)){
                      // echo $rows['name'];
                      
                      ?>
                    <img src="<?php echo "admin/uploads/".$rows['imagePic'] ;?>" width="300px" height="200px" class="p-2">
                    
                  <?php
                      }
                    }                  
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>

      
    </div>
    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev " aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<!-- gallery-end-->



<!-- Cancellation Policy  -->
<div class="container-fluid text-center pro">
  <div class="row mb-3">
    <div class="col-sm-12">
      <div class="">
          <div class="">
              <!-- <span class="ii"><i class="fa fa-clock-o"></i></span> -->
              <h1 class="text-ylw"><b>Cancellation Policy</b></h1>
              <h5 class="text-ylw">Applicable in case of 100% Event Cancellation.</h5>
          </div>          
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-4">
          <div class="card card-pro">
              <div class="card-title">
                <h1 class="text-ylw ii"><b>10</b><i class="fa fa-percent"></i></h1>
                <!-- <span class="ii"></span> -->
              </div>
              <div class="card-body">
                  <h1><b>Within 8 Days</b></h1>
              </div>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="card card-pro">
              <div class="card-title">
                <h1 class="text-ylw ii"><b>20</b><i class="fa fa-percent"></i></h1>
                <!-- <span class="ii" ></span> -->
              </div>
              <div class="card-body">
                  <h1><b>Before 24 Hours</b></h1>
              </div>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="card card-pro">
              <div class="card-title">
                <h1 class="text-ylw ii"><b>30</b><i class="fa fa-percent"></i></h1>
                <!-- <span class="ii"></span> -->
              </div>
              <div class="card-body">
                  <h1><b>Within 24 Hours</b></h1>
              </div>
          </div>
      </div>
  </div>
</div>


<!--places near me-->
<div class="container-fluid mb-4 placc text-center">
  <div class="row" >
  <h2 class="">PLACES NEAR ME</h2>
  </div>
  <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
  
    <div class="col-lg-3 mt-2 ">
      <div class="card ">
      <a href="https://goo.gl/maps/L9Lv33Xg4ha4hH7b9" target="_blank"><img class="card-image " src="img/hesaraghattaNrityagram.JPG"></a>
      
      <h2 class="cap">Hesaraghatta Nrityagram</h2>
      </div>
    </div>
    <div class="col-lg-3 mt-2 ">
      <div class="card ">
      <a href="https://goo.gl/maps/uwUp3cMEbpL2iPJV6" target="_blank"><img class="card-image" src="img/hesaraghatta Shanimahatma temple.jpg"></a>
      <h2 class="cap">Hesaraghatta Shanimahatma</h2>
      </div>
    </div>
  
  
    <div class="col-lg-3 mt-2 ">
      <div class="card ">
      <a href="https://goo.gl/maps/6armqC81AX3E7jgH6" target="_blank"><img class="card-image" src="img/heserghatta grasslands.jpg" ></a>
      <h2 class="cap">Heserghatta <br> Grasslands</h2>
      </div>
    </div>
    <div class="col-lg-3 mt-2 ">
      <div class="card ">
      <a href="https://goo.gl/maps/6armqC81AX3E7jgH6" target="_blank"><img class="card-image" src="img/heserghattaLake.jpg" ></a>
      <h2 class="cap">Heserghatta <br> Lake</h2>
      </div>
    </div>
  </div>
</div>
<!--places near me end-->



<!-- Footer -->
<footer class="page-footer font-small bg-dark pt-4">

  <!-- Footer Text -->
  <div class="container-fluid text-left text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-6 mt-md-0 mb-3 p-5">

        <!-- Content -->


        <h6 class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
          repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
          harum esse fugiat. Itaque, culpa?</h6><br>
          <h5 class="text-light"><a href="https://goo.gl/maps/7JNSDwrSP7qT95y28" target="_blank">
          <span ><i class="fa fa-map-marker"></i></span>&nbsp; 5FR2+5XR, Madhure Amanikere, Karnataka 560089 </a></h5>
          <h5 class="text-light"> <a href="tel:+91 8904771909"> 
          <span style="font-size:20px"><i class="fa fa-phone"></i></span>&nbsp; +91 89047 71909</a></h5>
          <h5 class="text-light"><a href="mailto:murali890477@gmail.com"> 
          <span style="font-size:20px"><i class="fa fa-envelope-o"></i></span>&nbsp; ss_kuteera@gmail.com </a></h5>
          <br>
          

        <button type="button" class="btn btn-outline-light form-control" data-toggle="modal" data-target="#modalPoll-1">
        FEEDBACK
        </button>
        <!-- <span class="socialmedia"><a href="https://wa.me/+918904771909" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></span></h5>
        <span class="socialmedia"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></span></h5>
        <span class="socialmedia"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></span></h5> -->

      </div>

      <!-- Modal: modalPoll -->
      <div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
          <div class="modal-content bg-light">
            <!--Header-->
            <div class="modal-header">
              <p class="heading lead">Feedback request
              </p>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
              </button>
            </div>
            <form action="mailajax.php" method="POST">
              <!--Body-->
              <div class="modal-body">
                <!-- Radio -->          
                <div class="md-form">
                  <label for="form79textarea">Your Email id</label>
                  <input type="email" class="form-control" name="email" placeholder="Your mail"  >
                </div>
                <p class="text-center">
                  <strong>Your rating</strong>
                </p>
                <div class="form-check mb-4">
                  <input class="form-check-input" name="group1" type="radio" id="radio-179" value="verygood" checked>
                  <label class="form-check-label" for="radio-179">Very good</label>
                </div>
                <div class="form-check mb-4">
                  <input class="form-check-input" name="group1" type="radio" id="radio-279" value="good">
                  <label class="form-check-label" for="radio-279">Good</label>
                </div>
                <div class="form-check mb-4">
                  <input class="form-check-input" name="group1" type="radio" id="radio-379" value="mediocre">
                  <label class="form-check-label" for="radio-379">Mediocre</label>
                </div>
                <div class="form-check mb-4">
                  <input class="form-check-input" name="group1" type="radio" id="radio-479" value="bad">
                  <label class="form-check-label" for="radio-479">Bad</label>
                </div>
                <div class="form-check mb-4">
                  <input class="form-check-input" name="group1" type="radio" id="radio-579" value="verybad">
                  <label class="form-check-label" for="radio-579">Very bad</label>
                </div>
                <!-- Radio -->
                <p class="text-center">
                  <strong>What could we improve?</strong>
                </p>
                <!--Basic textarea-->
                <div class="md-form">
                  <label for="form79textarea">Your message</label>
                  <textarea type="text" id="form79textarea" name="comments" class="md-textarea form-control" rows="3" required=""></textarea>
                </div>
              </div>
              
              <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-primary waves-effect waves-light" name="feedback" value="Send">
                  <!-- <i class="fa fa-paper-plane ml-1"></i> -->
                </a>
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
              </div>
            </form>

          </div>
        </div>
      </div>
      <!-- Modal: modalPoll -->
      <!-- Grid column -->
      <hr class="clearfix w-100 d-md-none pb-3">
      <!-- Grid column -->
      <div class="col-lg-6 mb-md-0 mb-3">
        <!-- Content -->
        <section class="section">
          <div class="card" style=" background: none; ">
              <div class="card-body" style="padding:0;">
                <!--Google map-->
                <div id="map-container-google-12" class="z-depth-1-half map-container-7" style="height: 200px">
                  <!-- <iframe src="https://maps.google.com/maps?q=sskuteerabengaluru&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                    style="border:0" allowfullscreen></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4965.433015454438!2d77.45099231993358!3d13.189859477759677!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae27a0485dd25f%3A0x22347f68f016c48b!2sSS%20Kuteera!5e0!3m2!1sen!2sin!4v1635969542912!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                  <!--Google Maps-->
              </div>
          </div>
        </section>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-light">&copy; 2020 Copyright:
    <a href="#" class="text-light"> ss_kutera.com</a>
  </div>
  <!-- Copyright -->

</footer>

<!-- Footer -->

<div id="whatswidget-pre-wrapper" class="">
<div id="whatswidget-widget-wrapper" class="whatswidget-widget-wrapper" style="all:revert;color:black">
<div id="whatswidget-conversation" class="whatswidget-conversation" style="color: revert; font: revert; font-feature-settings: revert; font-kerning: revert; font-optical-sizing: revert; font-variation-settings: revert; text-orientation: revert; text-rendering: revert; -webkit-font-smoothing: revert; -webkit-locale: revert; -webkit-text-orientation: revert; -webkit-writing-mode: revert; writing-mode: revert; zoom: revert; place-content: revert; place-items: revert; place-self: revert; alignment-baseline: revert; animation: revert; appearance: revert; backdrop-filter: revert; backface-visibility: revert; background: revert; background-blend-mode: revert; baseline-shift: revert; block-size: revert; border-block: revert; border: revert; border-radius: revert; border-collapse: revert; border-inline: revert; inset: revert; box-shadow: revert; box-sizing: revert; break-after: revert; break-before: revert; break-inside: revert; buffered-rendering: revert; caption-side: revert; caret-color: revert; clear: revert; clip: revert; clip-path: revert; clip-rule: revert; color-interpolation: revert; color-interpolation-filters: revert; color-rendering: revert; color-scheme: revert; columns: revert; column-fill: revert; gap: revert; column-rule: revert; column-span: revert; contain: revert; contain-intrinsic-size: revert; content: revert; content-visibility: revert; counter-increment: revert; counter-reset: revert; counter-set: revert; cursor: revert; cx: revert; cy: revert; d: revert; display: none; dominant-baseline: revert; empty-cells: revert; fill: revert; fill-opacity: revert; fill-rule: revert; filter: revert; flex: revert; flex-flow: revert; float: revert; flood-color: revert; flood-opacity: revert; grid: revert; grid-area: revert; height: revert; hyphens: revert; image-orientation: revert; image-rendering: revert; inline-size: revert; inset-block: revert; inset-inline: revert; isolation: revert; letter-spacing: revert; lighting-color: revert; line-break: revert; list-style: revert; margin-block: revert; margin: revert; margin-inline: revert; marker: revert; mask: revert; mask-type: revert; max-block-size: revert; max-height: revert; max-inline-size: revert; max-width: revert; min-block-size: revert; min-height: revert; min-inline-size: revert; min-width: revert; mix-blend-mode: revert; object-fit: revert; object-position: revert; offset: revert; opacity: 0; order: revert; origin-trial-test-property: revert; orphans: revert; outline: revert; outline-offset: revert; overflow-anchor: revert; overflow-wrap: revert; overflow: revert; overscroll-behavior-block: revert; overscroll-behavior-inline: revert; overscroll-behavior: revert; padding-block: revert; padding: revert; padding-inline: revert; page: revert; page-orientation: revert; paint-order: revert; perspective: revert; perspective-origin: revert; pointer-events: revert; position: revert; quotes: revert; r: revert; resize: revert; ruby-position: revert; rx: revert; ry: revert; scroll-behavior: revert; scroll-margin-block: revert; scroll-margin: revert; scroll-margin-inline: revert; scroll-padding-block: revert; scroll-padding: revert; scroll-padding-inline: revert; scroll-snap-align: revert; scroll-snap-stop: revert; scroll-snap-type: revert; shape-image-threshold: revert; shape-margin: revert; shape-outside: revert; shape-rendering: revert; size: revert; speak: revert; stop-color: revert; stop-opacity: revert; stroke: revert; stroke-dasharray: revert; stroke-dashoffset: revert; stroke-linecap: revert; stroke-linejoin: revert; stroke-miterlimit: revert; stroke-opacity: revert; stroke-width: revert; tab-size: revert; table-layout: revert; text-align: revert; text-align-last: revert; text-anchor: revert; text-combine-upright: revert; text-decoration: revert; text-decoration-skip-ink: revert; text-indent: revert; text-overflow: revert; text-shadow: revert; text-size-adjust: revert; text-transform: revert; text-underline-offset: revert; text-underline-position: revert; touch-action: revert; transform: revert; transform-box: revert; transform-origin: revert; transform-style: revert; transition: revert; user-select: revert; vector-effect: revert; vertical-align: revert; visibility: revert; -webkit-app-region: revert; border-spacing: revert; -webkit-border-image: revert; -webkit-box-align: revert; -webkit-box-decoration-break: revert; -webkit-box-direction: revert; -webkit-box-flex: revert; -webkit-box-ordinal-group: revert; -webkit-box-orient: revert; -webkit-box-pack: revert; -webkit-box-reflect: revert; -webkit-highlight: revert; -webkit-hyphenate-character: revert; -webkit-line-break: revert; -webkit-line-clamp: revert; -webkit-mask-box-image: revert; -webkit-mask: revert; -webkit-mask-composite: revert; -webkit-perspective-origin-x: revert; -webkit-perspective-origin-y: revert; -webkit-print-color-adjust: revert; -webkit-rtl-ordering: revert; -webkit-ruby-position: revert; -webkit-tap-highlight-color: revert; -webkit-text-combine: revert; -webkit-text-decorations-in-effect: revert; -webkit-text-emphasis: revert; -webkit-text-emphasis-position: revert; -webkit-text-fill-color: revert; -webkit-text-security: revert; -webkit-text-stroke: revert; -webkit-transform-origin-x: revert; -webkit-transform-origin-y: revert; -webkit-transform-origin-z: revert; -webkit-user-drag: revert; -webkit-user-modify: revert; white-space: revert; widows: revert; width: revert; will-change: revert; word-break: revert; word-spacing: revert; x: revert; y: revert; z-index: revert;"><div class="whatswidget-conversation-header" style="all:revert;">
<div id="whatswidget-conversation-title" class="whatswidget-conversation-title" style="all:revert;">S S KUTEERA</div></div><div id="whatswidget-conversation-message" class="whatswidget-conversation-message " style="all:revert;">hello, how can we help you?</div><div class="whatswidget-conversation-cta" style="all:revert;"> <a style="all:revert;" id="whatswidget-phone-desktop" target="_blank" href="https://web.whatsapp.com/send?phone=@+919978070265 " class="whatswidget-cta whatswidget-cta-desktop">Send message</a> <a id="whatswidget-phone-mobile" target="_blank" href="https://wa.me/" class="whatswidget-cta whatswidget-cta-mobile" style="all:revert;">Send message</a>
</div><a target="_blank" class="whatswidget-link" href="https://www.oflox.com" title="Feito no WhatsWidget" style="all:revert;"><img src="" width="16px" style="all:revert;"></a></div>
<div id="whatswidget-conversation-message-outer" class="whatswidget-conversation-message-outer" style="all:revert;"> <span id="whatswidget-text-header-outer" class="whatswidget-text-header-outer" style="all:revert;">S S KUTEERA</span><br> <div id="whatswidget-text-message-outer" class="whatswidget-text-message-outer" style="all:revert;">hello, how can we help you?</div></div><div class="whatswidget-button-wrapper" style="all:revert;"><div class="whatswidget-button" id="whatswidget-button" style="all:revert;"><div style="margin:0 auto;width:38.5px;all:revert;"> <img class="whatswidget-icon" style="all:revert;" src=" https://www.oflox.com/blog/wp-content/uploads/2021/01/wpwhite.png"></div></div></div>
<script id="whatswidget-script" type="text/javascript">document.getElementById("whatswidget-conversation").style.display="none";document.getElementById("whatswidget-conversation").style.opacity="0"; var button=document.getElementById("whatswidget-button");button.addEventListener("click",openChat);var conversationMessageOuter=document.getElementById("whatswidget-conversation-message-outer");conversationMessageOuter.addEventListener("click",openChat);var chatOpen=!1;function openChat(){0==chatOpen?(document.getElementById("whatswidget-conversation").style.display="block",document.getElementById("whatswidget-conversation").style.opacity=100,chatOpen=!0,document.getElementById("whatswidget-conversation-message-outer").style.display="none"):(document.getElementById("whatswidget-conversation").style.opacity=0,document.getElementById("whatswidget-conversation").style.display="none",chatOpen=!1)}</script></div>
<style id="whatswidget-style">.whatswidget-widget-wrapper{font-family:"Helvetica Neue","Apple Color Emoji",Helvetica,Arial,sans-serif !important;font-size:16px !important;position:fixed !important;bottom:100px !important;right:30px !important;z-index:1001 !important}.whatswidget-conversation{background-color:#e4dcd4 !important;background-image:url('https://www.oflox.com/blog/wp-content/uploads/2021/01/wpbg.png') !important;background-repeat:repeat !important;box-shadow:rgba(0, 0, 0, 0.16) 0px 5px 40px !important;width:250px !important;height:300px !important;border-radius:10px !important;transition-duration:0.5s !important;margin-bottom:80px !important}.whatswidget-conversation-header{background-color:white !important;padding:10px !important;padding-left:25px !important;box-shadow:0px 1px #00000029 !important;font-weight:600 !important;border-top-left-radius:10px !important;border-top-right-radius:10px !important}.whatswidget-conversation-message{line-height: 1.2em !important;background-color:white !important;padding:10px !important;margin:10px !important;margin-left:15px !important;border-radius:5px !important}.whatswidget-conversation-message-outer{background-color:#FFF !important;padding:10px !important;margin:10px !important;margin-left:0px !important;border-radius:5px !important;box-shadow:rgba(0, 0, 0, 0.342) 0px 2.5px 10px !important;cursor:pointer !important;animation:nudge 2s linear infinite !important;margin-bottom:70px !important}.whatswidget-text-header-outer{font-weight:bold !important;font-size:90% !important}.whatswidget-text-message-outer{font-size:90% !important}.whatswidget-conversation-cta{border-radius:25px !important;width:175px !important;font-size:110% !important;padding:10px !important;margin:0 auto !important;text-align:center !important;background-color:#23b123 !important;color:white !important;font-weight:bold !important;box-shadow:rgba(0, 0, 0, 0.16) 0px 2.5px 10px !important;transition:1s !important;position:absolute !important;top:62% !important;left:10% !important}.whatswidget-conversation-cta:hover{transform:scale(1.1) !important;filter:brightness(1.3) !important}.whatswidget-cta{text-decoration:none !important;color:white !important}.whatswidget-cta-desktop{display:none !important}.whatswidget-cta-mobile{display:inherit !important}@media (min-width: 48em){.whatswidget-cta-desktop{display:inherit !important}
.whatswidget-cta-mobile{display:none !important}}.whatswidget-button-wrapper{position:fixed !important;bottom:100px !important;right:15px !important}.whatswidget-button{position:relative !important;right:0px !important;background-color:#31d831 !important;border-radius:100% !important;width:60px !important;height:60px !important;box-shadow:2px 1px #0d630d63 !important;transition:1s !important}.whatswidget-icon{width:42px !important;height:42px !important;position:absolute !important; bottom:10px !important; left:10px !important;}.whatswidget-button:hover{filter:brightness(115%) !important;transform:rotate(15deg) scale(1.15) !important;cursor:pointer !important}@keyframes nudge{20%,100%{transform:translate(0,0)}0%{transform:translate(0,5px);transform:rotate(2deg)}10%{transform:translate(0,-5px);transform:rotate(-2deg)}}.whatswidget-link{position:absolute !important;bottom:90px !important;right:5px !important;opacity:0.5 !important}</style>
</div>

</body>
<!-- flatpicker  -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip1"]').tooltip1();   
});
$(document).ready(function(){
  $('[data-toggle="tooltip2"]').tooltip2();   
});
$(document).ready(function(){
  $('[data-toggle="tooltip3"]').tooltip3();   
});
</script>
<script>
  jQuery('#frmContactUs').on('submit',function(e){
    jQuery('#msg').html();
    jQuery('#submit').html('Please wait...');
    jQuery('#submit').attr('disabled',true);
    jQuery.ajax({
      url:'mailajax.php',
      type:'post',
      data:jQuery('#frmContactUs').serialize(),
      success:function(result){
        jQuery('#msg').html(result);
        jQuery('#submit').html('Submit');
        jQuery('#submit').attr('disabled',false);
        jQuery('#frmContactUs')[0].reset();
      }
    });
    e.preventDefault();
  });

</script>

<script>
  config={
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    // altInput=true,
    // altFormat:"F j, Y (h:i K)",
    // content="Date of Occassion",
  }
  flatpickr("input[type=datetime-local]", config);



  
</script>


</html>