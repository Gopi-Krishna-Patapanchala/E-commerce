<?php
include 'Connect_database.php';
include 'Current_customer.php';


$conn = OpenCon();
if(!$conn)
echo "connection not established";
?>
<!doctype html>
<head>

    <meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>
      Users Dashboard || Wishlist Page
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

#quantity input {
  -webkit-appearance: none;
  border: none;
  text-align: center;
  width: 32px;
  font-size: 16px;
  color: #43484D;
  font-weight: 300;
}

.plus-btn,.minus-btn {
  width: 30px;
  height: 30px;
  background-color: #E1E8EE;
  border-radius: 6px;
  border: none;
  cursor: pointer;
}
.minus-btn img {
  margin-bottom: 3px;
}
.plus-btn img {
  margin-top: 2px;
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
              <li>
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
          <li class="active">
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
                  <a class="navbar-brand" href="javascript:;">Wishlist</a>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                </div>
              </div>
            </nav>
          </div>


<br><br><br><br><br>

          <div class="content" style="margin-left:300px;max-width:1000px">
            <div class="row">
              <div class="col-lg-12" style="width:1100px">
                <div class="card ">

            <table class="table table-hover" id="wish_list">
      <thead style="background-color:#111344;color:#fff">
        <tr>

          <th scope="col">Product ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Price</th>

          <th scope="col">Delete Request</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $wishe_list = "select upc,pname,price from Wishes join Products using(upc) where CustomerID=".$customerID;
        $result = mysqli_query($conn,$wishe_list);
        if($result)
        {
              while($query_executed=mysqli_fetch_assoc($result))
              {
                ECHO "<tr>

                        <td>".$query_executed['upc']."</td>
                        <td>".$query_executed['pname']."</td>
                        <td>".$query_executed['price']."</td>



                        <td>
                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal".$query_executed['upc']."'> delete product details</button>


              <!-- Modal -->
              <div class='modal fade' id='myModal".$query_executed['upc']."' role='dialog'>
                <div class='modal-dialog'>

                  <!-- Modal content-->
                  <div class='modal-content'>
                    <div class='modal-header'>

                      <h4 class='modal-title'>Deleting the Product Information from wish list</h4>
                    </div>
                    <div class='modal-body'>
                      <p>Please conform! your deleting the Product information permanently wish list</p>
                    </div>
                    <div class='modal-footer'>
                      <a href='customer_wish_list_delete.php?UPC=".$query_executed['upc']."'><button type='button' class='btn btn-primary'>Yes</button></a>
                      <div>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                    </div>
                  </div>

                </div>
              </div>
              </div>
                        </td></tr>";
              }

        }

         ?>
      </tbody>
    </table>

  </div>

</div>
</div>
</div>

<?php

if(isset($_POST['place_order']))
{
  echo $result;
  die();
}


 ?>

</div>
</body>
<!--   Core JS Files   -->
<script src="./js/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/perfect-scrollbar.jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
<!-- Chart JS -->
<script src="./js/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./js/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./js/dashboard.min.js?v=2.0.1" type="text/javascript"></script>

<script>

$(document).ready(function(){
$('#wish_list').DataTable();
});


</script>
</html>
