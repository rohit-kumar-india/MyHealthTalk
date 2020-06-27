<?php
    include_once './dbconfig.php'; 
    if(!isset($_SESSION['login_id']) && !isset($_SESSION['login_type']) ) {
        header("location:index.php");
    }
?>
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
    <body style="margin: 50px 0 50px;">
        <?php
        include 'header.php';
        ?>
        <div class="container">
            <div class="row">
                <div id="messagelisterror" style="display:none">
                    <h4 class="alert alert-danger text-center" id="messageerror"></h4>	
                </div>
                <div id="messagelistsuccess" style="display:none">
                    <h4 class="alert alert-success text-center" id="messagesuccess"></h4>	
                </div>
            </div>
            <div id="profile">
                <div class="row">
                    <h3 class="alert alert-info text-center">Personal Details</h3>
                    <div class="col-sm-offset-3 col-sm-6" align="center">
                        <table class="table">
                            <tr>
                                <th scope="row">Name</th>
                                <td id="name"></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td id="email_id"></td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile No</th>
                                <td id="mobile"></td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td id="gender"></td>
                            </tr>
                            <tr class="doctor">
                                <th scope="row">License Number</th>
                                <td id="license_no"></td>
                            </tr>
                            <tr class="doctor">
                                <th scope="row">Qualification</th>
                                <td id="qualification"></td>
                            </tr>
                            <tr class="doctor">
                                <th scope="row">Medical Expertise</th>
                                <td id="medical_field"></td>
                            </tr>
                            <tr class="doctor">
                                <th scope="row">Clinic Address</th>
                                <td id="clinic_address"></td>
                            </tr>
                        <tr>
                                <th scope="row">Residential Address</th>
                                <td id="residential_address"></td>
                            </tr>
                            <tr>
                                <th scope="row">Date of Birth</th>
                                <td id="dob"></td>
                            </tr>
                        </table>
                        <div class="alert alert-info text-center" id="notapproved" style="display:none">
                            <h4>your account details are under verification. Please wait until we approve your account.</h4>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6" id="dapproved" style="display:none">
                            <a href="accept_appointments.php" class="btn btn-success btn-block">Accept Appointments</a>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6" id="papproved" style="display:none">
                            <a href="appoint_doctor.php" class="btn btn-success btn-block">Appoint Doctor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
        <script>
            $(document).ready(function(){
                $.ajax({
                    type: 'POST',
                    url: "profile_data.php",
                    data: {},
                    success: function (data) {
                        console.log(data);
                        $("#name").html(data['name']);
                        $("#email_id").html(data['email_id']);
                        $("#mobile").html(data['mobile']);
                        $("#gender").html(data['gender']);
                        $("#residential_address").html(data['residential_address']);
                        $("#dob").html(data['dob']);
                        if(data['login_type']=='doctor'){
                            $("#license_no").html(data['license_no']);
                            $("#qualification").html(data['qualification']);
                            $("#medical_field").html(data['medical_field']);
                            $("#clinic_address").html(data['clinic_address']);
                            if(data['status']=='no'){
                                $("#notapproved").show();
                            }else{
                                $("#dapproved").show();
                            }
                        }else{
                            $(".doctor").hide();
                            $("#papproved").show();
                        }
                    }
                });
            });
        </script>
    </body>
</html>

