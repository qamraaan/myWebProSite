<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>

<?php
     //check pincode 
     if(isset($_POST['submit'])){
        $book_id =  mysqli_real_escape_string($conn,$_GET['book_id']); 
        $pincodes = array("192121", "190001" ,"190002","190003", "190004", "190005","190006",  "190007",  "190008" );
        $pincode = mysqli_real_escape_string($conn,$_POST['checkPinCode']); 
        if(in_array($pincode, $pincodes)){
            $_SESSION['checkDeliveryMsg']='Delivery available';
            header('Location: bookDetails.php?book_id='.$book_id);
        }else{
            $_SESSION['checkDeliveryMsg2']='Sorry!! delivery not available';
            header('Location: bookDetails.php?book_id='.$book_id );
        }
    }else{
        echo "Error: ".mysqli_error($conn);
    } 
?>

<?php mysqli_close($conn);?>