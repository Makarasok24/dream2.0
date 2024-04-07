<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    // $database = "deam_db";
  $database = "db_dream_1";
    //   $database = "dream_database2";

    $con = mysqli_connect($server, $username, $password, $database);
    if (mysqli_connect_errno()) {  
        die("". mysqli_connect_error());
    }
?>