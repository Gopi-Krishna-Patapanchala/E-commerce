<?php


    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
    echo "connection not established";

    if (!empty($_GET['UPC']))
      $P_ID = $_GET['UPC'];

    delete_records($conn,$P_ID );
    function delete_records($conn,$P_ID )
    {
      $delete_query = "Delete from Products where UPC='".$P_ID."'";
      $delete_customer = mysqli_query($conn,$delete_query);
      if(!$delete_customer)
        echo "unable to Delete the Customer information";
      else{
       header("Location:./Inventory_view.php");
        die;
      }

    }

 ?>
