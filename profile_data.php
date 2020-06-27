<?php
include_once './dbconfig.php'; 
    $login_id = "";
    $login_type = "";
    if( isset($_SESSION['login_id']) && isset($_SESSION['login_type']) ) {
        $login_id =  $_SESSION['login_id'];
        $login_type =  $_SESSION['login_type'];
        $sql = "SELECT * FROM " . $login_type." WHERE id = ".$login_id;
        $result =  mysqli_query($con, $sql);
        $data =  mysqli_fetch_array($result);
        $data['login_type']=$login_type;
       // echo '<pre>';print_r($row);
        header('content-type:application/json');
        echo json_encode($data);
    } else {
        header("location:index.php");
    }
?>
