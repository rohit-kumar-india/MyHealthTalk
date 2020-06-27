<?php
require 'dbconfig.php';
if (isset($_SESSION['login_id'])) {
header('location: profile.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MyHealthTalk</title>
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
    </head>
    <body style="margin: 50px 0 50px;">
        <?php
        include 'header.php';
        ?>
        <div class="container">
            <h2 class="alert alert-info text-center">Welcome to MyHealthTalk</h2>  
            <div class="row">
                <div id="messagelisterror" style="display:none">
                    <h4 class="alert alert-danger text-center" id="messageerror"></h4>	
                </div>
                <div id="messagelistsuccess" style="display:none">
                    <h4 class="alert alert-success text-center" id="messagesuccess"></h4>	
                </div>
                <div class="col-md-offset-4 col-md-2 col-xs-6">
                    <button type="submit" class="btn btn-block btn-primary" id="patientbtn">
                        <span class="glyphicon glyphicon-log-in"></span> Patient
                    </button>
                </div>
                <div class="col-md-2 col-xs-6">
                    <button type="submit" class="btn btn-block btn-primary" id="doctorbtn">
                        <span class="glyphicon glyphicon-log-in"></span> Doctor
                    </button>
                </div>
            </div><br>
            <div id="patientlogin" style="display:none">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                        <h4 class="alert alert-info text-center">Patient Login</h4>	
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Email ID</label>
                            <input type="text" class="form-control" id="emailpatient" placeholder="Email id">
                            <div id="pemail_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Password</label>
                            <input type="Password" class="form-control" id="passwordpatient" placeholder="Password">
                            <div id="ppass_error"></div>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success btn-block" id="patientloginbtn"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                        <h3 class="text-danger text-center">or</h3><i>Don't have an Account?</i>
                        <a href="signup.php" class="btn btn-success btn-block">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="doctorlogin" style="display:none">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                        <h4 class="alert alert-info text-center">Doctor Login</h4>	
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Email ID</label>
                            <input type="text" class="form-control" id="emaildoctor" placeholder="Email id">
                            <div id="demail_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Password</label>
                            <input type="Password" class="form-control" id="passworddoctor" placeholder="Password">
                            <div id="dpass_error"></div>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success btn-block" id="doctorloginbtn"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                        <h3 class="text-danger text-center">or</h3><i>Don't have an Account?</i>
                        <a href="signup.php" class="btn btn-success btn-block">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
        <script>
            $(document).ready(function (){
                $("#patientbtn").click(function (){
                    $("#doctorlogin").hide('slow'); 
                    $("#patientlogin").show('slow'); 
                });
                $("#doctorbtn").click(function (){
                    $("#patientlogin").hide('slow');
                    $("#doctorlogin").show('slow');
                });
                
                var pemail,ppassword,demail,dpassword;
                var pemail_err=true,ppassword_err=true,demail_err=true,dpassword_err=true;

                $('#emailpatient').keyup(function(){
                    pemail_check();
                });
                $('#passwordpatient').keyup(function(){
                    ppassword_check();
                });

                $('#emaildoctor').keyup(function(){
                    demail_check();
                });
                $('#passworddoctor').keyup(function(){
                    dpassword_check();
                });
              
                $("#patientloginbtn").click(function (){
                    pemail_err = true;
                    ppassword_err = true;
                    pemail_check();
                    ppassword_check();
                    if((pemail_err == true ) && (ppassword_err == true)){
                        $.ajax({
                            type: 'POST',
                            url: "login.php",
                            data: { 'emailid' : pemail ,'password': ppassword,'table':'patient','submit' : 'submit' },
                            success: function (data) {
                                if(data['status']=="success"){
                                    $("#messagelisterror").hide();
                                    $("#messagelistsuccess").show(); 
                                    $("#messagesuccess").html(data['message']);
                                    window.setTimeout(function () {
                                    window.location.href="profile.php";
                                    }, 3000)
                                }else{
                                    $("#messagelistsuccess").hide();
                                    $("#messagelisterror").show(); 
                                    $("#messageerror").html(data['message']);
                                }
                            }
                        });
                    }else{
                        $("#messagelistsuccess").hide();
                        $("#messagelisterror").show(); 
                        $("#messageerror").html("Please fill all the details correctly.");
                    }
                });
                $("#doctorloginbtn").click(function (){
                    demail_err = true;
                    dpassword_err = true;
                    demail_check();
                    dpassword_check();
                    if((demail_err == true ) && (dpassword_err == true)){
                        $.ajax({
                            type: 'POST',
                            url: "login.php",
                            data: {'emailid' : demail ,'password': dpassword,'table':'doctor','submit' : 'submit' },
                            success: function (data) {
                                console.log(data);
                                if(data['status']=="success"){
                                    $("#messagelisterror").hide();
                                    $("#messagelistsuccess").show(); 
                                    $("#messagesuccess").html(data['message']);
                                    window.setTimeout(function () {
                                    window.location.href="profile.php";
                                    }, 3000)
                                }else{
                                    $("#messagelistsuccess").hide();
                                    $("#messagelisterror").show(); 
                                    $("#messageerror").html(data['message']);
                                }
                            }
                        });
                    }else{
                        $("#messagelistsuccess").hide();
                        $("#messagelisterror").show(); 
                        $("#messageerror").html("Please fill all the details correctly.");
                    }
                });
              
                function pemail_check(){
                    pemail = $('#emailpatient').val();
                    if(pemail.length == ''){
                        $('#pemail_error').show();
                        $('#pemail_error').html("**Please Fill the Email");
                        $('#pemail_error').focus();
                        $('#pemail_error').css("color","red");
                        pemail_err = false;
                    }else{
                        $('#pemail_error').hide();
                    }
                }
                function ppassword_check(){
                    ppassword = $('#passwordpatient').val();
                    if(ppassword.length == ''){
                        $('#ppass_error').show();
                        $('#ppass_error').html("**Please Fill the password");
                        $('#ppass_error').focus();
                        $('#ppass_error').css("color","red");
                        ppassword_err = false;
                    }else if((ppassword.length < 6 ) || (ppassword.length > 12 ) ){
                        $('#ppass_error').show();
                        $('#ppass_error').html("**password length must be between 6 and 12");
                        $('#ppass_error').focus();
                        $('#ppass_error').css("color","red");
                        ppassword_err = false;
                    }else{
                        $('#ppass_error').hide();
                    }
                }

                function demail_check(){
                    demail = $('#emaildoctor').val();
                    if(demail.length == ''){
                        $('#demail_error').show();
                        $('#demail_error').html("**Please Fill the Email");
                        $('#demail_error').focus();
                        $('#demail_error').css("color","red");
                        demail_err = false;
                    }else{
                        $('#demail_error').hide();
                    }
                }
                function dpassword_check(){
                  dpassword = $('#passworddoctor').val();
                  if(dpassword.length == ''){
                      $('#dpass_error').show();
                      $('#dpass_error').html("**Please Fill the password");
                      $('#dpass_error').focus();
                      $('#dpass_error').css("color","red");
                      dpassword_err = false;
                  }else if((dpassword.length < 6 ) || (dpassword.length > 12 ) ){
                      $('#dpass_error').show();
                      $('#dpass_error').html("**password length must be between 6 and 12");
                      $('#dpass_error').focus();
                      $('#dpass_error').css("color","red");
                      dpassword_err = false;
                  }else{
                      $('#dpass_error').hide();
                  }
              }
            });
        </script>
    </body>
</html>
