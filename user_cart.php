<?php
include 'connect_database.php';
include 'Current_customer.php';
$conn = OpenCon();
if(!$conn)
echo "connection not established";
if(isset($_POST['add_cart']))
{
  $product_Id = $_POST['add_cart'];
  $Quantity=$_POST['qantity'];

  // check if the product is already in the cart information or not
  $cart_product= "select * from cart where UPC='".$product_Id."' and CustomerID =".$customerID;
  $already_exist = mysqli_query($conn,$cart_product);

  if (!mysqli_num_rows($already_exist))
  {
  $insert_query = 'INSERT INTO `cart`(`CustomerID`, `UPC`, `Quantity`) VALUES ('.$customerID.',"'.$product_Id.'",'.$Quantity.')';
  $result = mysqli_query($conn,$insert_query) or die("connection disconnected");
  if($result)
  {
    header("Location:./Products.php");
    die;
  }
  else {
    echo "unable to insert values into Cart table";
  }
}
else {
  header("Location:./Products.php");
  die;
}
}

 ?>
