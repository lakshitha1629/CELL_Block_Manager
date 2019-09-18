<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
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

    <a class="navbar-brand mr-1" href="dashboard_Requestor.php">Welcome</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="userDropdown">
        <?php if (isset($_SESSION['success'])) : ?>
					<p class="dropdown-item" style="color: darkmagenta;"><b><?php echo $_SESSION['user_name']; ?></b><br><i>(<?php echo $_SESSION['user_type']; ?>)</i> 
        </p>
        <?php endif ?> 
                  <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          <a href="Admin_dashboard.php?logout='1'" style="color: red;"> -->
        <a class="dropdown-item" href="dashboard_Requestor.php?logout='1'">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard_Requestor.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="Details_Requestor.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Request Details</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard_Requestor.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
  
        <!-- Icon Cards-->
        <div class="row">
           <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: navy;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><b><i><?php 
                require_once ('connect.php');
                $date3 = date('Y-m-d');
                $requestor = $_SESSION['user_name'];
                $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE requestor='$requestor' AND block='Pending..'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['block1'];
                }?> Pending Block Messages!</b></i></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">Your Pending Block Messages Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-up"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><b><i><?php 
                require_once ('connect.php');
                $date3 = date('Y-m-d');
                $requestor = $_SESSION['user_name'];
                $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE requestor='$requestor' AND deblock='Pending..'";           

                $res = $con->query($qry);
                while ($data4 = $res->fetch_assoc()){
                echo $data4['deblock1'];
                }?> Pending Deblock Messages!</b></i></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">Your Pending Deblock Messages Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-up"></i>
                </span>
              </a>
            </div>
          </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><b><i><?php 
                require_once ('connect.php');
                $date1 = date('Y-m-d');
                $requestor = $_SESSION['user_name'];
                $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE requestor='$requestor' AND block='Block' AND `date` LIKE '$date1%'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['block1'];
                }?> Daily Blocks!</b></i></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">Today Your Blocks Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-up"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><b><i><?php 
                require_once ('connect.php');
                $date2 = date('Y-m-d');
                $requestor = $_SESSION['user_name'];
                $qry = "SELECT COUNT(`deblock`) as de FROM cbm_cell_block WHERE requestor='$requestor' AND deblock='Deblock' AND `deblock_time` LIKE '$date2%'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['de'];
                }?>  Daily Deblocks!</b></i></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">Today Your Deblocks Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-up"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        
          <!-- DataTables  -->
          <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Today CELL Request Table</div>
          <div class="card-body">
            <div class="table-responsive">
            <?php 
              
              require_once ('connect.php');
              $date = date('Y-m-d');
              $requestor1 = $_SESSION['user_name'];
              $qry = "SELECT * FROM cbm_cell_block";          
              echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>   
                  <tr> 
                  <th>Date</th> 
                  <th>Cell </th> 
                  <th>Site_name </th> 
                  <th>Technology </th> 
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
                      </tr></thead>';
               
              if ($res = $con->query($qry)) {
                  while ($row = $res->fetch_assoc()) {
                      $id=$row["id"];
                      $field1name = $row["date"];
                      $field2name = $row["cell"];
                      $field3name = $row["site_name"];
                      $field4name = $row["technology"]; 
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
					  
					if ($field7name=='Block' && $field11name=='Deblock'){

                          echo '<tr style="background-color: lightgray;">';
                      }
                      else{
                        echo '<tr>';
                 

                      }   
                                  
                      echo "
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
               
                  $res->free();
              } 
              ?></table>            

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
          <a class="btn btn-primary" href="login.php">Logout</a>
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
