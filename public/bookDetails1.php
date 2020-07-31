<?php session_start()?>
<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>

<?php
    if (isset($_SESSION['loggedIn'])){
        $email = $_SESSION['email'];
        $user = getUser($email);
        $userIn = true;
    }else{
        $userIn = false;
    }
    $id=mysqli_real_escape_string($conn, $_GET['book_id']);
    $book = getBookDetails($id);
    $relatedBooks=getRelatedBooks($book['category']);
    $qty = 1; 
?>
<div class="container" style="padding-top:2em;">
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <img class="card-img-top" style="height:28em; padding:4px;" src="images/<?php echo $book['book_image']; ?>.jpg" atl="Card image cap">
            </div>
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-6">
            <div style="padding:0px 0px;">
                <h3  style="margin-bottom:0;"><?php echo $book['book_name']; ?></h3>
                <h4 style="margin-top:1.3em;" > <strong> <?php echo $book['price']; ?></strong></h4>
            </div>
            <div class="row" style="margin-top:3em; margin-bottom:1em;">
                
                <div class="col-sm-4">
                    <span> <b>Quantity:&nbsp;</b></span><span><input type="number" style="width:40%; display:inline-block;" id='quantity' name="quantity" min="1" maxlength="2" class="form-control" value="<?php echo $qty;?>"  required/></span>
                    
                </div>
                <div class="col-sm-4">
                   
                    <?php if ($userIn==true): ?>
                        <a  href="addToCart.php?book_id=<?php echo $book['book_id'];?>&user_id=<?php echo $user['user_id'];?>& price=<?php echo $book['price'];?>&quantity=<?php echo $qty;?>"  style="width:100%;  text-transform:uppercase; font-weight:bold; font-size:1.1em;" id="addToCartbtn" name="addToCart" class="btn btn-primary">Add to Cart</a>
                    <?php endif; ?>

                    <?php if ($userIn==false): ?>
                        <a  href="#"  style="width:100%;  text-transform:uppercase; font-weight:bold; font-size:1.1em; cursor:not-allowed;" id="addToCartbtn"  title="You need to login first" name="addToCart" class="btn btn-primary">Add to Cart</a>
                    <?php endif; ?>
                    <br>
                    <!-- <a >Add To cart</a> -->
                </div>
                <div class="col-sm-4">
                    <a href="#"   style="width:100%; text-transform:uppercase; font-weight:bold; font-size:1.1em;" name="buyNow" class="btn btn-success">Buy Now</a>
                </div>
                
            </div>
            <?php if (isset($_SESSION['bookAdded'])){ ?>
                    <div class="alert alert-success " style="margin-top:10px;" role="alert">
                        <strong><?php echo $_SESSION['bookAdded']?></strong> <span><a href="cartPage.php?user_id=<?php echo $user['user_id']?>">View Cart</a><span>
                    </div>
                    <?php $_SESSION['bookAdded']=null;?>
            <?php } ?>
            <!-- <div id="itemAddedToCartMsg" class="alert alert-success" style="display:none;"></div> -->
            <div class="row" style="color:grey; margin-top:3em;">
                
                <div class="col-sm-12">
                    <h4 style="margin:0px;">Delivery Options</h4>
                    <p style="color:black;">Delivery/Service available for</p>
                    <!-- succes message -->
                    <?php if (isset($_SESSION['checkDeliveryMsg'])){ ?>
                    <div class="alert alert-success " style="margin-top:10px;" role="alert">
                        <strong><?php echo $_SESSION['checkDeliveryMsg']?></strong> 
                    </div>
                    <?php $_SESSION['checkDeliveryMsg']=null;?>
                    <?php } ?>

                    <!-- failure message -->
                    <?php if (isset($_SESSION['checkDeliveryMsg2'])){ ?>
                    <div class="alert alert-danger " style="margin-top:10px;" role="alert">
                        <strong><?php echo $_SESSION['checkDeliveryMsg2']?></strong> 
                    </div>
                    <?php $_SESSION['checkDeliveryMsg2']=null;?>
                    <?php } ?>

                    <form action="checkPinCode.php?book_id=<?php echo $book['book_id']; ?> " method="POST">
                        <input type="text" id='pincode' name="checkPinCode" class="form-control" placeholder="Pin Code"  required/>
                        <button type="submit" style="margin-top:1em;" name="submit" class="btn btn-outline-primary">CHECK</button>
                    </form>
                </div>
                <div class="col-sm-2">
                    
                </div>
            </div>

        </div>
       
    </div>

    <div style="margin-top:3em; color:grey;">
        <h4>Book Details</h4>
        <div class="row"  style="text-align:center;" >
            <div class="col-sm-6">
                <h5>Author</h5>
                <hr style="margin:0px 0px;">
                <?php echo $book['book_author']; ?>
            </div>
            <div class="col-sm-6">
                <h5>Language</h5>
                <hr style="margin:0px 0px;">
                <p>English</p>
            </div>
        </div>
        <div style="margin-top:2em;"></div>    
        <h4>Description</h4>
        <div class="row">
            <div class="col-sm-12">
                <?php echo $book['book_description']; ?>
            </div>
        </div>
    </div>


     <!--Latest Products on home page  -->
     <div class="container" style="margin-top:4em; padding:0px 0px; color:grey;">
        <h4><b>Related Books</b></h4>
        <div class="container grid-view-home-items" >      
            <?php foreach($relatedBooks as $relatedBook): ?>
            <a href="bookDetails.php?book_id=<?php echo $relatedBook['book_id']; ?>" style="text-decoration:none;">  
            <div class="card card-css">
                <img class="card-img-top" style="height:18em; padding:6px;" src="images/<?php echo $relatedBook['book_image']; ?>.jpg" atl="Card image cap">
                <div class="card-body" style="padding:10px 5px;">
                    <p class="card-title" style="margin-bottom:0; font-size:1rem;">&nbsp;<?php echo $relatedBook['book_name']; ?></p>
                    <h6 class="card-subtitle mb-2" style="margin-top:5px;" > &nbsp;Rs.<strong> <?php echo $relatedBook['price']; ?></strong></h6>
                    <!-- <p class="card-text">Author:&nbsp; php echo $Limitedbook['book_author']; ?> </p> -->
                </div>
            </div>
            </a> 
        <?php endforeach; ?>
        </div>
    </div>
    
</div>   

<script type="text/javascript">
    // function addToCartChangeLink(){
    //    isLoggedIn = localStorage.getItem("isLoggedIn");
    //    addToCartBtn = document.getElementById('addToCartbtn');
    //    msgDiv = document.getElementById('itemAddedToCartMsg'); 
    //    alert(isLoggedIn);
    //     if(isLoggedIn == false){
    //         addToCartBtn.href= "loginRegister.php";
    //     }else{
    //         // addToCartBtn.href= "#";
    //         msgDiv.style.display='block';
    //         msgDiv.innerHTML = "Book Added to Cart";
    //     }
    // }
</script>
<?php include("../include/footer.php")?>