<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPro</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" > -->
    <link rel="stylesheet" href="../css/allStyles.css" >
    <link rel="stylesheet" href="stylePublic.css" >

</head>
<body >


<?php if (!isset($_SESSION['loggedIn'])){ 
         echo '<script type="text/javascript">localStorage.setItem("isLoggedIn",false);</script>';    
}?>


     
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">WebPro </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link nav-items" href="index.php" style="color:white;  padding-right:1.4em;" > &nbsp;&nbsp;&nbsp;Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link nav-items" href="addNewBook.php" style="color:white;  padding-right:1.4em;" > &nbsp;&nbsp;&nbsp;Add New Book </a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0" style="margin-right:0.5em;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;"  type="submit">Search</button>
    </form>
    <!-- account -->
    <ul class="navbar-nav" style="margin-right:0.5em; border-radius:50%;">
    <li class="nav-item dropdown"  id="dots" title="Manage your Account">
        <a class="nav-link dropdown-toggle nav-items"  href="#" id="navbarDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
            <span style="color:white; padding:0px 5px; font-size:1.3em;"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span>
        </a>
       
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
        <!-- php if ($userIn==false){ 
          echo '<a class="dropdown-item"  href="LoginPage.php" title="Login">Login</a>';
        }?>  -->
            
        <?php if ($userIn==true){ 
          echo '<a class="dropdown-item"  href="RegisterPage.php" title="Register" >Register Admins</a>';
          echo '<div class="dropdown-divider"></div>';
          echo '<a class="dropdown-item"  href="logout.php" title="Logout" >Logout</a>';
        }?>  
        </div>
      </li>
    </ul>
  </div>
</nav>
<div id="loginMsg" class="alert alert-danger" style="display:none;">
</div>




<script type="text/javascript">

    
</script>