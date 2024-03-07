<?php
include 'connect_database.php';

$conn = OpenCon();
if(!$conn)
echo "connection not established";
?>
<!doctype html>
<head>

  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>
    Users Dashboard || Products Page
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

.product-grid6,.product-grid6 .product-image6
{
  overflow:hidden
}
.product-grid6
{
  font-family:'Open Sans',sans-serif;
  text-align:center;
  position:relative;
  transition:all .5s ease 0s
}
.product-grid6:hover
{
  box-shadow:0 0 10px rgba(0,0,0,.3)
}
.product-grid6 .product-image6 a{display:block}
.product-grid6 .product-image6 img{width:100%;height:auto;transition:all .5s ease 0s}
.product-grid6:hover .product-image6 img{transform:scale(1.1)}
.product-grid6 .product-content{padding:12px 12px 15px;transition:all .5s ease 0s}
.product-grid6:hover .product-content{opacity:0}
.product-grid6 .title{font-size:20px;font-weight:600;text-transform:capitalize;margin:0 0 10px;transition:all .3s ease 0s}
.product-grid6 .title a{color:#000}
.product-grid6 .title a:hover{color:#2e86de}
.product-grid6 .price{font-size:18px;font-weight:600;color:#2e86de}
.product-grid6 .price span{color:#999;font-size:15px;font-weight:400;text-decoration:line-through;margin-left:7px;display:inline-block}
.product-grid6 .social{background-color:#fff;width:100%;padding:0;margin:0;list-style:none;opacity:0;transform:translateX(-50%);position:absolute;bottom:-50%;left:50%;z-index:1;transition:all .5s ease 0s}
.product-grid6:hover .social{opacity:1;bottom:20px}
.product-grid6 .social li{display:inline-block}
.product-grid6 .social li a{color:#909090;font-size:16px;line-height:45px;text-align:center;height:45px;width:45px;margin:0 7px;border:1px solid #909090;border-radius:50px;display:block;position:relative;transition:all .3s ease-in-out}
.product-grid6 .social li a:hover{color:#fff;background-color:#2e86de;width:80px}
.product-grid6 .social li a:after,.product-grid6 .social li a:before{content:attr(data-tip);color:#fff;background-color:#2e86de;font-size:12px;letter-spacing:1px;line-height:20px;padding:1px 5px;border-radius:5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
.product-grid6 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-20px;z-index:-1}
.product-grid6 .social li a:hover:after,.product-grid6 .social li a:hover:before{opacity:1}
@media only screen and (max-width:990px){.product-grid6{margin-bottom:30px}
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

          <li class="active">
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
                  <a class="navbar-brand" href="javascript:;">Products</a>
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
<div class="content" style="margin-left:400px;">
    <div class="row">
      <form action='Products.php' method='post'>
        <div class="col-md-12" style="width:900px">
        <div class='form-group'>
          <label for='usr'>Enter the Product categories</label>
          <?php
          echo "<select class='form-control' name='product_category'>
                <option> ----- Please select the Product category -----</option>
            ";
            $product_category = "select distinct category from Product_category;";
            $result = mysqli_query($conn,$product_category);
            while($query_executed=mysqli_fetch_array($result))
            {
              echo '<option value ="'.$query_executed['category'].'">'.ucwords($query_executed['category']).'</option>';
            }
            echo "</select>";
           ?>
            <br>
          <div class='form-group'>
            <label for='usr'>Select the Order to display products</label>
            <select class='form-control' name='order_by'>
            <option value='unique_customer'> ----- select the Order to display products -----</option>
            <option value ='unique_customer'> Based on customer count purchase</option>
            <option value ='order_appear'> Based on Product appearance in orders</option>
            <option value='sale_rate'> Based on quantity customer purchase</option>
          </select>
        </div>
              <button type='submit' class='btn btn-primary' name='product_category_button'>View products</button>
            </div>

        </div>
        </form>

      <?php
      if(isset($_POST['product_category_button']))
      {
        $category=$_POST['product_category'];
        $order_by =$_POST['order_by'];
        $product_availble="select upc,pname,price from Product_category join (products
                            join (SELECT UPC, count(DISTINCT customerID) as unique_customer,count(*) as order_appear,
                                  sum(quantity) as sale_rate
                                  FROM orders JOIN contains
                                  using (OrderID)
								                  GROUP BY UPC)
                            as R using(UPC)
                            )
                             using(UPC)
                              where category ='".$category."' order by ".$order_by." Desc";
      
      }
      else {
            $product_availble = "select upc,pname,price from products;";
      }

      $result = mysqli_query($conn,$product_availble);
      while($query_executed=mysqli_fetch_assoc($result))
      {
        echo '<div class="col-md-3 col-sm-4">
              <div class="product-grid6">

                  <div class="product-image6" >

                          <img class="pic-1" src="#" alt='.$query_executed['upc'].'>
                    </div>

                  <div class="product-content">
                      <h3 class="title">'.$query_executed['pname'].'</h3>
                      <h6> Price $'.$query_executed['price'].'</h3>
                  </div>

                  <ul class="social">
                      <li><a href="" data-tip="Rating" data-toggle="modal" data-target="#addrating'.$query_executed['upc'].'"><i class="fa fa-star"></i></a></li>
                      <li><a href="" data-tip="Add to Wishlist" data-toggle="modal" data-target="#addwishlist'.$query_executed['upc'].'"><i class="fa fa-shopping-bag"></i></a></li>
                      <li><a href="" data-tip="Add to Cart" data-toggle="modal" data-target="#addproduct'.$query_executed['upc'].'"><i class="fa fa-shopping-cart"></i></a></li>
                  </ul>

                  <form action="user_rating.php" method="post">
                  <div class="modal fade" id="addrating'.$query_executed['upc'].'" role="dialog">
                  <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">

                      <h4 class="modal-title">Rate the product '.$query_executed['pname'].'</h4>
                    </div>
                    <div class="modal-body">
                    <select class="form-control" name="rating">
                    <option >---- Please provide your rating ----</option>
                      <option value="1">1 star</option>
                      <option value="2">2 star</option>
                      <option value="3">3 star</option>
                      <option value="4">4 star</option>
                      <option value="5">5 star</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="add_user_rating" value='.$query_executed['upc'].'>Yes</button></a>
                    <div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                  </div>
                  </div>

                  </div>
                  </div>
                  </div>
                  </form>



                  <div class="modal fade" id="addwishlist'.$query_executed['upc'].'" role="dialog">
                  <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">

                      <h4 class="modal-title">Adding Product to Wishlist</h4>
                    </div>
                    <div class="modal-body">
                    <p>Please conform! your adding '.$query_executed['pname'].' Product into your wish list</p>
                  </div>
                  <div class="modal-footer">
                    <a href="add_customer_wish_list.php?UPC='.$query_executed['upc'].'"><button type="button" class="btn btn-primary">Yes</button></a>
                    <div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                  </div>
                </div>

              </div>
            </div>
            </div>



                  <form action="user_cart.php" method="post">
                  <div class="modal fade" id="addproduct'.$query_executed['upc'].'" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">

                        <h4 class="modal-title">Adding Product to Cart</h4>
                      </div>
                      <div class="modal-body">

                        <div class="form-group">
                          <label for="usr">Enter the Quantity of product'.$query_executed['pname'].' for order it</label>
                            <input type="number" class="form-control" name="qantity"/>
                          </div>



                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="add_cart" value='.$query_executed['upc'].'>Yes</button></a>
                                <div>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                      </form>

              </div>
            </div>';

      }


       ?>



        </div>
    </div>
</div>




</div>

</body>
</html>
