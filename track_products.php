<?php
include 'connect_database.php';
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
    Users Dashboard || Track orders Page
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
          <li>
            <a href="./user_wish_list.php">
              <i class="fa fa-star" style="font-size:2.5em"></i>
              <p style="font-size:1.2em">wish list</p>
            </a>
          </li>

          <li class="active">
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
                  <a class="navbar-brand" href="javascript:;">Track Placed Orders</a>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                </div>
              </div>
            </nav>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <div class="content" style="margin-left:300px;max-width:1000px">
            <div class="row">
              <div class="col-lg-12" >
                <div class="card ">

            <table class="table table-hover" id="track_products">
      <thead style="background-color:#111344;color:#fff">
        <tr>

          <th scope="col">Order ID</th>
          <th scope="col">Order Date</th>

          <th scope="col">Shipment Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $Track_orders = "select OrderId,Orderdate,case when Shipdate is null then 'shipment not started yet' else concat('shippment started on ',Shipdate) end as Shipdate from Orders where CustomerID=".$customerID." order by Shipdate desc";
        $result = mysqli_query($conn,$Track_orders);
        if($result)
        {
        while($query_executed=mysqli_fetch_assoc($result))
        {
        ECHO "<tr>
        <td>".$query_executed['OrderId']."</td>
        <td>".$query_executed['Orderdate']."</td>";
          if ($query_executed['Shipdate'] == "shipment not started yet")
        {
          echo "<td style='color:red'>".ucwords($query_executed['Shipdate'])."</td>";
        }
      else
      {
          echo "<td>".ucwords($query_executed['Shipdate'])."</td>";
      }
          echo"</tr>";
              }
            }
            else {
          echo "not able to fetch the data";
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
$('#track_products').DataTable();
});

</script>
    </html>
