<?php


    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
    echo "connection not established";
    ?>
<!doctype>
<html>
  <head>
      <meta charset="utf-8" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <title>
        Admin Panel Dashboard || Order basis Analysis
      </title>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href="./css/bootstrap.min.css" rel="stylesheet" />
      <link href="./css/dashboard.css?v=2.0.1" rel="stylesheet" />
      <link href="./css/main.css" rel="stylesheet" />
      <!--   Core JS Files   -->
      <script src="./js/jquery.min.js"></script>
      <script src="./js/popper.min.js"></script>
      <script src="./js/bootstrap.min.js"></script>
      <script src="./js/perfect-scrollbar.jquery.min.js"></script>

      <!-- Chart JS -->
      <script src="./js/chartjs.min.js"></script>
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
body
{
  background-color: #fff;
}
</style>
  </head>
  <body>
    <div class="wrapper ">
      <div class="sidebar" data-color="white" data-active-color="danger">

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
                  <a href="./Admin_panel.php">
                  <i class="nc-icon nc-bank"></i>
                  <p>Dashboard</p>
                </a>
                </li>

            <li>
              <a href="./Inventory_view.php">
                <i class="nc-icon nc-app"></i>
                <p>View Inventory</p>
              </a>
            </li>
            <li class="active">
              <a href="./order_analysis.php">
                <i class="nc-icon nc-bag-16"></i>
                <p>Orders basis Analysis</p>
              </a>
            </li>
            <li >
              <a href="./supplier_details.php">
                <i class="nc-icon nc-single-02"></i>
                <p>Supplier Details</p>
              </a>
            </li>

            <li >
              <a href="./customer_details.php">
                <i class="fa fa-users"></i>
                <p>Customer Details</p>
              </a>
            </li>

            <li>
              <a href="./confidence_analysis.php">
                <i class="fa fa-calculator"></i>
                <p>Product confidence analysis</p>
              </a>
            </li>

          </ul>
        </div>
        </div>


    <div class="main-panel" style="background-color:#fff">
      <!-- top navigation bar-->

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
            <a class="navbar-brand" href="javascript:;">Orders basis Analysis</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="content">


        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">List of Orders not been shipped yet</h5>
                      <div class="content" >
                        <div class="row">
                          <div class="col-lg-12">

                        <table class="table table-hover" id="order_not_shipped_yet" >
                  <thead class="table-primary" style="background-color:#111344;color:#fff">
                    <tr>

                      <th scope="col">Customer ID</th>
                      <th scope="col">Order ID</th>
                      <th scope="col">Order Placed Date</th>
                      <th scope="col">Update Action</th>
                                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  // not started shipping details product information

                  $shipping_not_started_query = "select CustomerID, OrderID, Orderdate from Orders where shipdate is null order by Orderdate";
                  $shipping_not_started_query_result = mysqli_query($conn,$shipping_not_started_query);
                  if (mysqli_num_rows($shipping_not_started_query_result)>1)
                  {
                    $count=1;
                    while($query_executed = mysqli_fetch_array($shipping_not_started_query_result))
                    {
                      ECHO "<tr>

                              <td>".$query_executed['CustomerID']."</td>
                              <td>".$query_executed['OrderID']."</td>
                              <td>".$query_executed['Orderdate']."</td>
                              <td>
                              <button type='submit' class='btn btn-success' data-toggle='modal' data-target='#start_shippment".$query_executed['OrderID']."'>Shippment Started</button>

                              <!-- Modal -->
                              <div class='modal fade' id='start_shippment".$query_executed['OrderID']."' role='dialog'>
                                <div class='modal-dialog'>

                                  <!-- Modal content-->
                                  <div class='modal-content'>
                                    <div class='modal-header'>

                                      <h4 class='modal-title'>Order shippment update</h4>
                                    </div>
                                    <div class='modal-body'>
                                      <p>Please conform! your updating the shippment date information of the order ID ".$query_executed['OrderID']."</p>
                                    </div>
                                    <div class='modal-footer'>
                                      <a href='order_update.php?OrderID=".$query_executed['OrderID']."'><button type='button' class='btn btn-primary'>Yes</button></a>
                                      <div>
                                      <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
</td>
                              </tr>";

                            }
                          }


                  ?>
                </tbody>
              </table>

                      </div>
                    </div>
                  </div>


              <div class="card-footer ">

              </div>
            </div>
          </div>
        </div>
      </div>





                  <div class="row">
                    <div class="col-md-12">
                      <div class="card ">
                        <div class="card-header ">
                          <h5 class="card-title">List of orders that were shipped fast</h5>
                          <form action='order_analysis.php' method='post'>
                            <div class='form-group'>
                              <label for='usr'>Enter the Days threshold</label>
                                <input type='number' class='form-control' name='order_fast_shipped_threshold'>
                                <button type='submit' class='btn btn-primary' name='fast_shipped_products'>Fetch result</button>
                              </div>
                            </form>
                          <div class="content" >
                            <div class="row">
                              <div class="col-lg-12">

                            <table class="table table-hover" id="fast_shipped" style="width:100%">
                      <thead class="table-primary" style="background-color:#111344;color:#fff">
                        <tr>

                          <th scope="col">Order ID</th>
                          <th scope="col">Order Placed Date</th>
                            <th scope="col">Shipped Date</th>
                          <th scope="col">Count of days taken for shippment</th>
                                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(isset($_POST['fast_shipped_products']))
                        {
                          $Order_fast_shipped_threshold_value = $_POST['order_fast_shipped_threshold'];
                          echo "<h6 style='font-size:15px;font-weight: normal;text-align:center'>Fetching the Fatest Shipped products who's shippment started within in  ".$Order_fast_shipped_threshold_value." days</h6>";

                          $order_fast_shipped_query = "select OrderId,orderdate,Shipdate,datediff(Shipdate,Orderdate) as shipped_in from Orders
                                                      where Shipdate is not null and datediff(Shipdate,Orderdate) <'".$Order_fast_shipped_threshold_value."'";
                          $order_fast_shipped_query_result = mysqli_query($conn,$order_fast_shipped_query);
                          if (mysqli_num_rows($order_fast_shipped_query_result)>1)
                          {
                            while($query_executed = mysqli_fetch_array($order_fast_shipped_query_result))
                            {
                              Echo "<tr>


                                                            <td>".$query_executed['OrderId']."</td>
                                                            <td>".$query_executed['orderdate']."</td>
                                                            <td>".$query_executed['Shipdate']."</td>
                                                              <td>".$query_executed['shipped_in']."</td>



                                    </tr>";

                            }
                          }
}

                         ?>

                      </tbody>
                    </table>

                            </div>
                          </div>
                        </div>
                        </div>
                        </div>
                      </div>
                    </div>




                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="card ">
                                            <div class="card-header ">
                                              <h5 class="card-title">List of worst selling Products</h5>
                                              <form action='order_analysis.php' method='post'>
                                                <div class='form-group'>
                                                  <label for='usr'>Enter the number of order placed</label>
                                                    <input type='number' class='form-control' name='threshold'>
                                                  </div>

                                                  <div class='form-group'>
                                                    <label for='usr'>Specify the Period Start Date</label>
                                                      <input type='date' class='form-control' name='start_date'>
                                                    </div>

                                                    <div class='form-group'>
                                                      <label for='usr'>Specify the Period End Date</label>
                                                        <input type='date' class='form-control' name='end_date'>
                                                      </div>

                                                  <button type='submit' class='btn btn-primary' name='worst_Selling_product'>Fetch result</button>
                                                </form>
                                              <div class="content" >
                                                <div class="row">
                                                  <div class="col-lg-12">

                                                <table class="table table-hover" id="worst_Selling_product" style="width:100%">
                                          <thead class="table-primary" style="background-color:#111344;color:#fff">
                                            <tr>

                                              <th scope="col">Product ID</th>
                                              <th scope="col">Product Name</th>
                                                <th scope="col">Order placed count</th>

                                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            if(isset($_POST['worst_Selling_product']))
                                            {
                                              $order_count = $_POST['threshold'];
                                              $start_date = $_POST['start_date'];
                                              $end_date = $_POST['end_date'];

                                              $worst_Selling_product_query = "select upc,Pname,Order_placed from Products join (select upc,COUNT(DISTINCT CustomerID) as Order_placed from Orders join contains using(OrderID)
                                                                            where Orderdate BETWEEN '".$start_date."' And '".$end_date."' GROUP by upc having COUNT(DISTINCT CustomerID) <=".$order_count.") as R using(upc);";
                                              $worst_Selling_product_query_result = mysqli_query($conn,$worst_Selling_product_query);
                                              if (mysqli_num_rows($worst_Selling_product_query_result)>1)
                                              {
                                                while($query_executed = mysqli_fetch_array($worst_Selling_product_query_result))
                                                {
                                                  Echo "<tr>


                                                                                <td>".$query_executed['upc']."</td>
                                                                                <td>".$query_executed['Pname']."</td>
                                                                                <td>".$query_executed['Order_placed']."</td>



                                                        </tr>";

                                                }
                                              }
                    }

                                             ?>

                                          </tbody>
                                        </table>

                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                            </div>
                                          </div>
                                        </div>




                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="card ">
                                              <div class="card-header ">
                                                <h5 class="card-title">List of orders that could be shipped in the order in which they have been placed</h5>

                                                <div class="content" >
                                                  <div class="row">
                                                    <div class="col-lg-12">

                                                  <table class="table table-hover" id="order_shipped_product" style="width:100%">
                                            <thead class="table-primary" style="background-color:#111344;color:#fff">
                                              <tr>

                                                <th scope="col">Product ID</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Order date</th>
                                                <th scope="col">shipped date</th>

                                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php



                                                $worst_Selling_product_query = "select upc,pname,Orderdate,shipdate,customerID From Products join (Orders join Contains using(OrderID)) using(UPC) where amount > Quantity and shipdate is not null;";
                                                $worst_Selling_product_query_result = mysqli_query($conn,$worst_Selling_product_query);
                                                if (mysqli_num_rows($worst_Selling_product_query_result)>1)
                                                {
                                                  while($query_executed = mysqli_fetch_array($worst_Selling_product_query_result))
                                                  {
                                                    Echo "<tr>


                                                                                  <td>".$query_executed['upc']."</td>
                                                                                  <td>".$query_executed['pname']."</td>
                                                                                  <td>".$query_executed['customerID']."</td>
                                                                                  <td>".$query_executed['Orderdate']."</td>
                                                                                  <td>".$query_executed['shipdate']."</td>
                                                          </tr>";

                                                  }
                                                }


                                               ?>

                                            </tbody>
                                          </table>

                                                  </div>
                                                </div>
                                              </div>
                                              </div>
                                              </div>
                                            </div>
                                          </div>




                                          <div class="container" style="margin-right:-1px;">
                                            <div class="content" >
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <div class="card ">
                                                  <div class="card-header ">
                                                    <h5 class="card-title">List of items that have been rated by at least one buyer before they bought them</h5>
                                                    <div class="content" >
                                                      <div class="row">
                                                        <div class="col-lg-12">

                                                      <table class="table table-hover" id="rated_before_order" style="width:100%">
                                                <thead class="table-primary" style="background-color:#111344;color:#fff">
                                                  <tr>

                                                    <th scope="col">Customer ID</th>
                                                    <th scope="col">Product ID</th>
                                                    <th scope="col">Rated date</th>
                                                    <th scope="col">Order Placed date</th>

                                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php

                                                    $Product_rated_before_query = "select  CustomerID,UPC,RatingDate,Orderdate from Orders join Rated using(CustomerID) where RatingDate < Orderdate;";
                                                    $Product_rated_before_query_result = mysqli_query($conn,$Product_rated_before_query);
                                                    if (mysqli_num_rows($Product_rated_before_query_result)>1)
                                                    {
                                                      while($query_executed = mysqli_fetch_array($Product_rated_before_query_result))
                                                      {
                                                        Echo "<tr>


                                                                                      <td>".$query_executed['CustomerID']."</td>
                                                                                      <td>".$query_executed['UPC']."</td>
                                                                                      <td>".$query_executed['RatingDate']."</td>
                                                                                        <td>".$query_executed['Orderdate']."</td>




                                                              </tr>";

                                                      }
                                                    }


                                                   ?>

                                                </tbody>
                                              </table>

                                                      </div>
                                                    </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                </div>
                                              </div>
                                          </div>
                                          </div>



        </div>
      </div>
    </div>
  </div>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
<script>



$(document).ready(function(){
$('#order_not_shipped_yet').DataTable();
});



$(document).ready(function(){
$('#fast_shipped').DataTable();
});



$(document).ready(function(){
$('#worst_Selling_product').DataTable();
});

$(document).ready(function(){
$('#rated_before_order').DataTable();
});

$(document).ready(function(){
$('#order_shipped_product').DataTable();
});
  </script>
  </body>
</html>
