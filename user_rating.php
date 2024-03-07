<?php
include 'connect_database.php';
include 'Current_customer.php';
$conn = OpenCon();
if(!$conn)
echo "connection not established";

if(isset($_POST['add_user_rating']) && ($_POST['rating']!=''))
{
  $product_ID = $_POST['add_user_rating'];
  $rating = $_POST['rating'];

  //checking produts is already rated by the user or not
  $check_rating = "SELECT * FROM `Rated` where upc='".$product_ID."' and customerID =".$customerID;

  $check_result = mysqli_query($conn,$check_rating);
  if(mysqli_num_rows($check_result))
  {
    echo "i am inside update";

    $update_query = "UPDATE `Rated` SET `Rating`='$rating',`RatingDate`= now()  WHERE upc='".$product_ID."' and customerID =".$customerID;
    $update_result = mysqli_query($conn,$update_query);
    if($update_result)
    {
      header("Location:./Products.php");
      die;
    }
    else {
      echo "unable to update the rating information for the product";
    }
  }
  else {

    $insert_query="INSERT INTO `Rated`(`CustomerID`, `UPC`, `Rating`, `RatingDate`) VALUES ('$customerID','$product_ID','$rating',now())";

    $insert_result = mysqli_query($conn,$insert_query);
    if($result)
    {
      header("Location:./Products.php");
      die;
    }
    else {
      echo "unable to insert the rating information for this product".$result;
    }
  }
}
