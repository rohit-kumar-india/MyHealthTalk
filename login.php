<?php
include_once 'dbconfig.php';
if(isset($_POST['submit'])){
    $password =  $_POST['password'];
    $email = $_POST['emailid'];
    $table = $_POST['table'];
    $data['message']="";
    $data['status']="";
    try{
        if(!empty($con)){
            $query="SELECT * From $table where email_id='$email'";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0){
                $row=mysqli_fetch_array($result);
                if($row['password']==$password){
                    $_SESSION['login_id'] = $row['id'];
                    $_SESSION['login_type'] =  $table;
                    $data['status'] = "success";
                    $data['message'] = "Login Successful. Redirecting...";
                }else{
                    $data['status'] = "error";
                    $data['message'] = "Wrong Password, Please enter correct password";
                }
            }else{
                $data['status'] = "error";
                $data['message'] = "Email id not Registered, Sign Up Now";
            }
        }
    }
    catch(Exception $ex){
        $data['status'] = "error";
        $data['message'] = $es->getMessage();
    }
    header('content-type:application/json');
    echo json_encode($data);
}
?>


