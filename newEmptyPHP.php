<?php
//session_start();
//if(isset($_SESSION['user_type']))
//{
//    if($_SESSION['user_type']=="Admin")
//    {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Health ">
	<meta name="keywords" content="Smart Health Consultation"/>
    <meta name="author" content="Shivam Kumar">

    <title>E-Health Consultation</title>
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="bootstrap/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
    </head>
<style>
    .dataTables_filter { display: none; }
    .dataTables_wrapper .dt-buttons {
        float:right;  
        text-align:center;
        font-size:12px;
    }
    .dataTables_paginate{
        font-size:10px;
        margin-bottom:5px;
    }
    .dataTables_length{
        font-size:12px;
        margin-bottom:5px;    
    }
    .dataTables_info{
        font-size:12px;
    }
</style>
<body>
<section class="showcase">
    <div class="container">
        <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2>Doctors list</h2>
      </div>
      <div class="row">
          <div class="col-lg-12"><span id="success-msg"></div>
      </div>
        <div class="row">
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">                       
                            <input type="text" class="small form-control global_filter" id="global_filter" placeholder="Keyword..">                                       
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <div class="form-group">                        
                            <input type="text" class="form-control column_filter" id="name_filter" data-custom_column="1" placeholder="Name">
                        </div>

                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="form-group">                        
                            <input type="text" class="form-control column_filter" id="emailid_filter" data-custom_column="2" placeholder="Email Id">
                        </div>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <div class="form-group">                        
                            <input type="text" class="form-control column_filter" id="mobileno_filter" data-custom_column="3" placeholder="Mobile No">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <div class="form-group">                        
                            <input type="text" class="form-control column_filter" id="isactive_filter" data-custom_column="4" placeholder="User Is Active">
                        </div>
                    </div>
					<div class="col-lg-2 col-sm-2">
                        <div class="form-group">                        
                            <input type="text" class="form-control column_filter" id="license_filter" data-custom_column="5" placeholder="License Number">
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <div class="table-responsive">
            <table id="render-datatable" class="table table-bordered table-hover small"> 
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Clinic Address</th>
                        <th scope="col">Qualification</th>
                        <th scope="col">License Number</th>
                        <th scope="col">Expertise</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead> 
                <tbody> 
                </tbody> 
                <tfoot> 
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Clinic Address</th>
                        <th scope="col">Qualification</th>
                        <th scope="col">License Number</th>
                        <th scope="col">Expertise</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</section>
<div class="modal fade rotate" id="activate_doctor" style="display:none;">
    <div class="modal-dialog" style="width: 24%;"> 
        <form id="activate-doctor-form" method="post">   
            <div class="modal-content panel panel-primary">
                <div class="modal-header panel-heading">
                    <h4 class="modal-title -remove-title">Doctor Activation Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    <div class="row">        
                        <div class="col-sm-12" style="min-height:50px;">
                            <span>Are you sure you want to activate this Doctor?</span>
                        </div>
                    </div>        
                </div>
                <div class="modal-footer panel-footer">
                    <div class="row">
                        <div class="col-sm-12">                            
                            <button type="button" class="btn rkmd-btn btn-success" data-doctoractivateid="" id="activate-doctor-btn">Yes</button> 
                            <button type="button" class="btn rkmd-btn btn-danger" data-dismiss="modal">No</button>
                        </div>                    
                    </div>
                </div>
            </div>
        </form>      
    </div>
</div>
<div class="modal fade rotate" id="deactivate_doctor" style="display:none;">
    <div class="modal-dialog" style="width: 24%;"> 
        <form id="deactivate-doctor-form" method="post">   
            <div class="modal-content panel panel-primary">
                <div class="modal-header panel-heading">
                    <h4 class="modal-title -remove-title">Doctor Deactivation Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    <div class="row">        
                        <div class="col-sm-12" style="min-height:50px;">
                            <span>Are you sure you want to Deactivate this Doctor?</span>
                        </div>
                    </div>        
                </div>
                <div class="modal-footer panel-footer">
                    <div class="row">
                        <div class="col-sm-12">                            
                            <button type="button" class="btn rkmd-btn btn-success" data-doctordeactivateid="" id="deactivate-doctor-btn">Yes</button> 
                            <button type="button" class="btn rkmd-btn btn-danger" data-dismiss="modal">No</button>
                        </div>                    
                    </div>
                </div>
            </div>
        </form>      
    </div>
</div>
</body>
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
$('#render-datatable').DataTable({
            "paging": true,
            "processing": false,
            "serverSide": true,
            "order": [],
        "ajax": {
            "url" : "getAllDoctors.php",
            "type" : 'POST',
            "data": function ( data ) {
                    data.name = $('#name_filter').val();
                    data.emailid = $('#emailid_filter').val();
                    data.mobileno = $('#mobileno_filter').val();
                    data.license = $('#license_filter').val();
                    data.isactive = $('#isactive_filter').val();
                }
        },
            dom: 'lBfrtip',
            buttons: [{
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Excel',
                    filename: 'aricles',
                    title: '',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [1, 2, 3, 4, 5,6]
                    }
                },
                {
                    extend: 'csv',
                    text: '<i class="fa fa-file-csv-o" aria-hidden="true"></i> Export CSV',
                    filename: 'articles',
                    title: '',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [1, 2, 3, 4, 5,6]
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF',
                    filename: 'articles',
                    title: '',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied',
                            page: 'current'
                        },
                        columns: [1, 2, 3, 4, 5,6]
                    }
                },
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "aoColumns": [
                {
                    "bVisible": false, "aTargets": [0]
                },
                null,
                null,
                null,
				        null,
				        null,
                null,
                {
                    "bSortable" : false,
                    mRender: function (data, type, row){
                        if(data==0){
                         return  '<a data-toggle="modal" data-target="#activate_doctor"  href="javascript:void(0);" title="Activate Doctor" class="activate-doctor-details ml-1 btn-ext-small btn btn-sm btn-danger" data-getdoctoractivateid="' + row[0] + '" rel="noopener noreferrer"><i class="fa fa-eye-slash"></i></a>';
                        }
                        else
                        {
                         return  '<a data-toggle="modal" data-target="#deactivate_doctor"  href="javascript:void(0);" title="Deactivate Doctor" class="deactivate-doctor-details ml-1 btn-ext-small btn btn-sm btn-success" data-getdoctordeactivateid="' + row[0] + '" rel="noopener noreferrer"><i class="fa fa-eye"></i></a>';
                        }


                    } 
                },
            
            ],
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('id', aData[0]);
            }
        });
        // define method global search
        function filterGlobal(v) {
            $('#render-datatable').DataTable().search(
                    v,
                    false,
                    false
                    ).draw();
        }
        
        // filter keyword
        $('input.global_filter').on('keyup click', function () {
            var v = jQuery(this).val();    
            filterGlobal(v);
        });
        $('input.column_filter').on('keyup click', function () {
            $('#render-datatable').DataTable().ajax.reload();
        });
    });

</script>
 <!-- Script -->
 <?php
  }
  else
  {
      header('Location: index.php');
  }
} 
else
{
    header('Location: index.php');
}
?>