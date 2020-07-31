<?php include("../include/header.php")?>
<?php require_once("../include/dbConnection.php")?>
<?php require_once("../include/functions.php")?>
<?php
  $userId = mysqli_real_escape_string($conn, $_GET['user_id']);
  $user = getUserById($userId);
?>

<div class="container" style="margin-top:2em;">
    
    <div class="card" style="padding:1.3em 1.6em; background-color:rgba(233, 233, 233, 0.897);">
        <p style="font-size:1.2em;">Welcome <strong><?php echo $user['name'];?></strong> to your WebPro Account Dashboard.</p>
        <div class="row">
        <div class="col-md-4">
           <div style=" padding:1.1em 1.3em; background-color:rgba(226, 213, 213, 0.59);">
                <span class="dashboard-titles">Account Information</span> <span class="pull-right " style="font-size:1.2em;" ><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></span>
                <hr style="margin:0.3em 0;">
                <p><?php echo $user['name'];?></p>
                <p><?php echo $user['email'];?></p>
                <p><?php echo $user['contact'];?></p>
           </div> 
        </div>
        <div class="col-md-4">
            <div style=" padding:1.1em 1.3em; background-color:rgba(226, 213, 213, 0.59);">
                <span class="dashboard-titles">Address</span>  <span class="pull-right edit-span"  ><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></span>
                <hr style="margin:0.3em 0; ">
                <p>No address saved yet!</p>
           </div> 
        </div>
        <div class="col-md-4">
            <div style=" padding:1.1em 1.3em; background-color:rgba(226, 213, 213, 0.59);">
                <span class="dashboard-titles">Order History</span> <span class="pull-right"  style="font-size:1.2em; cursor:pointer;"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></span>
                <hr style="margin:0.3em 0;">
                <p>Seems you have not purchased anything yet!</p>
           </div> 
        </div>
    </div>
    </div>
</div>
<?php include("../include/footer.php")?>