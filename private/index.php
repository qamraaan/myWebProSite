<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
<?php

if(isset($_SESSION['adminLoggedIn'])){
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $user = getUser($email, $password);
    $userIn = true;
}else{
    $userIn = false;
}

?>
 <?php if ($userIn == false){
    header('Location: LoginPage.php');
}?>

<?php if ($userIn == true):
include("privateHeader.php")?>
<div class="container-fluid " >
    <?php
        $books=getAllBooks(); 
    ?>

    <?php if(!$books){?>        
        <div class="alert alert-danger" role="alert" style="margin:5px 0px; width: 80%; text-align:center; ">
        <span style="color:red; margin:5px 0px; font-size:1em;  ">Sorry no books found</span>
        </div>
    <?php }?>

    <?php if (isset($_SESSION['confirmation'])){ ?>
    <div class="alert alert-success alert-dismissible fade show adjust-alert" style="margin-top:10px;" role="alert">
        <strong>Success!!</strong> <?php echo $_SESSION['confirmation']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $_SESSION['confirmation']=null;?>
    <?php } ?>

    <!-- Greeting admin -->
    <?php if($userIn){?>        
        <div class="alert alert-success alert-dismissible fade show adjust-alert" role="alert" style="margin:5px 0px; width: 100%; text-align:center; ">
        <span style="color:green; margin:5px 0px; font-size:1.3em;  ">Welcome! Admin <b>Mr.&nbsp;<?php echo $user['name'];?></b> </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php }?>    
        
    <!--All in one books on home page  -->
    <div class="container-fluid book-listing-container">
        <h4 class="alert alert-primary table_heading"><b>List of all the books</b></h4>
        <div class="table-responsive table-height" >        
                <table style="border-radius:10px !important; " class='table table-striped'>
                    <thead style="background-color:cyan; font-size:1em;">
                    <tr>
                        <th>Book Code</th>
                        <th>Book Name</th>
                        <th>Price</th>
                        <th style="padding-left:2em;" >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($books as $book): ?> 
                    <tr>
                        <td><?php echo $book['book_code']; ?> </td>
                        <td><?php echo $book['book_name']; ?> </td>
                        <td><?php echo $book['price']; ?> </td>
                        <td>
                            <a href="editBookPage.php?book_id=<?php echo $book['book_id']; ?>" class="btn btn-primary" title='Edit Book' >Edit</a> &nbsp;&nbsp;
                            <a onclick="confirmation()" id="deteleBtnId" href="#" class="btn btn-danger"  title='Delete Book' >Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>                            
                </table> 
        </div>
    </div>  
</div>
<?php endif;?>
<script>
// function confirmation(){
//     var result = confirm("Do you really want to detele this book?");
//     //ok  return true...
//     if(result){
//         // Delete logic goes here
//     //    deleteBtn = document.getElementById('deteleBtnId').href="deleteBook.php?book_id=?php echo $book['book_id']; ?>";
//     }

// }
</script>
<?php include("../include/footer.php")?>