<?php
require("includes/common.php");
$item_id=$_GET['id'];
$user_id=$_SESSION['id'];
$select_query="INSERT INTO user_items(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";
$user_registration_submit = mysqli_query($con, $select_query) or die(mysqli_error($con));
header('location: products.php');
?>