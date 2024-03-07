<!doctype>
<html>
  <head>
      <meta charset="utf-8" />
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <title>
        Admin Panel Dashboard
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
body
{
  background-color: #ffff;
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
                <li  class="active">
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
            <a class="navbar-brand" href="javascript:;">Administrative Dashboard Panel</a>
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
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Total Customers</p>


                      <?php

                      //connecting to data base
                      include 'connect_database.php';

                      $conn = OpenCon();
                      if(!$conn)
                      echo "connection not established";

                      $customer_count = "select count(CustomerID) as count_customer from Customer";

                      $customer_count_result = mysqli_query($conn,$customer_count);

                      if(!$customer_count_result)
                      {
                        echo "unable to fetch the customer count information";
                        die;
                      }
                      else
                      {

                        $row = mysqli_fetch_assoc($customer_count_result);
                        $row_count = $row['count_customer'];
                        echo "<p class='card-title'>".$row_count."</p>";
                      }

                        ?>


                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Total Supplier</p>
                      <?php

                      $supplier_count = "select count(Sname) as count_supplier from Supplier";

                      $supplier_count_result = mysqli_query($conn,$supplier_count);

                      if(!$supplier_count_result)
                      {
                        echo "unable to fetch the supplier count information";
                        die;
                      }
                      else
                      {

                        $supplier_row = mysqli_fetch_assoc($supplier_count_result);
                        $supplier_row_count = $supplier_row['count_supplier'];
                        echo "<p class='card-title'>".$supplier_row_count."</p>";
                      }



                       ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>

        </div>




        <div class="content" >
          <div class="row">
            <div class="col-lg-12" style="width:1100px">
              <div class="card ">

                <?php

                $state_wise = "select state,count(DISTINCT CustomerID) as rater from customer join rated using(CustomerID) group by state order by rater desc";
                $result = mysqli_query($conn,$state_wise);
                $value = '';
                $X_axis = '';

                while($query_executed=mysqli_fetch_assoc($result))
                {

                 $value.=$query_executed["rater"].',';
                 $X_axis.="'".$query_executed['state']."',";
                }

                 ?>
                 <br>

                <div id="chart"></div>
                 <h5 style="text-align:center">State Wise Raters Analysis</h5>
              <script>

                      var options = {
                        series: [
                          {
                        name: 'Raters count',
                        data: [<?php echo $value;?>]
                      }],
                        chart: {
                        type: 'bar',
                        height: 350
                      },

                      plotOptions: {
                        bar: {
                          columnWidth: '45%',
                          distributed: true,
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                      },
                      xaxis: {
                        categories: [<?php echo $X_axis;?>],
                      },

                      fill: {
                        opacity: 1
                      },
                      tooltip: {
                        y: {
                          formatter: function (val) {
                            return "" + val + " Persons"
                          }
                        }
                      },
                      legend: {
                    show: false,
                  }

                      };

                      var chart = new ApexCharts(document.querySelector("#chart"), options);
                      chart.render();
              </script>
                  </div>
                </div>
              </div>
            </div>





                    <div class="content" >
                      <div class="row">
                        <div class="col-lg-12" style="width:1100px">
                          <div class="card">
                            <form action='Admin_panel.php' method='post'>
                              <div class='form-group'>
                                <label for='usr'>Enter the Count threshold</label>
                                  <input type='number' class='form-control' name='Appearance_threshold'>
                                  <button type='submit' class='btn btn-primary' name='Appearance_threshold_fecth'>Fetch result</button>
                                </div>
                              </form>

                            <?php
                            if (isset($_POST['Appearance_threshold_fecth']) & isset($_POST['Appearance_threshold']))
                            {

                              $Appearance_threshold=$_POST['Appearance_threshold'];
                              $Appearance_threshold_query = "select upc,count(*) as appearance from Wishes group by upc having count(*)<=".$Appearance_threshold;

                              }
                              else {
                                $Appearance_threshold_query = "select upc,count(*) as appearance from Wishes group by upc";
                              }
                            $result = mysqli_query($conn,$Appearance_threshold_query);
                            $value = '';
                            $X_axis = '';

                            while($query_executed=mysqli_fetch_assoc($result))
                            {

                             $value.=$query_executed["appearance"].',';
                             $X_axis.="'".$query_executed['upc']."',";
                            }

                             ?>
                             <br>

                            <div id="highly_wished_products"></div>
                             <h5 style="text-align:center">Highly wished Products</h5>
                          <script>

                                  var options = {
                                    series: [
                                      {
                                    name: 'wished count',
                                    data: [<?php echo $value;?>]
                                  }],
                                    chart: {
                                    type: 'bar',
                                    height: 350
                                  },

                                  plotOptions: {
                                    bar: {
                                      columnWidth: '45%',
                                      distributed: true,
                                    }
                                  },
                                  dataLabels: {
                                    enabled: false
                                  },
                                  stroke: {
                                    show: true,
                                    width: 2,
                                    colors: ['transparent']
                                  },
                                  xaxis: {
                                    categories: [<?php echo $X_axis;?>],
                                  },

                                  fill: {
                                    opacity: 1
                                  },
                                  tooltip: {
                                    y: {
                                      formatter: function (val) {
                                        return "" + val + " Appearance"
                                      }
                                    }
                                  },
                                  legend: {
                                show: false,
                              }

                                  };

                                  var chart = new ApexCharts(document.querySelector("#highly_wished_products"), options);
                                  chart.render();
                          </script>
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
$('#state_rater').DataTable();
});
  </script>
  </body>
</html>
