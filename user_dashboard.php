<?php
include 'Current_customer.php';

//connecting to data base
include 'Connect_database.php';

$conn = OpenCon();
if(!$conn)
echo "connection not established";

$user_fname = "select CONCAT(fname,'_',lname) as name from customer where customerid=".$customerID;
$result_fname = mysqli_query($conn,$user_fname);
while($re=mysqli_fetch_assoc($result_fname))
  $name=$re['name'];

?>
<!doctype>
<html>
  <head>
      <meta charset="utf-8" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <title>
        Users Dashboard || Home Page
      </title>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="./css/bootstrap.min.css" rel="stylesheet" />
      <link href="./css/dashboard.css?v=2.0.1" rel="stylesheet" />
      <link href="./css/main.css" rel="stylesheet" />
      <!--   Core JS Files   -->
      <script src="./js/jquery.min.js"></script>
      <script src="./js/popper.min.js"></script>
      <script src="./js/bootstrap.min.js"></script>
      <script src="./js/perfect-scrollbar.jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


      <!--  Notifications Plugin    -->
      <script src="./js/bootstrap-notify.js"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="./js/dashboard.min.js?v=2.0.1" type="text/javascript"></script>
      <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style>
    /* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  max-height: 1000px;
  position: relative;
  margin: auto;

}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}


/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}


/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
    </style>

  </head>
  <body>
    <div class="wrapper ">

      <div class="sidebar" data-color="white" data-active-color="success">

        <!---
        Placing logo in the sidebar menu
        -->
        <div class="logo">
            <div class="logo-image-small">
              <h4>G-store online shopping </h4>
            </div>
        </div>

        <!--- Placing nav menu --->
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                  <a href="./user_dashboard.php">
                  <i class="fa fa-home" style="font-size:2.5em"></i>
                  <p style="font-size:1.2em">Home</p>
                </a>
                </li>

            <li>
              <a href="./Products.php">
                <i class="nc-icon nc-app"></i>
                <p style="font-size:1.2em">Product</p>
              </a>
            </li>
            <li>
              <a href="./user_wish_list.php">
                <i class="fa fa-star" style="font-size:2.5em"></i>
                <p style="font-size:1.2em">wish list</p>
              </a>
            </li>

            <li>
              <a href="./track_products.php">
                <i class="fa fa-solid fa-truck" style="font-size:2.5em"></i>
                <p style="font-size:1.2em">Track Orders</p>
              </a>
            </li>

            <li >
              <a href="./cart.php">
                <i class="fa fa-shopping-cart" style="font-size:2.5em"></i>
                <p style="font-size:1.2em">Cart</p>
              </a>
            </li>


          </ul>
        </div>
        </div>



    <div class="main-panel" style="background-color:#fff">
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Welcome to G-Store Online shopping </a>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div>
              <i class="fa fa-user" style="font-size:2em"></i> <?php echo $name;?>

            </div>
          </div>
        </div>
      </nav>
    </div>
<br></br>
    <div class="content" style="margin-top:90px;margin-left:150px">
      <div class="slideshow-container">

<div class="mySlides fade">
  <img src="./img/main.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="./img/second.png" style="width:100%;height:550px">

</div>

<div class="mySlides fade">
  <img src="./img/thrid.png" style="width:100%;height:550px">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>
    </div>


  </div>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>
