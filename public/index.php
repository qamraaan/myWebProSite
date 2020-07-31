<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>

<?php require_once("../include/functions.php")?>
<style>
    .caros_inner{
        height: 21em;
    }
    @media only screen and (max-width:500px) and (min-width:100px) {
        .caros_inner{
            height: 10em;
        }   
    }
</style>

<div class="container-fluid " >
    <!-- <div class="alert alert-primary" role="alert" style="margin:5px 0px; width: 80%; text-align:center; font-weight:bold;" >
        <span style="color:blue; margin:5px 0px; font-size:1.5em; " >Books</span>
    </div> -->
    <!-- when the database is empty i,e there are no post records in the table -->
    <?php
        $books=getAllBooks();
        $jsbooks=getJSBooks();
        $cssbooks=getCSSBooks();
        $phpbooks=getphpBooks();
        $AllInOnebooks=getAllInOneBooks();
        $Limitedbooks=getLimitedBooks();   
        //arrays    
        $images = ['images/html_image.jpg','images/css_image.jpg','images/php_image.jpg','images/javascript_image.jpg','images/mysql_image.jpg'];
        $BannerImage= ['images/banner_image_01','images/banner_image_02','images/banner_image_03','images/banner_image_04','images/banner_image_05'];
        $Category_title = ['HTML','CSS','PHP','Javascript','MySQL'];
        $Cat= ['html','css','php','js','sql'];
        $size = sizeof($images);
        
    ?>

    <?php if(!$books){?>        
        <div class="alert alert-danger" role="alert" style="margin:5px 0px; width: 80%; text-align:center; ">
        <span style="color:red; margin:5px 0px; font-size:1em;  ">Sorry no books found</span>
        </div>
    <?php }?>

    <!-- banner courosel -->
    <div id="carouselExampleIndicators" class="carousel slide container-fluid" data-ride="carousel" class="" style=" margin-top:7px; padding:6px 3px;" >
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner caros_inner" >
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/banner_image_04.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/banner_image_01.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/banner_image_03.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/banner_image_02.jpg" alt="Fourth slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
            <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
            <span class="sr-only" >Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>   

    <!-- banner -->
    <!-- <div class="container-fluid" style="border:1px solid grey; margin-top:10px; padding:10px 5px;">
        <img class="card-img-top" id="topBanner" style="height:20em;" src="images/banner_image_04.jpg"  atl="Card image cap">
    </div>
     -->



    <!--Categories card  -->
    <div class="card card-categories">
        <h5 class="card-title" style="margin-bottom:0; padding:12px 1px; font-size:2em; text-align:center;">Categories</h5>
        <div class="card-category-items">
           
           <?php for ($i=0; $i<$size; $i++){?>
            <div class="categories-display-box">  
                <a href="listBooks.php?cat=<?php echo $Cat[$i];?> " style="text-decoration:none;">  
                    <img class="categories-display-box-image" src="<?php echo $images[$i]?>" height="100" width="100" >
                    <p class="categories-display-box_title"><?php echo $Category_title[$i]?></p>
                </a>
            </div>
            <?php }?>
        </div>
    </div>


    <!--All in one books on home page  -->
    <div class="container-fluid" style="border:1px solid grey; margin-top:10px; padding:20px 10px;">
        <h4><b>Top Sellings</b></h4>
        <div class="container-fluid grid-view-home-items" >      
            <?php foreach($AllInOnebooks as $AllInOnebook): ?>
            <a href="bookDetails.php?book_id=<?php echo $AllInOnebook['book_id']; ?>" style="text-decoration:none;">     
            <div class="card card-css">
                <img class="card-img-top" style="height:18em; padding:6px;" src="images/<?php echo $AllInOnebook['book_image']; ?>.jpg" atl="Card image cap">
                <div class="card-body" style="padding:10px 5px;">
                    <p class="card-title" style="margin-bottom:0; font-size:1rem;">&nbsp;<?php echo $AllInOnebook['book_name']; ?></p>
                    <h6 class="card-subtitle mb-2" style="margin-top:5px;" > &nbsp;Rs.<strong> <?php echo $AllInOnebook['price']; ?></strong></h6>
                    <!-- <p class="card-text">Author:&nbsp; php echo $AllInOnebook['book_author']; ?> </p> -->
                </div>
            </div>
            </a> 
            <?php endforeach; ?>
        </div>
    </div>  


 <!-- banner 2-->
     <div style="margin:15px -15px;">           
        <img style="height:20em; width:100%;" src="images/banner_image_03.jpg" atl="Card image cap">
    </div>            

    <!--Latest Products on home page  -->
    <div class="container-fluid" style="border:1px solid grey; margin-top:10px; padding:20px 10px;">
        <h4><b>Latest Products</b></h4>
        <div class="container-fluid grid-view-home-items" >      
            <?php foreach($Limitedbooks as $Limitedbook): ?>
            <a href="bookDetails.php?book_id=<?php echo $Limitedbook['book_id']; ?>" style="text-decoration:none;">  
            <div class="card card-css">
                <img class="card-img-top" style="height:18em; padding:6px;" src="images/<?php echo $Limitedbook['book_image']; ?>.jpg" atl="Card image cap">
                <div class="card-body" style="padding:10px 5px;">
                    <p class="card-title" style="margin-bottom:0; font-size:1rem;">&nbsp;<?php echo $Limitedbook['book_name']; ?></p>
                    <h6 class="card-subtitle mb-2" style="margin-top:5px;" > &nbsp;Rs.<strong> <?php echo $Limitedbook['price']; ?></strong></h6>
                    <!-- <p class="card-text">Author:&nbsp; php echo $Limitedbook['book_author']; ?> </p> -->
                </div>
            </div>
            </a> 
        <?php endforeach; ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    // changes the banner image after every 4.5 seconds.
    //  myImage = document.getElementById("topBanner");
    //  BannerImageArray = ["images/banner_image_01.jpg","images/banner_image_02.jpg","images/banner_image_03.jpg","images/banner_image_04.jpg"];
    //  index=0;

    // function changeImage(){
    //     myImage.setAttribute("src",BannerImageArray[index]);
    //     index++;
    //     if(index >= BannerImageArray.length){
    //         index=0;
    //     }
    // }
    // setInterval(changeImage,4500);
</script>
<?php include("../include/footer.php")?>