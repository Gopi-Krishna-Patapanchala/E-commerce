<!doctype>
<html>
  <head>
      <meta charset="utf-8" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <title>
        Admin Panel Dashboard || update Inventory View
      </title>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href="./css/bootstrap.min.css" rel="stylesheet" />
      <link href="./css/dashboard.css?v=2.0.1" rel="stylesheet" />
      <link href="./css/main.css" rel="stylesheet" />
      <style>
      .main-panel{
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
                <img src="./img/logo.png">
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
                <a href="./update_inventory.php">
                  <i class="nc-icon nc-bag-16"></i>
                  <p>update Inventory</p>
                </a>
              </li>
              <li >
                <a href="./supplier_details.php">
                  <i class="nc-icon nc-single-02"></i>
                  <p>Supplier Details</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="nc-icon nc-tile-56"></i>
                  <p>Product updates</p>
                </a>
              </li>
              <li>
                <a href="./customer_details.php">
                  <i class="nc-icon nc-caps-small"></i>
                  <p>update Customer info</p>
                </a>
              </li>
            </ul>
          </div>
          </div>



    <div class="main-panel">
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
            <a class="navbar-brand" href="javascript:;">Update Product Inventory Information</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

          </div>

      </nav>

      <!-- End Navbar -->

      <div class="content" >
        <div class="row">
          <div class="col-lg-12" style="width:1100px">
            <div class="card ">
        <table class="table table-hover">
  <thead class="table-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Available Quantity</th>
      <th scope="col">Action required</th>
    </tr>
  </thead>
  <tbody>
    <?php

    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
    echo "connection not established";




    $query = "select UPC,Pname,Quantity from Contains join Product using(UPC)";
    $Supplier_details = mysqli_query($conn,$query);

    if (mysqli_num_rows($Supplier_details)>1)
    {
      $count=1;
      while($query_executed = mysqli_fetch_array($Supplier_details))
      {
    ECHO "<tr>
            <th scope='row'>".$count."</th>
            <td>".$query_executed['UPC']."</td>
            <td>".$query_executed['Pname']."</td>
            <td>".$query_executed['Quantity']."</td>
            <td>
            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal".$count."'> delete Supplier details</button>

  <!-- Modal -->
  <div class='modal fade' id='myModal".$count."' role='dialog'>
    <div class='modal-dialog'>

      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>

          <h4 class='modal-title'>Deleting the Supplier Information</h4>
        </div>
        <div class='modal-body'>
          <p>Please conform! your deleting the supplier information permanently</p>
        </div>
        <div class='modal-footer'>
          <a href='supplier_delete.php?sname=".$query_executed['Sname']."'><button type='button' class='btn btn-primary'>Yes</button></a>
          <div>
          <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
        </div>
      </div>

    </div>
  </div>
            </td>
          </tr>";
      $count+=1;
      }
CloseCon($conn);
    }
    else{
      echo "unable to Execute the query";
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
  <script src="./js/main.js"></script>

  </body>
</html>
