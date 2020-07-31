<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>

<?php 
    $_SESSION['loggedIn']=null;
    header('Location: index.php');
?>

<?php mysqli_close($conn);?>