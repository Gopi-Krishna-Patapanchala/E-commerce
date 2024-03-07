<?php
//connecting to data base
include 'connect_database.php';

$conn = OpenCon();
if(!$conn)
{
echo "connection not established";
die;
}


    // inserting new details for supplier
    if (isset($_POST['add_details']))
    {
      $c_ID=$_POST['CustomerID'];
      $c_Fname=$_POST['Fname'];
      $c_Lname=$_POST['Lname'];
      $address=$_POST['Address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $zip = $_POST['zip'];

      $insert_query = "INSERT INTO `Customer` (`CustomerID`, `Fname`, `Lname`, `Address`, `City`, `State`, `Zip`) VALUES('$c_ID','$c_Fname','$c_Lname','$address','$city','$state','$zip')";
      $result = mysqli_query($conn,$insert_query);

      if (!$result)
      echo "records are not inserted";
      else {
        header("Location:./customer_details.php");
        die;
      }

    }

?>
