<?php
include('functions.php');

if (!isAdmin()) {
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
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">Welcome</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>


    <?php include 'common/nav.php'; ?>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="Admin_dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Admin_Summary.php">
          <i class="fas fa-chart-area"></i>
          <span>Cell Log</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new_summary.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Summary</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Report.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Excel Exporter</span></a>
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
            <a href="">Excel Exporter</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Export  -->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Date Range Excel Exporter</div>
          <div class="card-body">
            <div class="card col-xl-12 col-sm-12 mb-3">
              <div class="card-header">
                <i class="fas fa-file"></i>
                Export Cell Details Form</div>
              <div class="card-body">
                <form method="post" action="export.php">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="margin-right: -94px;">Date Range :</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="date" name="date1" maxlength="10" required>
                    </div>
                    <label class="col-sm-0 col-form-label"> to </label>
                    <div class="col-sm-3">
                      <input class="form-control" type="date" name="date2" maxlength="10" required>
                    </div>
                    <div class="col-sm-2">
                      <input class="btn btn-success" type=submit value="Export" name="export">
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

        <!-- Export  -->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Full Cell Table Excel Exporter</div>
          <div class="card-body">
            <div class="card col-xl-12 col-sm-12 mb-3">
              <div class="card-header">
                <i class="fas fa-file"></i>
                Export Cell Details Form</div>
              <div class="card-body">
                <form method="post" action="export_all.php">
                  <div class="form-row">
                    <div class="col-md-8 mb-3">
                      <label>Export Full File : </label>

                      <input class="btn btn-success" type="submit" name="export1" value="Export">
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
              <span>Copyright © Mobitel 2019 (Developed by Uva Wellassa University)</span>
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