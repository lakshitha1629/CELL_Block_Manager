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
      
      <li class="nav-item">
        <a class="nav-link" href="Admin_dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Admin_Summary.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Summary</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Report.php">
          <i class="fas fa-chart-area"></i>
          <span>Reports</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Registration.php">
          <i class="fas fa-fw fa-user"></i>
          <span>User Registration</span>
          </a>
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
        
          <!-- Export  -->
          <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Date Range Table to Excel Export</div>
          <div class="card-body">
          <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-file"></i>
            Export Details Form</div>
          <div class="card-body">
        <form method = "post" action = "">
        <div class="form-row">
              <div class="col-md-8 mb-3">  
               <label>Date Range:</label>
                <input  class="col-md-4" type="date" name="date1" maxlength="10" required  >
               to <input  class="col-md-4" type="date" name="date2"  maxlength="10" required >
       
         </div>
           
            </div>
    
<input class="btn btn-success" type=submit value="Export" name="export">

</form>
</div>
<?php 

if(isset($_POST['export'])){ 
  require_once ('connect.php');
  $output = '';
  $date = date('Y-m-d');
  $date1=$_POST['date1'];
  $date2=$_POST['date2'];
  
 //  $query = "SELECT * FROM cbm_cell_block WHERE `date`= '$date'";
   $query = "SELECT * FROM cbm_cell_block WHERE `date` BETWEEN '$date1' AND '$date2'";
   $result = mysqli_query($con, $query);
   if(mysqli_num_rows($result) > 0)
   {
    $output .= '
     <table class="table" bordered="1">  
     <tr> 
     <th>Date</th> 
     <th>Cell </th> 
     <th>Site_name </th> 
     <th>Controller </th> 
     <th>Requestor</th> 
     <th>Reason</th> 
     <th>Block</th>
     <th>Block_by</th>
     <th>Block_time</th>
     <th>Block_remarks</th>          
     <th>Deblock</th>
     <th>Deblock_by</th>
     <th>Deblock_time</th>        
     <th>Deblock_remarks</th> 
         </tr>
    ';
    while($row = mysqli_fetch_array($result))
    {
      $id=$row["id"];
      $field1name = $row["date"];
      $field2name = $row["cell"];
      $field3name = $row["site_name"];
      $field4name = $row["controller"]; 
      $field5name = $row["requestor"];
      $field6name = $row["reason"]; 
      $field7name = $row["block"];
      $field8name = $row["block_by"];
      $field9name = $row["block_time"];
      $field10name = $row["block_remarks"];
      $field11name = $row["deblock"];
      $field12name = $row["deblock_by"];
      $field13name = $row["deblock_time"];
      $field14name = $row["deblock_remarks"];

                  $output .= "<tr> 
                                <td>".$field1name."</td> 
                                <td>".$field2name."</td> 
                                <td>".$field3name."</td> 
                                <td>".$field4name."</td> 
                                <td>".$field5name."</td> 
                                <td>".$field6name."</td>
                                <td>".$field7name."</td> 
                                <td>".$field8name."</td> 
                                <td>".$field9name."</td> 
                                <td>".$field10name."</td> 
                                <td>".$field11name."</td> 
                                <td>".$field12name."</td>
                                <td>".$field13name."</td> 
                                <td>".$field14name."</td> 
                                </tr>";
    }
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
   }else{
     echo "Enter the correct date range";
   }
  }
  ?>
        </div>
    </div>
</div>

         <!-- Export  -->
         <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Full Table to Excel Export</div>
          <div class="card-body">
          <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-file"></i>
            Export Details Form</div>
          <div class="card-body">
        <form method = "post" action = "">
        <div class="form-row">
              <div class="col-md-8 mb-3">  
               <label>Export Full File:</label>
       
<input class="btn btn-success" type=submit value="Export" >
         </div>
           
            </div>
    

  </form>
   </div>
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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
