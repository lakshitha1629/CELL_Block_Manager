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
       <div class="dropdown-menu dropdown-menu-left" aria-labelledby="userDropdown">
       <?php if (isset($_SESSION['success'])) : ?>
         <p class="dropdown-item" style="color: darkmagenta;"><b><?php echo $_SESSION['user_name']; ?></b><br><i>(<?php echo $_SESSION['user_type']; ?>)</i> 
       </p>
       <?php endif ?> 
         <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
         <a href="Admin_dashboard.php?logout='1'" style="color: red;"> -->
       <a class="dropdown-item" href="Admin_dashboard.php?logout='1'">Logout</a>
       </div>
     </li>
   </ul>

 </nav>

 <div id="wrapper">
 
   
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Summary.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Daily Log</span></a>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="new_summary_s.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Summary</span>
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

        <!-- Icon Cards-->
        <div class="row">
           <div class="col-xl-5 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-image: url('images/bg-2.jpg');">
              <div class="card-body" style="font-size: larger;font-family: cambria;">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-2">Daily Details!</div>
                <hr>
                        <ul>
                         <li>Today Request Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`date`) as da FROM cbm_cell_block WHERE `date` LIKE '$d_date%'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['da'];
                }?></li>
                         <li>Today Block Pending Request Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE block='Pending..' AND `date` LIKE '$d_date%'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['block1'];
                }?></li></li>
                         <li>Today Deblock Pending Request Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE deblock='Pending..' AND `date` LIKE '$d_date%'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['deblock1'];
                }?></li>
                         <li>Today Block Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`block`) as block2 FROM cbm_cell_block WHERE block='Block' AND `date` LIKE '$d_date%'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['block2'];
                }?></li>
                         <li>Today Deblock Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`deblock`) as deblock2 FROM cbm_cell_block WHERE block='Deblock' AND `date` LIKE '$d_date%'";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['deblock2'];
                }?></li>
                        </ul>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Daily Details Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        <div class="col-xl-5 col-sm-6 mb-3">
        <div class="card text-white o-hidden h-100" style="background-image: url('images/bg-3.jpg');background-size: cover;">
              <div class="card-body" style="font-size: larger;font-family: cambria;">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-2">Weekly Details!</div>
                <hr>
                        <ul>
                         <li>Weekly Request Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`date`) as da FROM cbm_cell_block WHERE YEARWEEK(`date`) = YEARWEEK(NOW())";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['da'];
                }?></li>
                         <li>Weekly Block Pending Request Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE block='Pending..' AND YEARWEEK(`date`) = YEARWEEK(NOW())";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['block1'];
                }?></li></li>
                         <li>Weekly Deblock Pending Request Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE deblock='Pending..' AND YEARWEEK(`date`) = YEARWEEK(NOW())";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['deblock1'];
                }?></li>
                         <li>Weekly Block Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`block`) as block2 FROM cbm_cell_block WHERE block='Block' AND YEARWEEK(`date`) = YEARWEEK(NOW())";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['block2'];
                }?></li>
                         <li>Weekly Deblock Count :- <?php 
                require_once ('connect.php');
                $d_date = date('Y-m-d');
                $qry = "SELECT COUNT(`deblock`) as deblock2 FROM cbm_cell_block WHERE block='Deblock' AND YEARWEEK(`date`) = YEARWEEK(NOW())";           

                $res = $con->query($qry);
                while ($data1 = $res->fetch_assoc()){
                echo $data1['deblock2'];
                }?></li>
                        </ul>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Weekly Details Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
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
