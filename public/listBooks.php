<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
<?php 
    $category=$_GET['cat'];  
    
    if ($category == 'js'){
        $books=getJSBooks();
        $page_title="JavaScript (JS) Books"; 
    }
    elseif ($category == 'css'){
        $books=getCSSBooks();
        $page_title="Cascading Stylesheet (CSS) Books";
    }
    elseif($category == 'php'){
        $books=getPHPBooks();
        $page_title="Pre-Processor HyperText (PHP) Books";
    }
    elseif($category == 'html'){
        $books=getHTMLBooks();
        $page_title="HyperText Markup Language (HTML) Books";
    }
    elseif($category == 'sql'){
        $books=getMySQLBooks();
        $page_title="MySQL Books";
    }
?>
<?php if(!$books){?>        
        <div class="alert alert-danger" role="alert" style="margin:5px 0px; width: 80%; text-align:center; ">
        <span style="color:red; margin:5px 0px; font-size:1em;  ">Sorry no books found</span>
        </div>
<?php }?>

<div class="container-fluid">
    <div class="alert alert-primary" role="alert" style="margin:5px 0px; width: 100%; text-align:center; font-weight:bold;" >
        <span style="color:blue; margin:5px 0px; font-size:1.5em; " ><?php echo $page_title;?></span>
    </div>
    <div class=" container grid-view-home-items" >      
        <?php foreach($books as $book): ?>
            <a href="bookDetails.php?book_id=<?php echo $book['book_id']; ?>" style="text-decoration:none;">      
            <div class="card card-css">
                <img class="card-img-top" style="height:18em; padding:4px;" src="images/<?php echo $book['book_image']; ?>.jpg" atl="Card image cap">
                <div class="card-body" style="padding:10px 5px;">
                    <h5 class="card-title" style="margin-bottom:0; font-size:1rem;">&nbsp;<?php echo $book['book_name']; ?></h5>
                    <h6 class="card-subtitle mb-2" style="margin-top:5px;" > &nbsp;Rs.<strong> <?php echo $book['price']; ?></strong></h6>
                    <!-- <p class="card-text">Author:&nbsp; php echo $book['book_author']; ?> </p> -->
                </div>
            </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>


<?php include("../include/footer.php")?>