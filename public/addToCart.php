<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>
<?php 

   $user_id = mysqli_real_escape_string($conn, $_POST['user_id']); 
   $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);
   $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    $query = "INSERT INTO cart(user_id,book_id,price,quantity) VALUES (?, ?, ?, ?)"; 
    if($stmt = mysqli_prepare($conn, $query)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iiii", $user_id, $book_id, $price, $quantity);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records created successfully. Redirect to landing page
            $_SESSION['bookAdded']='Book Added to cart';
            header('Location: bookDetails.php?book_id='.$book_id);
        } else{
            echo "Error occured: ".mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }else{
       echo "Error occured: ".mysqli_error($conn);
    }

     mysqli_close($conn);

?>
