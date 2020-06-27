<?php
    require 'dbconfig.php';
    $_SESSION['login_type']='admin';
    if (isset($_SESSION['login_id'])) {
        header('location: approval.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
        <title>Health Counselor</title>
    </head>
    <body>
        <?php
        include 'header.php';
        ?><br><br>
        <div class="container">
            <h2 class="alert alert-info text-center">Welcome to E-Health Consultation</h2>			
            <div class="row">
                <div id="messagelisterror" style="display:none">
                    <h4 class="alert alert-danger text-center" id="messageerror"></h4>	
                </div>
                <div id="messagelistsuccess" style="display:none">
                    <h4 class="alert alert-success text-center" id="messagesuccess"></h4>	
                </div>
            </div>
            <div id="adminqlogin">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                    <h4 class="alert alert-info text-center">Admin Login</h4>	
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Email ID</label>
                            <input type="text" class="form-control" id="emailadmin" placeholder="Email id" required>
                            <div id="email_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Password</label>
                            <input type="Password" class="form-control" id="passwordadmin" placeholder="Password" required>
                            <div id="password_error"></div>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success btn-block" id="adminloginbtn"><span class="glyphicon glyphicon-log-in"></span> Login</button>
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
                
                var email,password;
                var email_err=true,password_err=true;

                $('#emailadmin').keyup(function(){
                    email_check();
                });
                $('#passwordadmin').keyup(function(){
                    password_check();
                });
             
                $("#adminloginbtn").click(function () {
                    email_err=true;
                    password_err=true;
                    email_check();
                    password_check();
                    if((email_err == true ) && (password_err == true)){
                        $.ajax({
                            type: 'POST',
                            url: "adminlogin.php",
                            data: {'emailid' : email ,'password':password ,'submit':'submit','table':'admin'},
                            success: function (data){
                                if(data['status']=="success"){
                                    $("#messagelisterror").hide();
                                    $("#messagelistsuccess").show(); 
                                    $("#messagesuccess").html(data['message']);
                                    window.setTimeout(function () {
                                        window.location.href="approval.php";
                                      }, 3000)
                                }  
                                if(data['status']=="error"){
                                    $("#messagelistsuccess").hide();
                                    $("#messagelisterror").show(); 
                                    $("#messageerror").html(data['message']);
                                }
                            }
                        });
                    }else{
                        $("#messagelisterror").show(); 
                        $("#messageerror").html("Please fill all the details correctly.");
                    }
                });
                
                function email_check(){
                    email = $('#emailadmin').val();
                    if(email.length == ''){
                        $('#email_error').show();
                        $('#email_error').html("**Please Fill Email");
                        $('#email_error').focus();
                        $('#email_error').css("color","red");
                        email_err = false;
                    }else{
                        $('#email_error').hide();
                    }
                }
                function password_check(){
                    password = $('#passwordadmin').val();
                    if(password.length == ''){
                        $('#password_error').show();
                        $('#password_error').html("**Please Fill the password");
                        $('#password_error').focus();
                        $('#password_error').css("color","red");
                        password_err = false;
                    }else if((password.length < 6 ) || (password.length > 12 ) ){
                        $('#password_error').show();
                        $('#password_error').html("**password length must be between 6 and 12");
                        $('#password_error').focus();
                        $('#password_error').css("color","red");
                        password_err = false;
                    }else{
                        $('#password_error').hide();
                    }
                }
             
            });
        </script>
    </body>
</html>