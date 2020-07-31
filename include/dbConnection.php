<?php
    //creating constants
    define('host','localhost');
    define('username','root');
    define('password','');
    define('dbname','books');

    //creating connection
    $conn = mysqli_connect(host,username,password,dbname);

    if(mysqli_connect_errno()){
        echo "There was an error while creating the connection".mysqli_connect_error();
    }
    // else{
    //     echo "your connection to the database was successful";
    // }
      
?>