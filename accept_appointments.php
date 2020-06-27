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
            <h2 class="alert alert-info text-center">Appointments Available</h2>
            <div class="col-sm-12" align="center">
                <table class="table">
                    
                </table>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
        
        <script>
            $(document).ready(function(){
                $.ajax({
                    type: 'POST',
                    url: "appointment.php",
                    data: { 'button':'check_appointments','submit' : 'submit' },
                    success: function (data) {
                        console.log(data);
                        var html='';
                        $.each(data,function(key,value){
                            if(value=='requested'){
                                html += '<tr>';
                                html += '<td>'+ key +'</td>';
                                html += '</tr>';
                            }else{
                                
                            }
                        });
                    $('table').html(html);
                    }
                });
            });
        </script>
    </body>
</html>

