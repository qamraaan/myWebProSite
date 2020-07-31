<?php session_start()?>
<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
<?php 
     $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
     $cart_items = getCartItemsByUserId($user_id);
?>

<div class="container">
    <div class="alert alert-primary" role="alert" style="margin:5px 0px; width: 100%; text-align:left; font-weight:bold;" >
        <span style="color:blue; margin:5px 0px; font-size:1.5em; " >My Cart</span>
        <!-- <a type="button" class="btn btn-danger pull-right" style="text-decoration:none; color:white;" >
           Empty Cart
        </a> -->
    </div>
    <?php
        $totalCartItems = count($cart_items);
        if ($totalCartItems == 0):
    ?>
        <h4 style="text-align:center; margin-top:2em;">Your cart is Empty!!</h4>
    <?php endif;?>

    <div class=" grid-view-home-items" > 
    <?php foreach($cart_items as $cart_item): ?>  
       <?php $book = getBookDetails($cart_item['book_id'])?> 
            <div class="card card-css">
                <img class="card-img-top" style="height:17em; padding:6px;" src="images/<?php echo $book['book_image']; ?>.jpg" atl="Card image cap">
                <div class="card-body" style="padding:10px 5px;">
                <p class="card-title" style="margin-bottom:0; font-size:1rem;">&nbsp;<?php echo $book['book_name']; ?></p>
                    <h6 class="card-subtitle mb-2" style="margin-top:5px;" > &nbsp;Rs.<strong> <?php echo $cart_item['price']; ?></strong></h6>
                </div>
                <div>
                    <a type="button" href="removeCartItem.php?cart_id=<?php echo $cart_item['cart_id']?>&user_id= <?php echo $cart_item['user_id']?>" class="btn btn-danger pull-right" style="text-decoration:none; color:white;" >
                        Remove Item
                    </a>
                </div>
            </div>
            </a> 
        <?php endforeach; ?>
    </div>

    <!-- cart bill -->
    <div class="table-responsive" style="margin-top:2em;">        
                <table class='table table-striped'>
                    <thead style="background-color:cyan; font-size:1em;">
                    <tr>
                        <th>Book Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Total</th>
                    </tr>
                    <?php $total = 0;?>
                    </thead>
                    <tbody>
                    <?php foreach($cart_items as $cart_item): ?>
                    <?php 
                        $book = getBookDetails($cart_item['book_id'])
                    ?>  
                    <tr>
                        <td><?php echo $book['book_name']; ?> </td>
                        <td><?php echo $cart_item['price']; ?> </td>
                        <td><?php echo $cart_item['quantity']; ?> </td>
                        <td><?php 
                            $price = $cart_item['price'];
                            $quantity = $cart_item['quantity'];
                            $amount = $price*$quantity;
                            echo $amount;

                            ?> 
                        </td>
                        <td><?php echo $amount; $total = $total + $amount; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong><?php echo $total;?></strong></td>
                    </tr>
                    </tbody>                            
                </table>
    </div>    

    <div class="row" style="margin-top:2em;">
        <div class="col-md-3">
            <a type="button" href="index.php" class="btn btn-primary" style="text-decoration:none; color:white;" >
                Continue Shopping
            </a>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-3">
        <a type="button" href="CheckOutPage.php" class="btn btn-primary pull-right" style="text-decoration:none; color:white;" >
            Proceed to Check Out
        </a>
        </div>
    </div>

</div>

<?php include("../include/footer.php")?>