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
        ?><br><br><br>
        <div class="container">
            <div class="row">
                <div id="messagelisterror" style="display:none">
                    <h4 class="alert alert-danger text-center" id="messageerror"></h4>	
                </div>
                <div id="messagelistsuccess" style="display:none">
                    <h4 class="alert alert-success text-center" id="messagesuccess"></h4>	
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-4 col-md-2 col-sm-offset-3 col-sm-3">
                    <button type="submit" class="btn btn-block btn-primary" id="patientlistbtn">
                        <span class="glyphicon glyphicon-user"></span> Patient List
                    </button>
                </div>
                <div class="col-md-2 col-sm-3">
                    <button type="submit" class="btn btn-block btn-primary" id="doctorlistbtn">
                        <span class="glyphicon glyphicon-user"></span> Doctor List
                    </button>
                </div>
            </div><br>
            <div id="doctorlist" style="display:none">
                <div class="row">
                    <h3 class="alert alert-info text-center">Approve Doctors</h3>
                    <div class="col-sm-12" align="center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile No</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">License Number</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Medical Expertise</th>
                                    <th scope="col">Clinic Address</th>
                                    <th scope="col">Date of Birth</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>	
                </div>
            </div>
            <div id="patientlist" style="display:none">
                <div class="row">
                    <h3 class="alert alert-info text-center">Patients List</h3>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile No</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Residential Address</th>
                                    <th scope="col">Date of Birth</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>	
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
        <script>
            $(document).ready(function (){
                $("#patientlistbtn").click(function (){
                    $("#doctorlist").hide('slow'); 
                    $("#patientlist").show('slow');
                    get_patient_list();
                });
                
                $("#doctorlistbtn").click(function (){
                    $("#patientlist").hide('slow');
                    $("#doctorlist").show('slow');
                    get_doctor_list();
                });
            });
            
            function get_patient_list(){
                $.ajax({
                    type: 'POST',
                    url: "getalldata.php",
                    data: { 'table':'patient','submit' : 'submit' },
                    success: function (data) {
                        var html='';
                        $.each(data,function(key,value){
                            html += '<tr>';
                            html += '<td>'+ value.patient['name'] +'</td>';
                            html += '<td>'+ value.patient['email_id'] +'</td>';
                            html += '<td>'+ value.patient['mobile'] +'</td>';
                            html += '<td>'+ value.patient['gender'] +'</td>';
                            html += '<td>'+ value.patient['residential_address'] +'</td>';
                            html += '<td>'+ value.patient['dob'] +'</td>';
                            html += '</tr>';
                        });
                    $('table tbody').html(html);
                    }
                });
            }
            
            function get_doctor_list(){
                $.ajax({
                    type: 'POST',
                    url: "getalldata.php",
                    data: { 'table':'doctor','submit':'submit' },
                    success: function (data) {
                        var html='';
                        $.each(data,function(key,value){
                            html += '<tr>';
                            html += '<td>'+ value.doctor['name'] +'</td>';
                            html += '<td>'+ value.doctor['email_id'] +'</td>';
                            html += '<td>'+ value.doctor['mobile'] +'</td>';
                            html += '<td>'+ value.doctor['gender'] +'</td>';
                            html += '<td>'+ value.doctor['license_no'] +'</td>';
                            html += '<td>'+ value.doctor['qualification'] +'</td>';
                            html += '<td>'+ value.doctor['medical_field'] +'</td>';
                            html += '<td>'+ value.doctor['clinic_address'] +'</td>';
                            html += '<td>'+ value.doctor['dob'] +'</td>';
                            if(value.doctor['status']=='no'){
                                html += '<td><button type="submit" class="btn btn-block btn-success" onclick="approve(\'' + value.doctor['id'] +'\',\'' + value.doctor['name'] + '\')">approve</button></td>';
                            }else
                                html += '<td><button type="submit" class="btn btn-block btn-danger" onclick="disapprove(\'' + value.doctor['id'] +'\',\'' + value.doctor['name'] + '\')">disapprove</button></td>';
                            html += '</tr>';
                        });
                    $('table tbody').html(html);
                    }
                });
            }
            
            function approve(id,name){
                var r = confirm("Do you want to approve " + name);
                if(r == true){
                    $.ajax({
                        type: 'POST',
                        url: "approvedoctor.php",
                        data: { 'button':'approve', 'id' : id,'submit' : 'submit' },
                        success: function (data) {
                            if(data['status']=="success"){
                                $("#messagelisterror").hide();
                                $("#messagelistsuccess").show(); 
                                $("#messagesuccess").html(data['message']);
                                window.setTimeout(function () {
                                    get_doctor_list();
                                    $("#messagelistsuccess").hide();
                                    }, 3000)
                            }  
                            if(data['status']=="error"){
                                $("#messagelistsuccess").hide();
                                $("#messagelisterror").show(); 
                                $("#messageerror").html(data['message']);
                            }
                        }
                    });
                }else {
                    $("#messagelistsuccess").hide();
                    $("#messagelisterror").show(); 
                    $("#messageerror").html("Approve Canclled..");
                }
                
            }
            
            function disapprove(id,name){
                var r = confirm("Do you want to disapprove " + name);
                if(r == true){
                    $.ajax({
                    type: 'POST',
                    url: "approvedoctor.php",
                    data: { 'button':'disapprove', 'id' : id,'submit' : 'submit' },
                    success: function (data) {
                        if(data['status']=="success"){
                            $("#messagelisterror").hide();
                            $("#messagelistsuccess").show(); 
                            $("#messagesuccess").html(data['message']);
                            
                            window.setTimeout(function () {
                                get_doctor_list();
                                $("#messagelistsuccess").hide();
                                }, 3000)
                        }  
                        if(data['status']=="error"){
                            $("#messagelistsuccess").hide();
                            $("#messagelisterror").show(); 
                            $("#messageerror").html(data['message']);
                        }
                    }
                });
                }else {
                    $("#messagelistsuccess").hide();
                    $("#messagelisterror").show(); 
                    $("#messageerror").html("Disapprove Canclled..");
                }
            }
        </script>
    </body>
</html>