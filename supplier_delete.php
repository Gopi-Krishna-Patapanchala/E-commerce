<?php


    //connecting to data base
    include 'connect_database.php';

    $conn = OpenCon();
    if(!$conn)
    echo "connection not established";

    if (!empty($_GET['sname']))
    $name = $_GET['sname'];
    delete_records($conn,$name);
    function delete_records($conn,$sname)
    {
      $delete_query = "Delete from Supplier where Sname='".$sname."'";
      $delete_supplier = mysqli_query($conn,$delete_query);
      if(!$delete_supplier)
        echo "unable to Delete the supplier information";
      else{
        header("Location:./supplier_details.php");
        die;
      }

    }

 ?>
