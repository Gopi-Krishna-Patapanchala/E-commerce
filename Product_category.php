<?php

//connecting to data base
include 'connect_database.php';

$conn = OpenCon();
if(!$conn)
echo "connection not established";

$product_Category = "SELECT  `Category`,count(*) as count FROM `Product_category` group by Category";

$bar_result = mysqli_query($conn,$product_Category);
$data = array();
foreach ($bar_result as $row) {
  $data[] = $row;
}

CloseCon($conn);
print json_encode($data)
 ?>
