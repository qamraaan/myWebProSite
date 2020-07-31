<?php session_start()?>
<?php include("privateHeader.php")?>
<?php require_once("../include/dbConnection.php")?>

<?php if (isset($_SESSION['confirmation'])){ ?>
<div class="alert alert-success alert-dismissible fade show adjust-alert" role="alert">
  <strong>Success!!</strong> <?php echo $_SESSION['confirmation']?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php 
$_SESSION['confirmation']=null;
?>
<?php } ?>


<div class="container container-width" >
   <div class="alert alert-primary" role="alert" style="margin:5px 0px; text-align:center; font-weight:bold;">
       <span style="color:blue; margin:5px 0px; font-size:1.5em;  ">Add New Book</span>
   </div>
   <form action="addBook.php" method="POST">
        <!-- row 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bookCode"><strong>Book Code:</strong></label>
                    <input type="text" class="form-control" name="book_code" id="book_code" aria-describedby="bookCodeHelp" placeholder="Enter book code" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bookName"><strong>Book Name:</strong></label>
                    <input type="text" class="form-control" name="book_name"  id="book_name" placeholder="Ener book name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bookAuthor"><strong>Book Author:</strong></label>
                    <input type="text" class="form-control" name="book_author"  id="book_author" placeholder="Ener author name" required>
                </div>
            </div>
        </div>
        <!-- row 2 -->
        <div class="row">
            <div class="col-md-4" >
                <div class="form-group">
                    <label for="bookImageName"><strong>Book Image Name:</strong></label>
                    <input type="text" class="form-control" name="book_image_name"  id="book_image_name" placeholder="Ener book image name" required>
                </div>
            </div>
            <div class="col-md-4" >
                <div class="form-group">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="number" class="form-control" name="price"  id="price" placeholder="Ener book price" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category"><strong>Category:</strong></label>
                    <input type="text" class="form-control" name="category"  id="category" placeholder="Ener book category" required>
                </div>
            </div>
        </div>

        <!-- row 3 -->
        <div class="row">
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="bookDescription"><strong>Book Description:</strong></label>
                    <textarea class="form-control" name="book_description" id="book_description" rows="5" cols="20" placeholder="Enter book description." required></textarea>
                </div>
            </div>
        </div>

        <!-- row 4 -->
        <div class="row">
            <div class="col-md-6" >
                <button type="submit"  style="width:100%;" name="submit" class="btn btn-primary adjust-button">Submit</button>
            </div>
            <div class="col-md-6">
                <a href="index.php" style="width:100%;" class="btn btn-danger adjust-button">Cancel</a>
            </div>
        </div>

   </form>
   </div>


   <?php include("../include/footer.php")?>