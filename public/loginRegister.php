<?php session_start()?>
<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>


<div class="container forms-container" >
   <div class="row">
        
        <div class="col-sm-6" >
            <button class="loginRegisterHeading active" id="LgFormTab" onclick="showLoginForm()">Login</button>
       </div>
       <div class="col-sm-6">
            <button class="loginRegisterHeading" id="RgFormTab" onclick="showRegistraionForm()">Register</button>
       </div>
   </div> 

        <form action="Register.php" method="POST" style="display:none;" id="regFormId">
        <!-- row 1 -->
        <div class="row" style="margin-top:2em;">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="bookCodeHelp" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" class="form-control" name="email"  id="emailR" placeholder="Enter E-mail" required>
                </div>
                <div class="form-group">
                    <label for="password"><strong>Password:</strong></label>
                    <input type="text" class="form-control" name="password"  id="passwordR" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword"><strong>Confirm Password:</strong></label>
                    <input type="text" onblur="matchPassword()" class="form-control" name="confirmPassword"  id="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div id="passwordIncorrectAlert"></div>
                <div class="form-group">
                    <label for="contact"><strong>Contact:</strong></label>
                    <input type="text" class="form-control" name="contact"  id="contact" maxlength="12" placeholder="Contact Number" required>
                </div>
            </div>
        </div>
        <!-- row 4 -->
        <div class="row">
            <div class="col-md-6" >
                <button type="submit"  style="width:100%;" name="submit" class="btn btn-primary">REGISTER</button>
            </div>
            <div class="col-md-6"></div>
        </div>
   </form>
   <?php if (isset($_SESSION['registered'])){ ?>
            <div class="alert alert-success " style="margin-top:10px;" role="alert">
                <strong><?php echo $_SESSION['registered']?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php $_SESSION['registered']=null;?>
    <?php } ?> 
    
        <!--Login form  -->
    <form action="Login.php" method="POST" id="loginFormId">
        <!-- row 1 -->
        <div class="row" style="margin-top:2em;">
            <div class="col-sm-12">
            <p>If you don't have an account, click on Register tab.</p>
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" class="form-control" name="email"  id="emailL" placeholder="Enter E-mail" required>
                </div>
                <div class="form-group">
                    <label for="password"><strong>Password:</strong></label>
                    <input type="password" class="form-control" name="password"  id="passwordL" placeholder="Enter Password" required>
                    <span class="eye" onclick="showPassword()" title="Show/Hide Password"><i class="fa fa-eye" aria-hidden="true"></i></span>
                </div>
            </div>   
        </div>

        <div class="row">
            <div class="col-md-6" >
                <button type="submit"  style="width:100%;" name="submit" class="btn btn-primary">LOGIN</button>
            </div>
            <div class="col-md-6"></div>
        </div>
    </form>
    
    <!-- messge not logged in  -->
    <?php if (isset($_SESSION['notLoggedIn'])){ ?>
        <div class="alert alert-danger " style="margin-top:10px;" role="alert">
            <strong><?php echo $_SESSION['notLoggedIn']?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php $_SESSION['notLoggedIn']=null;?>
    <?php } ?>

    <!-- password incorrect -->
    <?php if (isset($_SESSION['pwdNotMatch'])){ ?>
        <div class="alert alert-danger " style="margin-top:10px;" role="alert">
            <strong><?php echo $_SESSION['pwdNotMatch']?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php $_SESSION['pwdNotMatch']=null;?>
    <?php } ?>    

    <!-- message logged in -->
    <?php if (isset($_SESSION['loggedIn'])) { 
         echo '<script type="text/javascript">localStorage.setItem("isLoggedIn",true);</script>';    
    ?>
        <div class="alert alert-success " style="margin-top:10px;" role="alert">
            <strong><?php echo $_SESSION['loggedIn']?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php ?>
    <?php } ?>
</div>

<script type="text/javascript">

    function matchPassword(){
        password = document.getElementById('passwordR').value;
        conFirmpassword = document.getElementById('confirmPassword').value;
        incorrectPassword = document.getElementById('passwordIncorrectAlert');
        if(password != conFirmpassword ){
            incorrectPassword.style.color = 'red';
            incorrectPassword.innerHTML = "Password does not match";
        }else{
            incorrectPassword.innerHTML = "";
        }

    }
    function showPassword(){
        var inputPassword=document.getElementById("passwordL");
        if(inputPassword.type == 'password'){
            inputPassword.type='text';
        }else{
            inputPassword.type='password';
        }
    }


    loginFormId = document.getElementById('loginFormId');   
    regFormId = document.getElementById('regFormId');
    RgFormTab = document.getElementById('RgFormTab');
    LgFormTab = document.getElementById('LgFormTab');

    function showRegistraionForm(){
        regFormId.style.display = 'block';
        loginFormId.style.display = 'none';
        RgFormTab.classList.add("active");
        LgFormTab.classList.remove("active");
    }
    function showLoginForm(){
        loginFormId.style.display = 'block';
        regFormId.style.display = 'none';
        LgFormTab.classList.add("active");
        RgFormTab.classList.remove("active");
    }

</script>
<?php include("../include/footer.php")?>