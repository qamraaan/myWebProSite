<?php session_start()?>
<?php include("styles.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
    
<div class="container forms-container" style="margin:auto; ">
   <div class="row">
        
        <div class="col-sm-12" >
            <button class="loginRegisterHeading active" style="cursor:auto;" >Login</button>
       </div>
   </div>     
     <!--Login form  -->
     <form action="Login.php" method="POST" id="loginFormId">
        <!-- row 1 -->
        <div class="row" style="margin-top:2em;">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="email" class="form-control" name="email"  id="emailL" placeholder="Enter E-mail" required>
                </div>
                <div class="form-group">
                    <label for="password"><strong>Password:</strong></label>
                    <input type="text" class="form-control" name="password"  id="passwordL" placeholder="Enter Password" required>
                    <!-- <span class="eye" onclick="showPassword()" title="Show/Hide Password"><i class="fa fa-eye" aria-hidden="true"></i></span> -->
                </div>
            </div>   
        </div>

        <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4" >
                <button type="submit"  style="width:100%;" name="submit" class="btn btn-primary">LOGIN</button>
            </div>
            <div class="col-md-4"></div>
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
</div>    