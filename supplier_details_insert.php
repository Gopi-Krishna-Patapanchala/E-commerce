<?php
//connecting to data base
include 'connect_database.php';

$conn = OpenCon();
if(!$conn)
echo "connection not established";



    // inserting new details for supplier
    if (isset($_POST['add_details']))
    {
      $sname=$_POST['name'];
      $city=$_POST['city'];
      $zip = $_POST['zip'];
      $insert_query = "INSERT INTO `Supplier`(`Sname`, `City`, `Zip`) VALUES ('$sname','$city','$zip')";

      $result = mysqli_query($conn,$insert_query);

      if (!$result)
      echo "records are not inserted";
      else {
        header("Location:./supplier_details.php");
        die;
      }

    }

?>
