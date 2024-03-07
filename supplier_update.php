<?php


    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
      echo "connection not established";

    if (isset($_POST['update_details']))
    {

      $s_name=$_POST['update_details'];
      $city=$_POST['city'];
      $zip=$_POST['zip'];

      $update_supplier_query = "UPDATE `Supplier` SET  `City`='$city',`Zip`='$zip' WHERE `Sname`='$s_name'";
      $result = mysqli_query($conn,$update_supplier_query);
      if($result)
      {
        header("Location:./supplier_details.php");
        die;
      }
      else {
        echo "unable to update the supplier information";
      }

    }

 ?>
