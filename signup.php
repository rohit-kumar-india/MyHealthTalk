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
                <div class="col-md-12">
                    <div class="col-md-offset-3 col-md-3 col-sm-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-primary btn-block" id="patientbtn"><span class="glyphicon glyphicon-log-in"></span> Patient Registration</button>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <button type="submit" class="btn btn-primary btn-block" id="doctorbtn"><span class="glyphicon glyphicon-log-in"></span> Doctor Registration</button>
                    </div>
                </div>
            </div><br>
            <div id="patientregister" style="display:none">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                        <h4 class="alert alert-info text-center">Patient Registration</h4>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Email ID</label>
                            <input type="email" class="form-control" id="emailpatient" placeholder="Email id" required>
                            <div id="pemail_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Name</label>
                            <input type="text" class="form-control" id="namepatient" placeholder="Name" required>
                            <div id="pname_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Password</label>
                            <input type="Password" class="form-control" id="passwordpatient" placeholder="Password" required>
                            <div id="ppass_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Mobile Number</label>
                            <input type="number" class="form-control" id="mobilepatient" placeholder="Mobile No" required>
                            <div id="pmobile_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Address</label>
                            <input type="text" class="form-control" id="addresspatient" placeholder="Address" required>
                            <div id="paddress_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> DOB</label>
                            <input type="date" class="form-control" id="dobpatient" required>
                            <div id="pdob_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Gender</label>
                            <select id="genderpatient" class="form-control">
                                <option value="" selected disabled>--Select Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            <div id="pgender_error"></div>
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-success btn-block" id="patientregisterbtn"><span class="glyphicon glyphicon-log-in"></span> Register</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="doctorregister" style="display:none">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                        <h4 class="alert alert-info text-center">Doctor Registration</h4>	
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Email ID</label>
                            <input type="email" class="form-control" id="emaildoctor" placeholder="Email id" required>
                            <div id="demail_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Name</label>
                            <input type="text" class="form-control" id="namedoctor" placeholder="Name" required>
                            <div id="dname_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Password</label>
                            <input type="Password" class="form-control" id="passworddoctor" placeholder="Password" required>
                            <div id="dpass_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Mobile Number</label>
                            <input type="number" class="form-control" id="mobiledoctor" placeholder="Mobile No" required>
                            <div id="dmobile_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span>Residential Address</label>
                            <input type="text" class="form-control" id="resaddressdoctor" placeholder="Address" required>
                            <div id="dresaddress_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Clinic Address</label>
                            <input type="text" class="form-control" id="clinicaddressdoctor" placeholder="Clinic Address" required>
                            <div id="dclinicaddress_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> DOB</label>
                            <input type="date" class="form-control" id="dobdoctor" required>
                            <div id="ddob_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> License Number</label>
                            <input type="text" class="form-control" id="licensenodoctor" placeholder="License Number" required>
                            <div id="dlicenseno_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Qualifications</label>
                            <input type="text" class="form-control" id="qualificationdoctor" placeholder="Qualifications" required>
                            <div id="dqualification_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Medical Expertise</label>
                            <input type="text" class="form-control" id="medexpertisedoctor" placeholder="Medical Expertise" required>
                            <div id="dmedexpertise_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-6 control-label"><span class="glyphicon glyphicon-user"></span> Gender</label>
                            <select id="genderdoctor" class="form-control">
                                <option value="" selected disabled>--Select Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                            <div id="dgender_error"></div>
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-success btn-block" id="doctorregisterbtn"><span class="glyphicon glyphicon-log-in"></span> Register</button>
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
                  $("#doctorregister").hide("slow"); 
                  $("#patientregister").show("slow");
              });

              $("#doctorbtn").click(function (){
                  $("#patientregister").hide("slow");
                  $("#doctorregister").show("slow");
              });
              
              var pemail,pname,ppassword,pmobile,paddress,pdob,pgender;
              var pemail_err=true,pname_err=true,ppassword_err=true,pmobile_err=true,paddress_err=true,pdob_err=true,pgender_err=true;
              var demail,dname,dpassword,dmobile,dresaddress,dclinicaddress,ddob,dlicenseno,dqualification,dmedexpertise,dgender;
              var demail_err=true,dname_err=true,dpassword_err=true,dmobile_err=true,dresaddress_err=true,dclinicaddress_err=true,ddob_err=true,dlicenseno_err=true,dqualification_err=true,dmedexpertise_err=true,dgender_err=true;
              
              //Patient Form Validation
              
              $('#emailpatient').keyup(function(){
                  pemail_check();
              });
              $('#namepatient').keyup(function(){
                  pname_check();
              });
              $('#passwordpatient').keyup(function(){
                  ppassword_check();
              });
              $('#mobilepatient').keyup(function(){
                  pmobile_check();
              });
              $('#addresspatient').keyup(function(){
                  paddress_check();
              });
              $('#dobpatient').keyup(function(){
                  pdob_check();
              });
              $('#genderpatient').keyup(function(){
                  pgender_check();
              });
              
              //Doctor Form Validation
              
              $('#emaildoctor').keyup(function(){
                  demail_check();
              });
              $('#namedoctor').keyup(function(){
                  dname_check();
              });
              $('#passworddoctor').keyup(function(){
                  dpassword_check();
              });
              $('#mobiledoctor').keyup(function(){
                  dmobile_check();
              });
              $('#resaddressdoctor').keyup(function(){
                  dresaddress_check();
              });
              $('#clinicaddressdoctor').keyup(function(){
                  dclinicaddress_check();
              });
              $('#dobdoctor').keyup(function(){
                  ddob_check();
              });
              $('#licensenodoctor').keyup(function(){
                  dlicenseno_check();
              });
              $('#qualificationdoctor').keyup(function(){
                  dqualification_check();
              });
              $('#medexpertisedoctor').keyup(function(){
                  dmedexpertise_check(); 
              });
              $('#genderdoctor').keyup(function(){
                  dgender_check();
              });
              $('#genderdoctor').mouseup(function(){
                  dgender_check();
              });
              
              //Patient registration

              $("#patientregisterbtn").click(function () {
                $("#doctorregister").hide(); 
                $("#patientregister").show();
                pemail_err = true;
                pname_err = true;
                ppassword_err = true;
                pmobile_err = true;
                paddress_err = true;
                pdob_err = true;
                pgender_err = true;
                pemail_check();
                pname_check();
                ppassword_check();
                pmobile_check();
                paddress_check();
                pdob_check();
                pgender_check();
                if((pemail_err == true )&& (pname_err == true) && (ppassword_err == true) && (pmobile_err == true) && (paddress_err == true) && (pdob_err == true) && (pgender_err == true)){
                    $.ajax({
                        type: 'POST',
                        url: "savesignup.php",
                        data: {'emailid' : pemail ,'password':ppassword ,'submit':'submit','table':'patient','dob':pdob,'name':pname,'mobile':pmobile,'gender':pgender,'resaddress':paddress},
                        success: function (data) {
                            if(data['status']=="success"){
                                $("#messagelisterror").hide();
                                $("#messagelistsuccess").show(); 
                                $("#messagesuccess").html(data['message']);
                                window.setTimeout(function () {
                                    window.location.href="index.php";
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
              
              //Doctor Registration
              
              $("#doctorregisterbtn").click(function () {
                    $("#patientregister").hide(); 
                    $("#doctorregister").show(); 
                    demail_err = true;
                    dname_err = true;
                    dpassword_err = true;
                    dmobile_err = true;
                    dresaddress_err = true;
                    dclinicaddress_err = true;
                    ddob_err = true;
                    dlicenseno_err = true;
                    dqualification_err = true;
                    dmedexpertise_err = true;
                    dgender_err = true;
                    demail_check();
                    dname_check();
                    dpassword_check();
                    dmobile_check();
                    dresaddress_check();
                    dclinicaddress_check();
                    ddob_check();
                    dlicenseno_check();
                    dqualification_check();
                    dmedexpertise_check();
                    dgender_check();
                    if((demail_err == true )&& (dname_err == true) && (dpassword_err == true) && (dmobile_err == true) && (dresaddress_err == true) && (dclinicaddress_err == true) && (ddob_err == true) && (dlicenseno_err == true) && (dqualification_err == true) && (dmedexpertise_err == true) && (dgender_err == true)){
                        $.ajax({
                            type: 'POST',
                            url: "savesignup.php",
                            data: {'emailid' : demail ,'password':dpassword ,'submit':'submit','table':'doctor','dob':ddob,'name':dname,'mobile':dmobile,'gender':dgender,'resaddress':dresaddress,'clinicaddress':dclinicaddress,'qualification':dqualification,'expertise':dmedexpertise,'license':dlicenseno},
                            success: function (data) {
                                if(data['status']=="success"){
                                    $("#messagelisterror").hide();
                                    $("#messagelistsuccess").show();
                                    $("#messagesuccess").html(data['message']);
                                    window.setTimeout(function () {
                                        window.location.href="index.php";
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
              
              //Patient Validation Functions
              
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
              function pname_check(){
                  pname = $('#namepatient').val();
                  if(pname.length == 0){
                      $('#pname_error').show();
                      $('#pname_error').html("**Please Fill the Name");
                      $('#pname_error').focus();
                      $('#pname_error').css("color","red");
                      pname_err = false;
                  }else if((pname.length < 3 ) || (pname.length > 20 ) ){
                      $('#pname_error').show();
                      $('#pname_error').html("**Name length must be between 3 and 20");
                      $('#pname_error').focus();
                      $('#pname_error').css("color","red");
                      pname_err = false;
                  }else{
                      $('#pname_error').hide();
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
              function pmobile_check(){
                  pmobile = $('#mobilepatient').val();
                  if(pmobile.length == ''){
                      $('#pmobile_error').show();
                      $('#pmobile_error').html("**Please Fill the Mobile Number");
                      $('#pmobile_error').focus();
                      $('#pmobile_error').css("color","red");
                      pmobile_err = false;
                  }else if(pmobile.length != 10 ){
                      $('#pmobile_error').show();
                      $('#pmobile_error').html("**Mobile Number must be of 10 digits");
                      $('#pmobile_error').focus();
                      $('#pmobile_error').css("color","red");
                      pmobile_err = false;
                  }else{
                      $('#pmobile_error').hide();
                  }
              }
              function paddress_check(){
                  paddress = $('#addresspatient').val();
                  if(paddress.length == ''){
                      $('#paddress_error').show();
                      $('#paddress_error').html("**Please Fill the Address");
                      $('#paddress_error').focus();
                      $('#paddress_error').css("color","red");
                      paddress_err = false;
                  }else{
                      $('#paddress_error').hide();
                  }
              }
              function pdob_check(){
                  pdob = $('#dobpatient').val();
                  if(pdob.length == ''){
                      $('#pdob_error').show();
                      $('#pdob_error').html("**Please Fill the DOB");
                      $('#pdob_error').focus();
                      $('#pdob_error').css("color","red");
                      pdob_err = false;
                  }else{
                      $('#pdob_error').hide();
                  }
              }
              function pgender_check(){
                  pgender = $('#genderpatient option:selected').val();
                  if(pgender.length == ''){
                      $('#pgender_error').show();
                      $('#pgender_error').html("**Please Select Gender");
                      $('#pgender_error').focus();
                      $('#pgender_error').css("color","red");
                      pgender_err = false;
                  }else{
                      $('#pgender_error').hide();
                  }
              }
              
              //Doctor Validation Functions
              
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
              function dname_check(){
                  dname = $('#namedoctor').val();
                  if(dname.length == ''){
                      $('#dname_error').show();
                      $('#dname_error').html("**Please Fill the Name");
                      $('#dname_error').focus();
                      $('#dname_error').css("color","red");
                      dname_err = false;
                  }else if((dname.length < 3 ) || (dname.length > 20 ) ){
                      $('#dname_error').show();
                      $('#dname_error').html("**Name length must be between 3 and 20");
                      $('#dname_error').focus();
                      $('#dname_error').css("color","red");
                      dname_err = false;
                  }else{
                      $('#dname_error').hide();
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
              function dmobile_check(){
                  dmobile = $('#mobiledoctor').val();
                  if(dmobile.length == ''){
                      $('#dmobile_error').show();
                      $('#dmobile_error').html("**Please Fill the Mobile Number");
                      $('#dmobile_error').focus();
                      $('#dmobile_error').css("color","red");
                      dmobile_err = false;
                  }else if(dmobile.length != 10 ){
                      $('#dmobile_error').show();
                      $('#dmobile_error').html("**Mobile Number must be of 10 digits");
                      $('#dmobile_error').focus();
                      $('#dmobile_error').css("color","red");
                      dmobile_err = false;
                  }else{
                      $('#dmobile_error').hide();
                  }
              }
              function dresaddress_check(){
                  dresaddress = $('#resaddressdoctor').val();
                  if(dresaddress.length == ''){
                      $('#dresaddress_error').show();
                      $('#dresaddress_error').html("**Please Fill the Residential Address");
                      $('#dresaddress_error').focus();
                      $('#dresaddress_error').css("color","red");
                      dresaddress_err = false;
                  }else{
                      $('#dresaddress_error').hide();
                  }
              }
              function dclinicaddress_check(){
                  dclinicaddress = $('#clinicaddressdoctor').val();
                  if(dclinicaddress.length == ''){
                      $('#dclinicaddress_error').show();
                      $('#dclinicaddress_error').html("**Please Fill the Clinic Address");
                      $('#dclinicaddress_error').focus();
                      $('#dclinicaddress_error').css("color","red");
                      dclinicaddress_err = false;
                  }else{
                      $('#dclinicaddress_error').hide();
                  }
              }
              function ddob_check(){
                  ddob = $('#dobdoctor').val();
                  if(ddob.length == ''){
                      $('#ddob_error').show();
                      $('#ddob_error').html("**Please Fill the DOB");
                      $('#ddob_error').focus();
                      $('#ddob_error').css("color","red");
                      ddob_err = false;
                  }else{
                      $('#ddob_error').hide();
                  }
              }
              function dlicenseno_check(){
                  dlicenseno = $('#licensenodoctor').val();
                  if(dlicenseno.length == ''){
                      $('#dlicenseno_error').show();
                      $('#dlicenseno_error').html("**Please Fill the License Number");
                      $('#dlicenseno_error').focus();
                      $('#dlicenseno_error').css("color","red");
                      dlicenseno_err = false;
                  }else{
                      $('#dlicenseno_error').hide();
                  }
              }
              function dqualification_check(){
                  dqualification = $('#qualificationdoctor').val();
                  if(dqualification.length == ''){
                      $('#dqualification_error').show();
                      $('#dqualification_error').html("**Please Fill the Qualifications");
                      $('#dqualification_error').focus();
                      $('#dqualification_error').css("color","red");
                      dqualification_err = false;
                  }else{
                      $('#dqualification_error').hide();
                  }
              }
              function dmedexpertise_check(){
                  dmedexpertise = $('#medexpertisedoctor').val();
                  if(dmedexpertise.length == ''){
                      $('#dmedexpertise_error').show();
                      $('#dmedexpertise_error').html("**Please Fill the DOB");
                      $('#dmedexpertise_error').focus();
                      $('#dmedexpertise_error').css("color","red");
                      dmedexpertise_err = false;
                  }else{
                      $('#dmedexpertise_error').hide();
                  }
              }
              function dgender_check(){
                  dgender = $('#genderdoctor option:selected').val();
                  if(dgender.length == ''){
                      $('#dgender_error').show();
                      $('#dgender_error').html("**Please Select Gender");
                      $('#dgender_error').focus();
                      $('#dgender_error').css("color","red");
                      dgender_err = false;
                  }else{
                      $('#dgender_error').hide();
                  }
              }
            });
        </script>
        </body>
</html>