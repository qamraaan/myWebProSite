<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>
<?php
//  the update_id will not be set when the user clicks on the 'edit post' button 
//  it will be set when the user clicks on the 'update' button of the Edit post Page  
 if(isset($_POST['update_id'])){
    // Getting the values from the form (front-end) and assigning them to local variables
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $book_code = mysqli_real_escape_string($conn, $_POST['book_code']);
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $book_author = mysqli_real_escape_string($conn, $_POST['book_author']);
    $book_image_name = mysqli_real_escape_string($conn, $_POST['book_image_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, trim($_POST['book_description']));
   

    $query = "UPDATE web_prog_books SET book_code='$book_code', book_name='$book_name', book_author='$book_author', book_image='$book_image_name', price='$price', category='$category', book_description='$description'  WHERE book_id = {$update_id} "; 
    
    if (mysqli_query($conn, $query)){
      $_SESSION['confirmation']='Book Edited successfully';
        header('Location: index.php');
    }else{
        echo "Error occured: ".mysqli_error($conn);
    }
}
?>