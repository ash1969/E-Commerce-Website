<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lifestyle Store-Success</title>
    </head>
        <body>
            <?php include("includes/header.php"); ?>
            <?php
require("includes/common.php");
if (!isset($_SESSION['email'])) 
            {
            header('location: index.php');
            } 
$id=$_SESSION['id'];
$select_query="UPDATE user_items SET user_items.status='Confirmed' WHERE user_items.user_id='$id'";
$select_query_result=mysqli_query($con,$select_query)  or die(mysqli_error($con));
?>
            <div class="container-fluid row_style" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center" >Your order is confirmed! Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            </div>
        </div>
            <?php include("includes/footer.php"); ?> 
        </body>
</html>
