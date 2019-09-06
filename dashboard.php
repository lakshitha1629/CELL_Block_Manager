<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cell Block Manager</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="jquery/jquery.min.js"></script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">Welcome</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
       
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Summary.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Summary</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?php 
                require_once ('connect.php');
                $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE block='Unblock'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['block1'];
                }?> New Cell Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            
        </div>

          <!-- DataTables  -->
          <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            CELL Block Table</div>
          <div class="card-body">
          <form method="post" id="update_form">
                    <div align="left">
                        <input type="submit" name="multiple_update" id="multiple_update" class="btn btn-info" value="Multiple Update" />
                    </div>
                    <br/>
                    <div class="table-responsive">
<?php               
    require_once ('connect.php');
              
    $qry = "SELECT * FROM cbm_cell_block";      
    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>   
        <tr> 
        <th>Date</th> 
        <th>Cell </th> 
        <th>Site_name </th> 
        <th>Controller </th> 
        <th>Requestor</th> 
        <th>Reason</th> 
        <th width="5%"></th>
        <th>Block</th>
        <th>Block_remarks</th>
        <th>Deblock</th>
        <th>Deblock_remarks</th> 
      </tr></thead>';             
                          

   						
        echo "<tbody></tbody>";

?>
                            
                        </table>
                    </div>
                </form>         

</div>
</div>
</div>        
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Mobitel 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>

<!--jQuary-->
<script>  
$(document).ready(function(){  
    
    function fetch_data()
    {
        $.ajax({
            url:"update_select.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td>'+data[count].date+'</td>';
                    html += '<td>'+data[count].cell+'</td>';
                    html += '<td>'+data[count].site_name+'</td>';
                    html += '<td>'+data[count].controller+'</td>';
                    html += '<td>'+data[count].requestor+'</td>';
                    html += '<td>'+data[count].reason+'</td>';
                    html += '<td><input type="checkbox" id="'+data[count].id+'" data-block="'+data[count].block+'" data-block_by="'+data[count].block_by+'" data-deblock="'+data[count].deblock+'" data-deblock_remarks="'+data[count].deblock_remarks+'" class="check_box"  /></td>';
                    html += '<td>'+data[count].block+'</td>';
                    html += '<td>'+data[count].block_by+'</td>';
                    html += '<td>'+data[count].deblock+'</td>';
                    html += '<td>'+data[count].deblock_remarks+'</td></tr>';
                }
                $('tbody').html(html);
            }
        });
    }
    //cell,site_name,controller,requestor,reason
    //`block`, `block_by`, `block_time`, `block_remarks`, `deblock`, 
    //`deblock_date`, `deblock_time`, `deblock_remarks`, `active
    fetch_data();

    $(document).on('click', '.check_box', function(){
        var html = '';
        if(this.checked)
        {   
            
                  
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-block="'+$(this).data('block')+'" data-block_by="'+$(this).data('block_by')+'" data-deblock="'+$(this).data('deblock')+'" data-deblock_remarks="'+$(this).data('deblock_remarks')+'" class="check_box" checked /></td>';
            html += '<td><select name="block[]" id="block_'+$(this).attr('id')+'" class="form-control"><option value="Unblock">Unblock</option><option value="Block">Block</option></select></td>';  
            html += '<td><input type="text" name="block_by[]" class="form-control" value="'+$(this).data("block_by")+'" /></td>';
            html += '<td><input type="text" name="deblock[]" class="form-control" value="'+$(this).data("deblock")+'" /></td>';
            html += '<td><input type="text" name="deblock_remarks[]" class="form-control" value="'+$(this).data("deblock_remarks")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
        }
        else
        {
                 
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-block="'+$(this).data('block')+'" data-block_by="'+$(this).data('block_by')+'" data-deblock="'+$(this).data('deblock')+'" data-deblock_remarks="'+$(this).data('deblock_remarks')+'" class="check_box" /></td>';
            html += '<td>'+$(this).data('block')+'</td>';
            html += '<td>'+$(this).data('block_by')+'</td>';
            html += '<td>'+$(this).data('deblock')+'</td>';
            html += '<td>'+$(this).data('deblock_remarks')+'</td>';            
        }
        $(this).closest('tr').html(html);
        $('#block'+$(this).attr('id')+'').val($(this).data('block'));
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"multiple_update.php",
                method:"POST",
                data:$(this).serialize(),
                success:function()
                {
                    alert('Your Data Updated Successfull.');
                    fetch_data();
                }
            })
        }
    });

});  
</script>