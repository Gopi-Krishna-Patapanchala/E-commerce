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
        Admin Panel Dashboard || Product confidence Matix analysis
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

              <li>
                <a href="./customer_details.php">
                  <i class="fa fa-users"></i>
                  <p>Customer Details</p>
                </a>
              </li>

              <li class="active">
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
            <a class="navbar-brand" href="javascript:;">Product confidence Matix analysis</a>
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
              <div class="card-header ">
                <h5 class="card-title">using the number of ratings and the number of customers to which it has been sold</h5>
                <div class="content" >
                  <div class="row">
                    <div class="col-lg-12">

                  <table class="table table-hover" id="not_rating_customers" style="width:100%">
            <thead class="table-primary" style="background-color:#111344;color:#fff">
              <tr>

                <th scope="col">Product ID</th>
                <th scope="col">Distinct Customer count who order specific product</th>
                  <th scope="col">Mean value rating</th>
                  <th scope="col">STD value rating</th>
                  <th scope="col">Z-score</th>

                                </tr>
            </thead>
            <tbody>

              <?php

              $z_scorequery ="select upc,count(distinct CustomerID) as customer_count,avg(rating) as rating_mean_value,STDDEV(rating) as rating_std_value, case when (count(distinct CustomerID)-avg(Rating))/STDDEV(rating)is null then 0 else (count(distinct CustomerID)-avg(Rating))/STDDEV(rating)end as Z_score from rated join (select * from orders join contains using(orderID)) as r using(upc,CustomerID) group by upc;";
              $result = mysqli_query($conn,$z_scorequery);
              if($result)
              {
                while($query_executed=mysqli_fetch_assoc($result))
                {
                  echo"<tr>
                    <td>".$query_executed['upc']."</td>
                    <td>".$query_executed['customer_count']."</td>
                    <td>".$query_executed['rating_mean_value']."</td>
                    <td>".$query_executed['rating_std_value']."</td>";
                    if($query_executed['rating_mean_value'] < $query_executed['Z_score'])
                    {
                      echo"<td style='color:green'>".$query_executed['Z_score']."</td>";
                  }
                  elseif ($query_executed['Z_score']==0.0) {
                    echo"<td style='color:black'>".$query_executed['Z_score']."</td>";
                  }
                  else
                  {
                    echo "<td style='color:red'>".$query_executed['Z_score']."</td>";
                  }


                  echo "</tr>";
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

            <div class="content" >
              <div class="row">
                <div class="col-lg-12" style="width:1100px">
                  <div class="card ">
                    <div class="card-header ">
                      <h5 class="card-title">using the number of ratings and the number of orders in which it has been sold</h5>
                      <div class="content" >
                        <div class="row">
                          <div class="col-lg-12">

                        <table class="table table-hover" id="rating_order" style="width:100%">
                  <thead class="table-primary" style="background-color:#111344;color:#fff">
                    <tr>

                      <th scope="col">Product ID</th>
                      <th scope="col">Number of orders Specific product appeared</th>
                        <th scope="col">Mean value rating</th>
                        <th scope="col">STD value rating</th>
                        <th scope="col">Z-score</th>

                                      </tr>
                  </thead>
                  <tbody>

                    <?php

                    $z_scorequery ="select upc,count(OrderID) as order_count,avg(rating) as rating_mean_value,STDDEV(rating) as rating_std_value, case when (count(orderID)-avg(Rating))/STDDEV(rating)is null then 0 else (count(orderID)-avg(Rating))/STDDEV(rating)end as Z_score from rated join (select * from orders join contains using(orderID)) as r using(upc,CustomerID) group by upc;";
                    $result = mysqli_query($conn,$z_scorequery);
                    if($result)
                    {
                      while($query_executed=mysqli_fetch_assoc($result))
                      {
                        echo"<tr>
                          <td>".$query_executed['upc']."</td>
                          <td>".$query_executed['order_count']."</td>
                          <td>".$query_executed['rating_mean_value']."</td>
                          <td>".$query_executed['rating_std_value']."</td>";
                          if($query_executed['rating_mean_value'] < $query_executed['Z_score'])
                          {
                            echo"<td style='color:green'>".$query_executed['Z_score']."</td>";
                        }
                        elseif ($query_executed['Z_score']==0.0) {
                          echo"<td style='color:black'>".$query_executed['Z_score']."</td>";
                        }
                        else
                        {
                          echo "<td style='color:red'>".$query_executed['Z_score']."</td>";
                        }


                        echo "</tr>";
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


              <div class="content" >
                <div class="row">
                  <div class="col-lg-12" style="width:1100px">
                    <div class="card ">
                      <div class="card-header ">
                        <h5 class="card-title">using the number of ratings, the number of customers and the number of days since first rating
</h5>
                        <div class="content" >
                          <div class="row">
                            <div class="col-lg-12">
                              <form action ="#" method="post">
                                <div class='form-group'>
                                  <label for='usr'>Enter the number of day need to consider from first rating</label>
                                    <input type='number' class='form-control' name='threshold'>
                                  </div>
                                  <button type="submit" class='btn btn-primary' name="filter">Fetch</button>
                                </form>
                          <table class="table table-hover" id="rating_start_date" style="width:100%">
                    <thead class="table-primary" style="background-color:#111344;color:#fff">
                      <tr>

                        <th scope="col">Product ID</th>
                        <th scope="col">Distinct Customer count who rated specific product</th>
                          <th scope="col">Mean value rating</th>
                          <th scope="col">STD value rating</th>
                          <th scope="col">Z-score</th>

                                        </tr>
                    </thead>
                    <tbody>

                      <?php
                      if (isset($_POST['filter']))
                      {
                        $days_count = $_POST['threshold'];

                      $z_scorequery ="select upc,count(distinct CustomerID) as customer_count,avg(rating) as rating_mean_value,STDDEV(rating) as rating_std_value, case when (count(distinct CustomerID)-avg(Rating))/STDDEV(rating)is null then 0 else (count(distinct CustomerID)-avg(Rating))/STDDEV(rating)end as Z_score from Rated join (select upc,min(RatingDate) as STARTING_date from rated group by upc) as r using(UPC)  where datediff(RatingDate,STARTING_date) <".$days_count ." group by upc;";
                      $result = mysqli_query($conn,$z_scorequery);
                      if($result)
                      {
                        while($query_executed=mysqli_fetch_assoc($result))
                        {
                          echo"<tr>
                            <td>".$query_executed['upc']."</td>
                            <td>".$query_executed['customer_count']."</td>
                            <td>".$query_executed['rating_mean_value']."</td>
                            <td>".$query_executed['rating_std_value']."</td>";
                            if($query_executed['rating_mean_value'] < $query_executed['Z_score'])
                            {
                              echo"<td style='color:green'>".$query_executed['Z_score']."</td>";
                          }
                          elseif ($query_executed['Z_score']==0.0) {
                            echo"<td style='color:black'>".$query_executed['Z_score']."</td>";
                          }
                          else
                          {
                            echo "<td style='color:red'>".$query_executed['Z_score']."</td>";
                          }


                          echo "</tr>";
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



                            <div class="content" >
                              <div class="row">
                                <div class="col-lg-12" style="width:1100px">
                                  <div class="card ">
                                    <div class="card-header ">
                                      <h5 class="card-title">Which category products should maintain more</h5>
                                      <div class="content" >
                                        <div class="row">
                                          <div class="col-lg-12">

                                        <table class="table table-hover" id="maintain_more" style="width:100%">
                                  <thead class="table-primary" style="background-color:#111344;color:#fff">
                                    <tr>

                                      <th scope="col">Category</th>
                                      <th scope="col">Product Available under specific category</th>
                                        <th scope="col">Mean value rating</th>
                                        <th scope="col">STD value rating</th>
                                        <th scope="col">Z-score</th>

                                                      </tr>
                                  </thead>
                                  <tbody>

                                    <?php

                                    $z_scorequery ="select Category,count(DISTINCT upc) as upc_count, avg(rating) as rating_mean_value, std(rating) as rating_std_value, (count(DISTINCT upc)-avg(rating))/std(rating) as Z_score from rated join Product_category using(UPC) group by Category;";
                                    $result = mysqli_query($conn,$z_scorequery);
                                    if($result)
                                    {
                                      while($query_executed=mysqli_fetch_assoc($result))
                                      {
                                        echo"<tr>
                                          <td>".$query_executed['Category']."</td>
                                          <td>".$query_executed['upc_count']."</td>
                                          <td>".$query_executed['rating_mean_value']."</td>
                                          <td>".$query_executed['rating_std_value']."</td>";
                                          if($query_executed['rating_mean_value'] < $query_executed['Z_score'])
                                          {
                                            echo"<td style='color:green'>".$query_executed['Z_score']."</td>";
                                        }
                                        elseif ($query_executed['Z_score']==0.0) {
                                          echo"<td style='color:black'>".$query_executed['Z_score']."</td>";
                                        }
                                        else
                                        {
                                          echo "<td style='color:red'>".$query_executed['Z_score']."</td>";
                                        }


                                        echo "</tr>";
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
      $('#rating_start_date').DataTable();
      });



$(document).ready(function(){
$('#maintain_more').DataTable();
});

$(document).ready(function(){
$('#not_rating_customers').DataTable();
});
            $(document).ready(function(){
            $('#rating_order').DataTable();
            });


      </script>
  </body>
</html>
