<?php
session_start();
if (!isset($_SESSION['login_id'])){
    header('location: index.php');
} else {
    session_destroy();
    if($_SESSION['login_type']=='admin'){
        header('location: admin.php');
    }else{
        header('location: index.php');
    }
}
?>