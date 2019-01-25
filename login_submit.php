<?php 
require("includes/common.php");
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$select_query="SELECT id,email,password FROM users WHERE email='$email' AND password='$password' ";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row_num=mysqli_num_rows($select_query_result);
if($row_num==0)
{
    header('location: signup.php');
}
else 
{
  $row=mysqli_fetch_array($select_query_result);
  $_SESSION['email']=$row['email'];
  $_SESSION['id']=$row['id'];
  header('location: products.php');
}

