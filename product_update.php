<?php
//connecting to data base
include 'connect_database.php';

$conn = OpenCon();
if(!$conn)
{
echo "connection not established";

}


    // inserting new details for supplier
if (isset($_POST['update_details']))
{
  $upc = $_POST['update_details'];
  $p_name=$_POST['pname'];
  $s_name=$_POST['Sname'];
  $price=$_POST['price'];
  $amount=$_POST['amount'];
  $reorder=$_POST['reorder'];

  $query = "UPDATE `Products` SET `Pname`='$p_name',`Price`='$price',`Sname`='$s_name',`amount`='$amount',`reorderlevel`='$reorder' WHERE `UPC`='$upc'";

  $result = mysqli_query($conn,$query);
  if($result)
  {
    header("Location:./Inventory_view.php");
    die;
  }
  else {
    echo "unable to update the product details";
  }
}
