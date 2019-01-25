<?php
require("includes/common.php");
$item_id=$_GET['item_id'];
$user_id=$_SESSION['id'];
$select_query="DELETE FROM user_items WHERE user_id='$user_id' AND item_id='$item_id'";
$user_registration_submit = mysqli_query($con, $select_query) or die(mysqli_error($con));
header('location: cart.php');
?>