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
        <title>Lifestyle Store-Cart</title>
    </head>
    <body>
        <?php require("includes/common.php"); ?>
        <?php include("includes/header.php"); ?>
        <?php
        if (!isset($_SESSION['email'])) 
            {
            header('location: index.php');
            } 
         ?>
        <?php $user_id=$_SESSION['id'];?>
        <div class="row decor_bg row_style">
                <div class="col-md-6 col-md-offset-3 row_style">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                      
        <?php
        $select_query="SELECT * FROM user_items INNER JOIN users ON users.id='$user_id' INNER JOIN items ON items.id=user_items.item_id ";
        $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
        $check=mysqli_num_rows($select_query_result);
        
        if($check==0)
        {
            echo "Add items to the cart first.";
        }
        
        else 
            {
            
        
            $total=0;
            
            
            while($row=mysqli_fetch_array($select_query_result))
            {$total=$total+$row['price'];
                ?><tr>
                                <td><?php echo $row['item_id'];?></td><td><?php echo $row['name'];?><a href='cart-remove.php?id= <?php echo $row['item_id']; ?>> Remove</a></td><td><?php echo $row['price'];?></td><td></td>
                            </tr>
             <?php 
            }
            }
            ?>
            
            <tr>
                                <td></td><td>Total</td><td><?php echo $total;?></td><td><a href='success.php' class='btn btn-primary'>Confirm Order</a></td>
                            </tr>
            </tbody>
                    </table>
                </div>
            </div>  
         <?php include("includes/footer.php"); ?>  
    </body>
</html>}

