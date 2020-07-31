<?php session_start()?>
<?php require_once("../include/dbConnection.php")?>
<?php 
    
if(isset($_POST['submit'])){
    // Getting the values from the form (front-end) and assigning them to local variables
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $role = 'customer';
    // Prepare an insert statement
    $query = "INSERT INTO users(name,email,password,contact, role) VALUES (?, ?, ?, ?, ?)";  
    // hashing the password
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);     
    
    if($stmt = mysqli_prepare($conn, $query)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashedPwd, $contact, $role);
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             // Records created successfully. Redirect to landing page
             $_SESSION['registered']='Successfully registered';
             header('Location: loginRegister.php');
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
