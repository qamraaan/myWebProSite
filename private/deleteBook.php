<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>

<?php
    $id=mysqli_real_escape_string($conn, $_GET['book_id']);

    // //Create query
    $query = "DELETE FROM web_prog_books WHERE book_id='$id'";

    if (mysqli_query($conn, $query)){
        $_SESSION['confirmation']='Book deleted successfully';
        header('Location: index.php');
    }else{
        echo "Error occured: ".mysqli_error($conn);
    }
?>
<?php mysqli_close($conn);?>