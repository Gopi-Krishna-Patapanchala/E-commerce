<!doctype>
<html>
  <head>
      <meta charset="utf-8" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <title>
        Admin Panel Dashboard || Customer information
      </title>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href="./css/bootstrap.min.css" rel="stylesheet" />
      <link href="./css/dashboard.css?v=2.0.1" rel="stylesheet" />
      <link href="./css/main.css" rel="stylesheet" />
      <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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
              <li>
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

              <li class="active">
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
            <a class="navbar-brand" href="javascript:;">Available Customer Information</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

          </div>
          <button type="button" class="btn btn-primary"  data-toggle='modal' data-target='#addCustomer'> Add new Customer Details</button>


      </nav>
      <!-- End Navbar -->
      <form action="Customer_details_insert.php" method="post">
            <!-- Modal -->
            <div class='modal fade' id='addCustomer' role='dialog'>
              <div class='modal-dialog'>

                <!-- Modal content-->
                <div class='modal-content'>
                  <div class='modal-header'>

                    <h4 class='modal-title'>Adding New Customer Information</h4>
                  </div>
                  <div class='modal-body'>

                    <div class="form-group">
                      <label for="usr">Customer ID</label>
                        <input type="text" class="form-control" name="CustomerID"/>
                      </div>


                    <div class="form-group">
                      <label for="usr">Customer First Name</label>
                        <input type="text" class="form-control" name="Fname"/>
                      </div>



                        <div class="form-group">
                        <label for="usr">Customer Last Name</label>
                          <input type="text" class="form-control" name="Lname"/>
                          </div>

                          <div class="form-group">
                            <label for="usr">Customer Address information</label>
                              <input type="text" class="form-control" name="Address"/>
                            </div>

                      <div class="form-group">
                        <label for="usr">Customer City information</label>
                          <input type="text" class="form-control" name="city"/>
                        </div>

                        <div class="form-group">
                          <label for="usr">Customer State information</label>
                            <input type="text" class="form-control" name="state"/>
                          </div>

                        <div class="form-group">
                          <label for="usr">Customer Zip Code</label>
                            <input type="text" class="form-control" name="zip"/>
                          </div>

                  </div>
                  <div class='modal-footer'>
                    <button type='submit' class='btn btn-primary' name="add_details">Yes</button></a>
                    <div>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </form>


      <div class="content" >
        <div class="row">
          <h4> List of Customer Available in Data base</h4>
          <div class="col-lg-12" style="width:1100px">
            <div class="card ">
        <table class="table table-hover" id="customer_details">
  <thead class="table-primary" style="background-color:#111344;color:#fff">
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Zip</th>
      <th scope="col">Delete Request</th>
      <th scope="col">Update Request</th>
    </tr>
  </thead>
  <tbody>
    <?php

    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
    echo "connection not established";




    $query = "select * from Customer";
    $Supplier_details = mysqli_query($conn,$query);

    if (mysqli_num_rows($Supplier_details)>1)
    {
      $count=1;
      while($query_executed = mysqli_fetch_array($Supplier_details))
      {
    ECHO "<tr>
            <th scope='row'>".$query_executed['CustomerID']."</th>
            <td>".$query_executed['Fname']."</td>
            <td>".$query_executed['Lname']."</td>
            <td>".$query_executed['Address']."</td>
            <td>".$query_executed['City']."</td>
            <td>".$query_executed['State']."</td>
            <td>".$query_executed['Zip']."</td>
            <td>
            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal".$count."'> delete Customer details</button>

  <!-- Modal -->
  <div class='modal fade' id='myModal".$count."' role='dialog'>
    <div class='modal-dialog'>

      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>

          <h4 class='modal-title'>Deleting the Customer Information</h4>
        </div>
        <div class='modal-body'>
          <p>Please conform! your deleting the Customer information permanently</p>
        </div>
        <div class='modal-footer'>
          <a href='Customer_delete.php?CustomerID=".$query_executed['CustomerID']."'><button type='button' class='btn btn-primary'>Yes</button></a>
          <div>
          <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
        </div>
      </div>

    </div>
  </div>
            </td>






            <td>
            <button type='button' class='btn btn-success' data-toggle='modal' data-target='#update".$count."'> update Customer details</button>

  <!-- Modal -->
  <div class='modal fade' id='update".$count."' role='dialog'>
  <form action='customer_update.php' method='post'>
    <div class='modal-dialog'>

      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>

          <h4 class='modal-title'>updating the Customer Information</h4>
        </div>
        <div class='modal-body'>
        <div class='form-group'>
          <label for='usr'>Customer First Name</label>
            <input type='text' class='form-control' name='fname' value='".$query_executed['Fname']."'>
          </div>
          <div class='form-group'>
            <label for='usr'>Customer Last Name</label>
              <input type='text' class='form-control' name='lname' value='".$query_executed['Lname']."'>
            </div>
            <div class='form-group'>
              <label for='usr'>Customer Address</label>
                <input type='text' class='form-control' name='address' value='".$query_executed['Address']."'>
              </div>
              <div class='form-group'>
                <label for='usr'>Customer City Name</label>
                  <input type='text' class='form-control' name='city' value='".$query_executed['City']."'>
                </div>
                <div class='form-group'>
                  <label for='usr'>Customer State Name</label>
                    <input type='text' class='form-control' name='state' value='".$query_executed['State']."'>
                  </div>
                  <div class='form-group'>
                    <label for='usr'>Customer Zip Code</label>
                      <input type='text' class='form-control' name='zip' value='".$query_executed['Zip']."'>
                    </div>

</div>
        <div class='modal-footer'>
          <button type='submit' class='btn btn-primary' name='update_details' value = '".$query_executed['CustomerID']."'>Yes</button>
          <div>
          <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
        </div>
      </div>

    </div>
    </form>
  </div>
            </td>
          </tr>";
      $count+=1;
      }

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
<br>
<br>


<div class="container" style="margin-right:-1px;">
  <div class="content" >
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">Prospective Customers Information</h5>
          <div class="content" >
            <div class="row">
              <div class="col-lg-12">

            <table class="table table-hover" id="Prospective_customers" style="width:100%">
      <thead class="table-primary" style="background-color:#111344;color:#fff">
        <tr>

          <th scope="col">Customer ID</th>
          <th scope="col">Customer First Name</th>
            <th scope="col">Customer Last Name</th>
          <th scope="col">Address</th>
                          </tr>
      </thead>
      <tbody>
        <?php

          $customer_no_order_query = "SELECT CustomerID, Fname,Lname,Address FROM `Customer` WHERE CustomerID not in (Select CustomerID from Orders)";
          $customer_no_order_query_result = mysqli_query($conn,$customer_no_order_query);
          if (mysqli_num_rows($customer_no_order_query_result)>1)
          {
            while($query_executed = mysqli_fetch_array($customer_no_order_query_result))
            {
              Echo "<tr>


                                            <td>".$query_executed['CustomerID']."</td>
                                            <td>".$query_executed['Fname']."</td>
                                            <td>".$query_executed['Lname']."</td>
                                            <td>".$query_executed['Address']."</td>



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

<div class="container" style="margin-right:-1px;">
  <div class="content" >
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">List of customers who have rated at least one product that they did not buy</h5>
          <div class="content" >
            <div class="row">
              <div class="col-lg-12">

            <table class="table table-hover" id="not_buy_rated_customers" style="width:100%">
      <thead class="table-primary" style="background-color:#111344;color:#fff">
        <tr>

          <th scope="col">Customer ID</th>
          <th scope="col">Customer First Name</th>
            <th scope="col">Customer Last Name</th>

                          </tr>
      </thead>
      <tbody>
        <?php

          $customer_no_order_query = "select CustomerID,fname,Lname from Customer
                                      where CustomerID in (select CustomerID
                                                            from rated join (select UPC,CustomerID
                                                                            from orders join contains using(orderID)) as R
                                                            using(CustomerID) where rated.UPC != R.UPC)";
          $customer_no_order_query_result = mysqli_query($conn,$customer_no_order_query);
          if (mysqli_num_rows($customer_no_order_query_result)>1)
          {
            while($query_executed = mysqli_fetch_array($customer_no_order_query_result))
            {
              Echo "<tr>


                                            <td>".$query_executed['CustomerID']."</td>
                                            <td>".$query_executed['fname']."</td>
                                            <td>".$query_executed['Lname']."</td>




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




    <div class="container" style="margin-right:-1px;">
      <div class="content" >
      <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header ">
              <h5 class="card-title">List of customers who have only rated products that they did not buy</h5>
              <div class="content" >
                <div class="row">
                  <div class="col-lg-12">

                <table class="table table-hover" id="only_rating_customers" style="width:100%">
          <thead class="table-primary" style="background-color:#111344;color:#fff">
            <tr>

              <th scope="col">Customer ID</th>
              <th scope="col">Customer First Name</th>
                <th scope="col">Customer Last Name</th>

                              </tr>
          </thead>
          <tbody>
            <?php

              $customer_no_order_query = "select CustomerID,fname,Lname from Customer where CustomerID in (select CustomerID from Rated where CustomerID not in (select CustomerID from Orders));";
              $customer_no_order_query_result = mysqli_query($conn,$customer_no_order_query);
              if (mysqli_num_rows($customer_no_order_query_result)>1)
              {
                while($query_executed = mysqli_fetch_array($customer_no_order_query_result))
                {
                  Echo "<tr>


                                                <td>".$query_executed['CustomerID']."</td>
                                                <td>".$query_executed['fname']."</td>
                                                <td>".$query_executed['Lname']."</td>




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







<div class="container" style="margin-right:-1px;">
  <div class="content" >
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">List of customers who did not rate any products they bought</h5>
          <div class="content" >
            <div class="row">
              <div class="col-lg-12">

            <table class="table table-hover" id="not_rating_customers" style="width:100%">
      <thead class="table-primary" style="background-color:#111344;color:#fff">
        <tr>

          <th scope="col">Customer ID</th>
          <th scope="col">Customer First Name</th>
            <th scope="col">Customer Last Name</th>

                          </tr>
      </thead>
      <tbody>
        <?php

          $customer_no_order_query = "select CustomerID,Fname,Lname from Customer where CustomerID in
      (select CustomerID from Orders where CustomerID not in
      	 (SELECT customerID FROM rated)
      )";
          $customer_no_order_query_result = mysqli_query($conn,$customer_no_order_query);
          if (mysqli_num_rows($customer_no_order_query_result)>1)
          {
            while($query_executed = mysqli_fetch_array($customer_no_order_query_result))
            {
              Echo "<tr>


                                            <td>".$query_executed['CustomerID']."</td>
                                            <td>".$query_executed['Fname']."</td>
                                            <td>".$query_executed['Lname']."</td>




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







<div class="container" style="margin-right:-1px;">
  <div class="content" >
  <div class="row">
    <div class="col-lg-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">List of customers who have not been too active during specific period</h5>
          <div class="content" >

              <form action='customer_details.php' method='post'>
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

                  <button type='submit' class='btn btn-primary' name='inactive_customer'>Fetch result</button>
                </form>
              <div class="col-lg-12">

            <table class="table table-hover" id="active_specific_period" style="width:100%">
      <thead class="table-primary" style="background-color:#111344;color:#fff">
        <tr>

          <th scope="col">Customer ID</th>
          <th scope="col">Customer First Name</th>
          <th scope="col">Customer Last Name</th>
          <th scope="col">Placed Orders count</th>

                          </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST['inactive_customer']))
        {
          $order_count = $_POST['threshold'];
          $start_date = $_POST['start_date'];
          $end_date = $_POST['end_date'];


        $inactive_customer_query= "select CustomerID,Fname,Lname,Order_placed from Customer join (select CustomerID,COUNT(OrderID) as Order_placed from Orders where Orderdate BETWEEN  '".$start_date."' And '".$end_date."' GROUP by CustomerID having count(OrderID)<=".$order_count.") as R using(CustomerID);";
          $inactive_customer_queryresult = mysqli_query($conn,$inactive_customer_query);
          if (mysqli_num_rows($inactive_customer_queryresult)>1)
          {
            while($query_executed = mysqli_fetch_array($inactive_customer_queryresult))
            {
              Echo "<tr>


                                            <td>".$query_executed['CustomerID']."</td>
                                            <td>".$query_executed['Fname']."</td>
                                            <td>".$query_executed['Lname']."</td>
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
</div>




    </div>






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
      $('#customer_details').DataTable();
      });


      $(document).ready(function(){
      $('#Prospective_customers').DataTable();
      });

$(document).ready(function(){
$('#only_rating_customers').DataTable();
});

$(document).ready(function(){
$('#not_rating_customers').DataTable();
});
            $(document).ready(function(){
            $('#not_buy_rated_customers').DataTable();
            });


$(document).ready(function(){
$('#active_specific_period').DataTable();
});

      </script>
  </body>
</html>
