<?php
include_once 'dbconfig.php';
$button=$_POST['button'];
$login_type=$_SESSION['login_type'];
try{
    if($button=='take_appointment'){
        $patient_id=$_SESSION['login_id'];
        $doctor_id=$_POST['id'];
        $sql="INSERT INTO appointment(patient_id,doctor_id,status) VALUES('$patient_id','$doctor_id','requested')";
        $result= mysqli_query($con, $sql) or die(mysqli_error($con));
        if($result){
            $data['status'] = "success";
        }
    }elseif($button=='check_appointments' && $login_type=='patient'){
        $patient_id=$_SESSION['login_id'];
        $sql="select * from appointment where patient_id='$patient_id'";
        $result= mysqli_query($con, $sql) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result)){
            $data[$row['doctor_id']] = $row['status'];
        }
    }elseif($button=='cancle_appointment'){
        $patient_id=$_SESSION['login_id'];
        $doctor_id=$_POST['id'];
        $sql="delete from appointment where patient_id='$patient_id' and doctor_id='$doctor_id' and status='requested'";
        $result= mysqli_query($con, $sql) or die(mysqli_error($con));
        if($result){
            $data['status'] = 'success';
        }
    }elseif($button=='check_appointments' && $login_type=='doctor'){
        $doctor_id=$_SESSION['login_id'];
        $sql="select * from appointment where doctor_id='$doctor_id'";
        $result= mysqli_query($con, $sql) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result)){
            $data[$row['patient_id']] = $row['status'];
        }
    }
//        if($button=='approve'){
//            $query="update doctor set status='yes' where id='$id'";
//            $result=mysqli_query($con,$query);
//            $data['status'] = "success";
//            $data['message'] = "Approve Successful. Refreshing...";
//        
//        }elseif ($button=='disapprove') {
//            $query="update doctor set status='no' where id='$id'";
//            $result=mysqli_query($con,$query);
//            $data['status'] = "success";
//            $data['message'] = "Disapprove Successful. Refreshing...";
//        }
    }
    catch(Exception $ex){
        $data['status'] = "error";
        $data['message'] = $es->getMessage();
    }
    header('content-type:application/json');
    echo json_encode($data);
?>
