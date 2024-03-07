<?php
//connecting to data base
include 'connect_database.php';

$conn = OpenCon();
if(!$conn)
{
echo "connection not established";

}


    // inserting new details for supplier
    if (isset($_POST['add_details']))
    {

      $p_ID=$_POST['UPC'];
      $p_name=$_POST['pname'];
      $s_name=$_POST['Sname'];
      $price=$_POST['price'];
      $amount=$_POST['amount'];
      $reorder=$_POST['reorder'];

      $product_query = "INSERT INTO `Products`(`UPC`, `Pname`, `Price`, `Sname`, `amount`, `reorderlevel`)
       VALUES ('$p_ID','$p_name','$price','$s_name','$amount','$reorder')";
  
        $result = mysqli_query($conn,$product_query);

      if (!$result)
      echo "records are not inserted";
      else {
        header("Location:./Inventory_view.php");
        die;
      }

    }

?>
