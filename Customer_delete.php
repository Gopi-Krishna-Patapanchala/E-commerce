<?php


    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
    echo "connection not established";

    if (!empty($_GET['CustomerID']))
    $CustomerID = $_GET['CustomerID'];
    delete_records($conn,$CustomerID );
    function delete_records($conn,$CustomerID )
    {
      $delete_query = "Delete from Customer where CustomerID='".$CustomerID."'";
      $delete_customer = mysqli_query($conn,$delete_query);
      if(!$delete_customer)
        echo "unable to Delete the Customer information";
      else{
       header("Location:./customer_details.php");
        die;
      }

    }

 ?>
