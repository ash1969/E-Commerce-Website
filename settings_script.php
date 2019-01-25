<?php
 require("includes/common.php");
if (!isset($_SESSION['email'])) 
            {
            header('location: index.php');
            } 
$oldpassword=mysqli_real_escape_string($con,$_POST['oldpassword']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password1=mysqli_real_escape_string($con,$_POST['password1']);
$check=strcmp($password,$password1);
if($check==0)
{
    $email=$_SESSION['email'];
    $select_query="SELECT id,email,password FROM users WHERE email='$email' AND password='$oldpassword' ";
    $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
    $row_num=mysqli_num_rows($select_query_result);
    if($row_num==0)
    {
    header('location: settings.php');
    }
    else 
    {
    $select_query="UPDATE users SET password='$password' WHERE email='$email' AND password='$oldpassword' ";
    $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
    header('location: products.php');
    }
    
}
 else 
{
    echo "The two new passwords entered do not match! Please go back and try again.";    
}
?>