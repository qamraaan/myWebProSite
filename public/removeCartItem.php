<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>

<?php
    $cart_id=mysqli_real_escape_string($conn, $_GET['cart_id']);
    $user_id=mysqli_real_escape_string($conn, trim($_GET['user_id']) );
    // //Create query
    $query = "DELETE FROM cart WHERE cart_id='$cart_id'";

    if (mysqli_query($conn, $query)){
        $_SESSION['ItemRemoved']='Book removed from cart successfully';
        header('Location: cartPage.php?user_id='.$user_id);
    }else{
        echo "Error occured: ".mysqli_error($conn);
    }
?>
<?php mysqli_close($conn);?>