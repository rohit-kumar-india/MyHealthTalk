<?php
include_once 'dbconfig.php';
if(isset($_POST['submit'])){
    $data['message']="";
    $data['status']="";
    $password =  $_POST['password'];
    $email = $_POST['emailid'];
    $table = $_POST['table'];
    $dob =  $_POST['dob'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $name = $_POST['name'];
    $resaddress =  $_POST['resaddress'];
    try {
        if(!empty($con)) {
            if($table=="doctor") {
                $qualification =  $_POST['qualification'];
                $license =  $_POST['license'];
                $clinicaddress =  $_POST['clinicaddress'];
                $expertise =  $_POST['expertise'];
                $query="INSERT INTO $table(password,name,mobile,email_id,gender,residential_address,clinic_address,license_no,qualification,medical_field,dob) VALUES ('$password','$name','$mobile','$email','$gender','$resaddress','$clinicaddress','$license','$qualification','$expertise','$dob')";
            }
            if($table=="patient"){
                $query="INSERT INTO $table (password,name,mobile,email_id,gender,residential_address,dob) VALUES ('$password','$name','$mobile','$email','$gender','$resaddress','$dob')";
            }
            $result=mysqli_query($con,$query);
            if($result){
                $data['status'] = "success";
                $data['message'] = "Register successful. Redirecting...";
            }else{
                $data['status'] = "error";
                $data['message'] = mysqli_error($con);
                
            }
         }
    }
    catch(Exception $ex) {
        $data['status'] = "error";
        $data['message'] = $es->getMessage();
    }	
    header('content-type:application/json');
    echo json_encode($data);
}
?>