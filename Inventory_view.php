<?php
//connecting to data base
include 'connect_database.php';
$conn = OpenCon();
if(!$conn)
{
echo "connection not established";
}

 ?>
<!doctype>
<html>
  <head>
      <meta charset="utf-8" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <title>
        Admin Panel Dashboard || Product Based Analysis
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

            <li class="active">
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
            <a class="navbar-brand" href="javascript:;">Product Inventory Based Analysis </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

          <button type="button" class="btn btn-primary"  data-toggle='modal' data-target='#addproduct'> Add new Product Details</button>


      </nav>
<form action="product_details_insert.php" method="post">
      <!-- Modal -->
      <div class='modal fade' id='addproduct' role='dialog'>
        <div class='modal-dialog'>

          <!-- Modal content-->
          <div class='modal-content'>
            <div class='modal-header'>

              <h4 class='modal-title'>Adding New Product Information</h4>
            </div>
            <div class='modal-body'>
              <div class="form-group">
                <label for="usr">Product ID</label>
                  <input type="text" class="form-control" name="UPC"/>
                </div>

                <div class="form-group">
                  <label for="usr">Product Name</label>
                    <input type="text" class="form-control" name="pname"/>
                  </div>

                  <div class="form-group">
                    <label for="usr">Price for unit</label>
                      <input type="text" class="form-control" name="price"/>
                    </div>

                    <div class="form-group">
                      <label for="usr">Supplier Details</label>

                          <?php
                          echo "<select class='form-control' name='Sname'>";
                          $query = "select Sname from Supplier";
                          $result = mysqli_query($conn,$query) or die(nysqli_error($conn));
                          while($query_executed = mysqli_fetch_array($result))
                          {
                            echo '<option value ="'.$query_executed['Sname'].'">'.$query_executed['Sname'].'</option>';
                          }
                          echo "</select>";
                           ?>

                      </div>

                      <div class="form-group">
                        <label for="usr">Available Quantity</label>
                          <input type="text" class="form-control" name="amount"/>
                        </div>

                        <div class="form-group">
                          <label for="usr">Re-order level value</label>
                            <input type="text" class="form-control" name="reorder"/>
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

      <!-- End Navbar -->

      <div class="content" >
        <div class="row">
          <div class="col-lg-12" style="width:1100px">
            <div class="card ">
              <h5 class="card-title">List of Products Available in Warehouse</h5>
        <table class="table table-hover" id="product_details">
  <thead style="background-color:#111344;color:#fff">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Available Quantity</th>
      <th scope="col">Re-order level value</th>
      <th scope="col">Delete Request</th>
      <th scope="col">update Request</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "select * from Products";

    $product_details = mysqli_query($conn,$query);

    if (mysqli_num_rows($product_details)>1)
    {
      $count=1;
      while($query_executed = mysqli_fetch_array($product_details))
      {
        $upc = $query_executed['UPC'];
    ECHO "<tr>
            <th scope='row'>".$count."</th>
            <td>".$query_executed['UPC']."</td>
            <td>".$query_executed['Pname']."</td>
            <td>".$query_executed['Sname']."</td>
            <td>".$query_executed['amount']."</td>
            <td>".$query_executed['reorderlevel']."</td>
            <td>
            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal".$count."'> delete product details</button>


  <!-- Modal -->
  <div class='modal fade' id='myModal".$count."' role='dialog'>
    <div class='modal-dialog'>

      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>

          <h4 class='modal-title'>Deleting the Product Information</h4>
        </div>
        <div class='modal-body'>
          <p>Please conform! your deleting the Product information permanently</p>
        </div>
        <div class='modal-footer'>
          <a href='product_delete.php?UPC=".$query_executed['UPC']."'><button type='button' class='btn btn-primary'>Yes</button></a>
          <div>
          <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
        </div>
      </div>

    </div>
  </div>
            </td>
            <td>
            <button type='button' class='btn btn-success' data-toggle='modal' data-target='#updatemodel".$count."'>update product details</button>

            <div class='modal fade' id='updatemodel".$count."' role='dialog'>
              <form action='product_update.php' method='post'>
              <div class='modal-dialog'>

                <!-- Modal content-->
                <div class='modal-content'>
                  <div class='modal-header'>

                    <h4 class='modal-title'>Updating Product Information</h4>
                  </div>
                  <div class='modal-body'>


                      <div class='form-group'>
                        <label for='usr'>Product Name</label>
                          <input type='text' class='form-control' name='pname' value='".$query_executed['Pname']."'>
                        </div>

                        <div class='form-group'>
                          <label for='usr'>Price for unit</label>
                            <input type='text' class='form-control' name='price' value=".$query_executed['Price'].">
                          </div>

                          <div class='form-group'>
                            <label for='usr'>Supplier Details</label>
                              <input type='text' class='form-control' name='Sname' value='".$query_executed['Sname']."'>
                            </div>

                            <div class='form-group'>
                              <label for='usr'>Available Quantity</label>
                                <input type='text' class='form-control' name='amount' value='".$query_executed['amount']."'>
                              </div>

                              <div class='form-group'>
                                <label for='usr'>Re-order level value</label>
                                  <input type='text' class='form-control' name='reorder' value='".$query_executed['reorderlevel']."'>
                                </div>



                  </div>
                  <div class='modal-footer'>
                    <button type='submit' class='btn btn-primary' name='update_details' value = '".$query_executed['UPC']."'>Yes</button>
                    <div>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                  </div>
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
</div>

  <div class="conatiner" style="position: relative;margin-top:  490px; margin-left:300px;width:1100px">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <h5 class="card-title">List of Product Quantity below the Re-Order level</h5>
          <table class="table table-hover" id="below_reorder_level">
          <thead style="background-color:#111344;color:#fff">
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Product Name </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $product_below_reorder = "SELECT UPC,Pname from Products where amount<=reorderlevel";
            $result = mysqli_query($conn,$product_below_reorder);
            if($result)
            {
              while($query_executed=mysqli_fetch_assoc($result))
              {
              echo '<tr>
                      <td>'.$query_executed['UPC'].'</td>
                      <td>'.$query_executed['Pname'].'</td>
              </tr>';
            }
            }

             ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>



  <div class="conatiner" style="position: relative;margin-left:300px;width:1100px">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <h5 class="card-title">List of highly wished Product </h5>
          <form action='Inventory_view.php' method='post'>
            <div class='form-group'>
              <label for='usr'>Enter the percentage threshold</label>
                <input type='number' class='form-control' name='threshold'>
                <button type='submit' class='btn btn-primary' name='high_wished'>Fetch result</button>
              </div>
            </form>
          <table class="table table-hover" id="high_wished_products">
          <thead style="background-color:#111344;color:#fff">
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Product Appearance</th>
              <th scope="col">Product Appearance Percentage</th>

            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($_POST['high_wished']))
            {
              $threshold_value = $_POST['threshold'];
              echo "<h6 style='font-size:15px;font-weight: normal;text-align:center'>Fetching the highly wished products who's appearance percentage greater than ".$threshold_value."</h6>";
              $highly_wished_products= "SELECT UPC,
                                       count(UPC) as product_count,
                                       count(UPC) * 100.0 / (select count(*) from Wishes) as Product_percentage
                                        FROM Wishes
                                        group by UPC
                                        having Product_percentage>'".$threshold_value."'";
            $result = mysqli_query($conn,$highly_wished_products);
            if($result)
            {
              while($query_executed=mysqli_fetch_assoc($result))
              {
              echo '<tr>
                      <td>'.$query_executed['UPC'].'</td>
                      <td>'.$query_executed['product_count'].'</td>
                      <td>'.$query_executed['Product_percentage'].'</td>
              </tr>';
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



    <div class="conatiner" style="position: relative;margin-left:300px;width:1100px">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <h5 class="card-title">List of wished products that have never been bought by the customers who wish them</h5>
            <table class="table table-hover" id="wished_products">
            <thead style="background-color:#111344;color:#fff">
              <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Customer First name</th>
                  <th scope="col">Customer Last name</th>
                <th scope="col">List of Products</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $wished_products= "select CustomerID,Fname,Lname,GROUP_CONCAT(UPC) as products from Customer join ((select CustomerID,UPC from Wishes) except (select CustomerID,UPC from Orders join Contains using(OrderID))) as R1 using(CustomerID) group by CustomerID;";
              $result = mysqli_query($conn,$wished_products);
              if($result)
              {
                while($query_executed=mysqli_fetch_assoc($result))
                {
                echo '<tr>
                        <td>'.$query_executed['CustomerID'].'</td>
                        <td>'.$query_executed['Fname'].'</td>
                        <td>'.$query_executed['Lname'].'</td>
                        <td>'.$query_executed['products'].'</td>
                </tr>';
              }
              }

               ?>
            </tbody>
          </table>
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
      $('#product_details').DataTable();
      });

      $(document).ready(function(){
      $('#below_reorder_level').DataTable();
      });

      $(document).ready(function(){
      $('#high_wished_products').DataTable();
      });

      $(document).ready(function(){
      $('#wished_products').DataTable();
      });
      </script>
  </body>
</html>


<?php
CloseCon($conn);
 ?>
