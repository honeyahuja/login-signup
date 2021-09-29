<?php
   
    
    $con = mysqli_connect("localhost","craft","Craft@2017","test");
        if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>