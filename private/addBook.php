<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>
<?php 
    
if(isset($_POST['submit'])){
    // Getting the values from the form (front-end) and assigning them to local variables
    $book_code = mysqli_real_escape_string($conn, $_POST['book_code']);
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $book_author = mysqli_real_escape_string($conn, $_POST['book_author']);
    $book_image_name = mysqli_real_escape_string($conn, $_POST['book_image_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['book_description']);

    // $query = "INSERT INTO posts(title,author,body) VALUES ('$title','$author','$body')"; 
    // Prepare an insert statement
    $query = "INSERT INTO web_prog_books(book_code,book_name,book_author,book_image,price,category,book_description) VALUES (?, ?, ?, ?, ?, ?, ?)";  
         
     if($stmt = mysqli_prepare($conn, $query)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "ssssiss", $book_code, $book_name, $book_author,$book_image_name,$price,$category,$description);
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             // Records created successfully. Redirect to landing page
             $_SESSION['confirmation']='Book Added successfully';
             header('Location: addNewBook.php');
         } else{
             echo "Error occured: ".mysqli_error($conn);
         }

         mysqli_stmt_close($stmt);
     }else{
        echo "Error occured: ".mysqli_error($conn);
    }
      
      mysqli_close($conn);
}
?>
