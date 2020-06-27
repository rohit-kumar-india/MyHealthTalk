<?php include_once './dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <title>MyHealthTalk</title>
    </head>
    <body>
        <?php
        include 'header.php';
        ?><br><br>
        <div class="container">
            <h2 class="alert alert-info text-center">Doctors Available</h2>
            <div class="row text-center" id="doctordetails">
                    
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
        <script>
            $(document).ready(function(){
                
                check_appointment();
                appoint_doctor();
                
                
                
                
            });
            var appointment;
            function check_appointment(){
                $.ajax({
                    type: 'POST',
                    url: "appointment.php",
                    data: { 'button':'check_appointments' },
                    success: function (data) {
                        appointment=data;
                    }
                });
            }
            function appoint_doctor(){
                $.ajax({
                    type: 'POST',
                    url: "getalldata.php",
                    data: { 'table':'doctor','submit':'submit' },
                    success: function (data) {
                        var html='';
                        $.each(data,function(key,value){
                            if(value.doctor['status']=='yes'){
                                html += '<div class=" col-md-4 col-sm-6">';
                                html += '<div class="thumbnail">';
                                html += '<img src="#" alt="'+ value.doctor['name'] +'" >';
                                html += '<h3>NAME : '+ value.doctor['name'] +'</h3>';
                                html += '<h4>QUALIFICATION : '+ value.doctor['qualification'] +'</h4>';
                                html += '<h4>MEDICAL FIELD : '+ value.doctor['medical_field'] +'</h4>';
                                html += '<h4>CLINIC ADDRESS : '+ value.doctor['clinic_address'] +'</h4>';
                                if(appointment[value.doctor['id']]=='requested'){
                                    html += '<div class="row">';
                                    html += '<div class="col-sm-8">';
                                    html += '<button class="btn btn-primary btn-block" disabled>Appointment Requested</button>';
                                    html += '</div>';
                                    html += '<div class="col-sm-4">';
                                    html += '<button class="btn btn-danger btn-block" onclick="cancle_appointment(\''+ value.doctor['id'] +'\',\''+ value.doctor['name'] +'\')">Cancle</button>';
                                    html += '</div>';
                                    html += '</div>';
                                }else if(appointment[value.doctor['id']]=='confirmed'){
                                    html += '<div class="row">';
                                    html += '<div class="col-sm-8">';
                                    html += '<button class="btn btn-primary btn-block" disabled>Appointment Accepted</button>';
                                    html += '</div>';
                                    html += '<div class="col-sm-4">';
                                    html += '<button class="btn btn-danger btn-block">Chat</button>';
                                    html += '</div>';
                                    html += '</div>';
                                }else{
                                    html += '<button class=" btn btn-success btn-block" onclick="take_appointment(\''+ value.doctor['id'] +'\',\''+ value.doctor['name'] +'\')">Take Appointment</button>';
                                }
                                html += '</div>';
                                html += '</div>';
                            }
                        });
                    $("#doctordetails").html(html);
                    }
                });
            }
            function cancle_appointment(doctor_id,name){
                var r = confirm("Do you want to cancle appointment from " + name);
                if(r == true){
                    $.ajax({
                        type: 'POST',
                        url: "appointment.php",
                        data: { 'button':'cancle_appointment', 'id' : doctor_id,'submit' : 'submit' },
                        success: function (data) {
                            console.log(data);
                            if(data['status']=="success"){
                                console.log(data);
                                check_appointment();
                                appoint_doctor();
//                                    $("#messagesuccess").html(data['message']);
//                                    window.setTimeout(function () {
//                                        get_doctor_list();
//                                        $("#messagelistsuccess").hide();
//                                        }, 3000)
                            }  
//                                if(data['status']=="error"){
//                                    $("#messagelistsuccess").hide();
//                                    $("#messagelisterror").show(); 
//                                    $("#messageerror").html(data['message']);
//                                }
                        }
                    });
                }
            }
                
            function take_appointment(doctor_id,name){
                    var r = confirm("Do you want to take appointment from " + name);
                    if(r == true){
                        $.ajax({
                            type: 'POST',
                            url: "appointment.php",
                            data: { 'button':'take_appointment', 'id' : doctor_id,'submit' : 'submit' },
                            success: function (data) {
                                console.log(data);
                                if(data['status']=="success"){
                                    console.log(data);
                                    check_appointment();
                                    appoint_doctor();
//                                    $("#messagesuccess").html(data['message']);
//                                    window.setTimeout(function () {
//                                        get_doctor_list();
//                                        $("#messagelistsuccess").hide();
//                                        }, 3000)
                                }  
//                                if(data['status']=="error"){
//                                    $("#messagelistsuccess").hide();
//                                    $("#messagelisterror").show(); 
//                                    $("#messageerror").html(data['message']);
//                                }
                            }
                        });
                    }
                }
        </script>
    </body>
</html>

