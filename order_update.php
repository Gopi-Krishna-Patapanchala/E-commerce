<?php
//connecting to data base
include 'connect_database.php';
$conn = OpenCon();
if(!$conn)
{
echo "connection not established";
}

if(!empty($_GET['OrderID']))
{
  $orderid= $_GET['OrderID'];

  $shippment_initate = "UPDATE `Orders` SET `Shipdate`=date(now()) WHERE `OrderID`='$orderid'";
  $result = mysqli_query($conn,$shippment_initate);
  if($result)
  {
    header("Location:./order_analysis.php");
     die;
  }
  else {
    echo "Unable to update the shippment date";
  }
}


 ?>
