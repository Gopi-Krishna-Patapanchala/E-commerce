<?php
session_start();
include 'Connect_database.php';
include 'Current_customer.php';


$conn = OpenCon();
if(!$conn)
echo "connection not established";


if(isset($_POST['place_order']))
{
    $payment_method=$_POST['card'];
    $card_number = $_POST['ccn'];
    $order_insert = "INSERT INTO `Orders`(`OrderID`, `Orderdate`, `Shipdate`, `Paymenttype`, `CCN`, `CustomerID`) VALUES
                                          ('0',now(),null,'$payment_method','$card_number','$customerID')";

    $order_result=mysqli_query($conn,$order_insert);
    if($order_result)
    {
         $contains_insert = "insert into Contains (OrderId, Quantity,UPC) SELECT OrderID,Quantity,UPC FROM `cart` join Orders using(customerid)
         where OrderID in (select max(OrderID) from orders) and OrderID not in (select orderID from Contains) and CustomerID=".$customerID;

         $result_contains_insert = mysqli_query($conn,$contains_insert);
         if($result_contains_insert)
         {

          //
            //ALert table logic

          $alert_log =  "insert into Alert_product_order (OrderId, Quantity,UPC)  SELECT OrderID,Quantity,UPC FROM `cart`
                                join Orders using(customerid) where OrderID in (select max(OrderID) from orders) and Quantity >20 and CustomerID=".$customerID;

          //
    
            $alert = mysqli_query($conn,$alert_log);
            if(!$alert)
            {
              echo "unable to insert rows into alert table";
              die();
            }

             $delete_cart_products = "delete from cart where customerID=".$customerID;
             $delete_cart_result = mysqli_query($conn,$delete_cart_products);
             if($delete_cart_result)
             {
                    header("Location:./cart.php");
                    die();
                }
            }
          else {

            $delete_order_Details = "delete from Orders where CustomerID=".$customerID." and OrderID in (select max(OrderID) from Orders);";
            $delete_order_result = mysqli_query($conn,$delete_order_Details);
            if($delete_order_result)
              echo "Order table roll back";
              die();

          }
        }

    }






 ?>
