<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db= 'health_counselor';
    $con = mysqli_connect($host, $user, $pass);
    if(!empty($con)) {
        mysqli_select_db($con, $db);
    }

