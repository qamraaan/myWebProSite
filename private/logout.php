<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>

<?php 
    $_SESSION['adminLoggedIn']=null;
    header('Location: LoginPage.php');
?>

<?php mysqli_close($conn);?>