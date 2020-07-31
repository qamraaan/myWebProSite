<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php require_once("dbConnection.php")?>
<?php require_once("functions.php")?>
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
    <link rel="stylesheet" href="css/stylePublic.css" >
    <style>
      #tagline{
        float:right; font-size:1.2em; margin-top:0.9em; text-transform:uppercase; 
      }
      .logoName{
         font-family: cursive;
      }
      .accntStyle{
        margin-right:0.5em; 
        border-radius:50%;
        display: -webkit-inline-box;
      }
      .searchStyle{
          margin-right:0.5em; 
          margin:auto; 
          width:50%;
        } 
     
      @media only screen and (max-width:500px) and (min-width:100px) {
        #tagline{
          font-size:0.6em; 
          margin-top:0.1em; 
          margin-bottom:0.5em;
          float:left;
        }
        
        .logoName{
          text-decoration:none; 
          font-family: cursive; 
          font-size: 1.3em; 
          padding:0px;
        }
        .searchStyle{
          margin-right:0.5em;
          width: auto; 
        }
      }
    </style>
</head>
<body >

<?php 
  if(isset($_SESSION['loggedIn'])){
      $email = $_SESSION['email'];
      $user = getUser($email);
      $cartItems = getCartItemsByUserId($user['user_id']);
      $cartItemsCount = count($cartItems);
      $userIn = true;
  }else{
      $userIn = false;
  }

  
?>
<?php if (!isset($_SESSION['loggedIn'])){ 
         echo '<script type="text/javascript">localStorage.setItem("isLoggedIn",false);</script>';    
}?>
<nav style="background-color:#efeded54; height:80px; padding:1.5em;">
  <div class="row">
    <div class="col-md-6" >
     <h2 class="logoName" > <a href="index.php" style="text-decoration:none;"  > <span style="color:#0fc709; ">Web</span><span style="color:black;">Pro.com</span> </a></h2>
    </div>
    <div class="col-md-6" >
    <!-- <br> -->
      <p  id="tagline">One of the Best Web Programming Book Stores</p>
    </div> 
  </div>
</nav> 

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" href="index.php">WebPro </a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link nav-items" href="index.php" style="color:white;  padding-right:1.4em;" > &nbsp;&nbsp;&nbsp;HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle nav-items" href="#" id="navbarDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">&nbsp;&nbsp;&nbsp;FRONT END BOOKS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../public/listBooks.php?cat=html">HTML</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../public/listBooks.php?cat=css">CSS</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../public/listBooks.php?cat=js">Javascript</a>
        </div>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle nav-items" href="#" id="navbarDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">&nbsp;&nbsp;&nbsp;BACK END BOOKS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../public/listBooks.php?cat=php">PHP</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../public/listBooks.php?cat=sql">MySQL</a>
            <div class="dropdown-divider" ></div>
            <a class="dropdown-item" href="#">Python</a>
        </div>
      </li>
    </ul>

    <!-- Search -->
    <form action="../public/search.php" method="POST" class="form-inline my-2 my-lg-0 searchStyle" >
      <input class="form-control mr-sm-2" type="search" name="search" style="width:75%;" required placeholder="search by book name, author, publisher or price" title="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;" title="search" type="submit" name="submit">
      <i class="fa fa-search" style="font-size:1.2em;" aria-hidden="true"></i>
      </button>
    </form>

    <!-- account -->
    <ul class="navbar-nav accntStyle" >
    <li class="nav-item" id="cartTitle">
    <?php if ($userIn==true): ?>
      <a class="nav-link nav-items"  href="cartPage.php?user_id=<?php echo $user['user_id'];?>" role="button" style="color:white; padding">
            <span style="color:white; padding:0px 5px; font-size:1.7em;" title="Cart"> 
              <span style="font-size: 0.5em; border-radius: 50%; position: absolute;margin-left: 7px;" class="badge badge-success">
                <?php echo $cartItemsCount;?>
              </span> <i class="fa fa-cart-arrow-down" aria-hidden="true" ></i>
            </span>
      </a>                   
    <?php endif; ?>
    <?php if ($userIn==false): ?>
      <a class="nav-link nav-items" onclick="loginFirstMsg()" href="#" role="button" style="color:white;" title="Login First">
            <span style="color:white; padding:0px 5px; font-size:1.7em;" title="Cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
      </a>                   
    <?php endif; ?>
      
    </li>
    <li class="nav-item dropdown"  id="dots" title="Manage your Account">
        <a class="nav-link dropdown-toggle nav-items"  href="#" id="navbarDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
            <span style="color:white; padding:0px 5px; font-size:1.7em;"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span>
        </a>
       
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
        <?php if ($userIn==false){ 
          echo '<a class="dropdown-item"  href="../public/loginRegister.php" title="Login">Login</a>';
          echo '<div class="dropdown-divider"></div>';
          echo '<a class="dropdown-item"  href="../public/loginRegister.php?register=true" title="Register">Register</a>';
        }?> 
            
        <?php if ($userIn==true){ 
          echo '<a class="dropdown-item" id="account"  href="../public/accountPage.php?user_id=' . $user['user_id'] . '" title="Account">Account</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item"  href="logout.php" title="Logout" >Logout</a>';
        }?>  
        </div>
      </li>
    </ul>
  
    
  </div>
</nav>
<div id="loginMsg" class="alert alert-danger" style="display:none;" role="alert">
<!-- <button type="button" class="close" id="btn" style="position:absolute; display:none;"  data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true" >&times;</span>
</button> -->
</div>


<script type="text/javascript">
    function loginFirstMsg(){
      loginBtn = document.getElementById('loginMsg');
      loginBtn.style.display = 'block';
      loginBtn.innerHTML = '<b>You need to Login first to access your Cart.  </b>';
      
      // creating an anchor tag for link to login page and appending it to the above msg (loginMsg).
      linkToLogin=document.createElement('a');
      linkText = document.createTextNode("Click here to login"); 
      linkToLogin.appendChild(linkText);  
      linkToLogin.href = "loginRegister.php";
      loginBtn.appendChild(linkToLogin);                  
    
    }

    
</script>