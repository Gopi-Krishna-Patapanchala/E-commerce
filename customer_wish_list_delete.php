<?php
include 'Connect_database.php';
include 'Current_customer.php';


$conn = OpenCon();
if(!$conn)
echo "connection not established";


if(!empty($_GET['UPC']))
{
    $product_ID=$_GET['UPC'];
    $delete_wish_product = "DELETE from Wishes where CustomerID=".$customerID." and UPC ='".$product_ID."'";
    $result = mysqli_query($conn,$delete_wish_product);
    if (!$result)
    echo "records are not inserted";
    else {
      header("Location:./user_wish_list.php");
      die;
        }

}
 ?>
