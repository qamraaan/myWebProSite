<?php session_start()?>
<?php include("styles.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>

<div class="container forms-container" style="margin:auto; " >
    <div class="row">
       <div class="col-sm-12">
            <button class="loginRegisterHeading active" id="RgFormTab" style="cursor:auto;" >Register</button>
       </div>
   </div> 
    <form action="Register.php" method="POST" id="regFormId">
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
        <div class="col-md-4"></div>
            <div class="col-md-4" >
                <button type="submit"  style="width:100%;" name="submit" class="btn btn-primary">REGISTER</button>
            </div>
            <div class="col-md-4"></div>
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
</script>