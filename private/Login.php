<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>
<?php 

if(isset($_POST['submit'])){
    // Getting the values from the form (front-end) and assigning them to local variables
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = 'admin';
   
     //Create query
     $query = "SELECT * FROM users WHERE email = '$email' AND role='$role' ";
     //execute query
     $result = mysqli_query($conn, $query);
     $count  = mysqli_num_rows($result);
     //if count is greater than 0 that means there is an entry in the user table with the same email and password else there is none.
	if($count==0) {
      $_SESSION['notLoggedIn']='No Admin exists with given credentails.';
        header('Location: LoginPage.php');
	} else {
        if ($row = mysqli_fetch_assoc($result)){
          // dehash the password
          $hashedPwdCheck = password_verify($password, $row['password']);
          if($hashedPwdCheck == false){
            $_SESSION['pwdNotMatch']='Incorrect Password.';
            header('Location: LoginPage.php');
          }elseif ($hashedPwdCheck == true){
            $_SESSION['adminLoggedIn']='Admin successfully logged in.';
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            header('Location: index.php');
          }
        }
	}

}
?>

<?php mysqli_close($conn);?>