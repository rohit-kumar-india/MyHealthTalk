<?php
include_once 'dbconfig.php';
if(isset($_POST['submit'])){
    $data['status']='';
    $data['message'] ='';
    $button = $_POST['button'];
    $id = $_POST['id'];
    try{
        if($button=='approve'){
            $query="update doctor set status='yes' where id='$id'";
            $result=mysqli_query($con,$query);
            $data['status'] = "success";
            $data['message'] = "Approve Successful. Refreshing...";
        
        }elseif ($button=='disapprove') {
            $query="update doctor set status='no' where id='$id'";
            $result=mysqli_query($con,$query);
            $data['status'] = "success";
            $data['message'] = "Disapprove Successful. Refreshing...";
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
