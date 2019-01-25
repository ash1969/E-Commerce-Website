<?php
require("includes/common.php");
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$contact=mysqli_real_escape_string($con,$_POST['contact']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$select_query="SELECT * FROM users WHERE email='$email' ";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$check=mysqli_num_rows($select_query_result);
if($check>0)
{
    echo "This E-mail Id already exists! Please go back and try again.";
}
else 
{
    $user_registration_query = "insert into users(email,name,contact,password,city,address) values ('$email', '$name', '$contact', '$password', 'city', 'address')";
    $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    $_SESSION['email']=$email;
    $_SESSION['id']=mysqli_insert_id($con);
    header('location: products.php');
}
?>