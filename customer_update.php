<?php


    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
      echo "connection not established";

    if (isset($_POST['update_details']))
    {
      $customer_ID = $_POST['update_details'];

      $f_name=$_POST['fname'];
      $l_name=$_POST['lname'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $zip=$_POST['zip'];

      $update_customer_query = "UPDATE `Customer` SET
                                    `Fname`='$f_name',`Lname`='$l_name',`Address`='$address',
                                    `City`='$city',`State`='$state',`Zip`='$zip' WHERE `CustomerID`='$customer_ID' ";


      $result = mysqli_query($conn,$update_customer_query);
      if($result)
      {
        header("Location:./customer_details.php");
        die;
      }
      else {
        echo "unable to update the Customer information";
      }

    }

 ?>
