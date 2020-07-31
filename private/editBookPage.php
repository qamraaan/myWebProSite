<?php session_start()?>
<?php include("privateHeader.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
<?php
    $id=mysqli_real_escape_string($conn, $_GET['book_id']);
    $book = getBookDetails($id);
 ?>   

<div class="container container-width" >
   <div class="alert alert-primary" role="alert" style="margin:5px 0px; text-align:center; font-weight:bold;">
       <span style="color:blue; margin:5px 0px; font-size:1.5em;  ">Edit Book</span>
   </div>
   <form action="editBook.php" method="POST">
        <!-- row 1 -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bookCode"><strong>Book Code:</strong></label>
                    <input type="text" class="form-control" name="book_code" id="book_code" aria-describedby="bookCodeHelp" 
                    placeholder="Enter book code" 
                    value="<?php echo $book['book_code'];?>"
                    required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bookName"><strong>Book Name:</strong></label>
                    <input type="text" class="form-control" name="book_name"  id="book_name" 
                    placeholder="Ener book name" 
                    value="<?php echo $book['book_name'];?>"
                    required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bookAuthor"><strong>Book Author:</strong></label>
                    <input type="text" class="form-control" name="book_author"  id="book_author" 
                    placeholder="Ener author name" 
                    value="<?php echo $book['book_author'];?>"
                    required>
                </div>
            </div>
        </div>
        <!-- row 2 -->
        <div class="row">
            <div class="col-md-4" >
                <div class="form-group">
                    <label for="bookImageName"><strong>Book Image Name:</strong></label>
                    <input type="text" class="form-control" name="book_image_name"  id="book_image_name" 
                    placeholder="Ener book image name" 
                    value="<?php echo $book['book_image'];?>"
                    required>
                </div>
            </div>
            <div class="col-md-4" >
                <div class="form-group">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="number" class="form-control" name="price"  id="price" 
                    placeholder="Ener book price" 
                    value="<?php echo $book['price'];?>"
                    required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category"><strong>Category:</strong></label>
                    <input type="text" class="form-control" name="category"  id="category" 
                    placeholder="Ener book category" 
                    value="<?php echo $book['category'];?>"
                    required>
                </div>
            </div>
        </div>

        <!-- row 3 -->
        <div class="row">
            <div class="col-md-12" >
                <div class="form-group">
                    <label for="bookDescription"><strong>Book Description:</strong></label>
                    <textarea class="form-control" name="book_description" id="book_description" rows="5" cols="20" 
                    placeholder="Enter book description." required>
                    <?php echo $book['book_description'];?>
                    </textarea>
                </div>
            </div>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $book['book_id']?>">
        <!-- row 4 -->
        <div class="row">
            <div class="col-md-6" >
                <button type="submit"  style="width:100%;" name="submit" class="btn btn-success adjust-button">Update</button>
            </div>
            <div class="col-md-6">
                <a href="index.php" style="width:100%;" class="btn btn-danger adjust-button">Cancel</a>
            </div>
        </div>

   </form>
   </div>


   <?php include("../include/footer.php")?>