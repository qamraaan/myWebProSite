<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>

<?php 
    if(isset($_POST['submit'])){
        $searchStr = mysqli_real_escape_string($conn,$_POST['search']);
        $searchResults = getAllMatchingResults($searchStr);
        $count=count($searchResults);
    }
?>

<div class="container-fluid">
<?php if($count < 1){?>        
        <div class="alert alert-danger" role="alert" style="margin:5px 0px; width: 100%; text-align:center; ">
        <span style="color:red; margin:5px 0px; font-size:1.3em;  ">Sorry no results found</span>
        </div>
<?php }?>


<?php if($count > 0){?>   
    <div class="alert alert-primary" role="alert" style="margin:5px 0px; width: 100%; text-align:center;" >
        <span style="color:blue; margin:5px 0px; font-size:1.5em; " ><b><?php echo $count;?></b>&nbsp;results found </span>
    </div>
<?php }?>
    <div class=" container grid-view-home-items" >      
        <?php foreach($searchResults as $searchResult): ?>
            <a href="bookDetails.php?book_id=<?php echo $searchResult['book_id']; ?>" style="text-decoration:none;">      
            <div class="card card-css">
                <img class="card-img-top" style="height:18em; padding:4px;" src="images/<?php echo $searchResult['book_image']; ?>.jpg" atl="Card image cap">
                <div class="card-body" style="padding:10px 5px;">
                    <h5 class="card-title" style="margin-bottom:0; font-size:1rem;">&nbsp;<?php echo $searchResult['book_name']; ?></h5>
                    <h6 class="card-subtitle mb-2" style="margin-top:5px;" > &nbsp;Rs.<strong> <?php echo $searchResult['price']; ?></strong></h6>
                    <!-- <p class="card-text">Author:&nbsp; php echo $book['book_author']; ?> </p> -->
                </div>
            </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php include("../include/footer.php")?>