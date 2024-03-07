<?php
include 'connect_database.php';
include 'Current_customer.php';
$conn = OpenCon();
if(!$conn)
echo "connection not established";

if(!empty($_GET['UPC']))
{
  $product_ID = $_GET['UPC'];

  //checking if alreay product in wish list
  $check_wish_list = "select * from Wishes where upc ='".$product_ID."' and CustomerID = ".$customerID;

  $check_result = mysqli_query($conn,$check_wish_list);
  if(!mysqli_num_rows($check_result))
  {
    $insert_query = "INSERT INTO `Wishes`(`CustomerID`, `UPC`) VALUES ('$customerID','$product_ID')";

    $result = mysqli_query($conn,$insert_query);
    if($result)
    {
      header("Location:./Products.php");
      die;
    }
    else {
      echo "unable to insert values into Cart table";
    }
  }












}
