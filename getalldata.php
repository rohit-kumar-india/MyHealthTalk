<?php
include_once 'dbconfig.php';
if(isset($_POST['submit'])){
    $data['status']='';
    $data['message'] ='';
    $table = $_POST['table'];
    try{
        if(!empty($con)){
            $data = array();
            $query="SELECT * From $table";
            $result=mysqli_query($con,$query);
            $total_rows=mysqli_num_rows($result);
            $cnt = 0;
            while($row=mysqli_fetch_array($result)){
                $data[$cnt][$table] = $row;
                $cnt++;
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
