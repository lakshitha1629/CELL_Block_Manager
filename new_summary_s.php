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
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
    <?php include 'common/nav_inoc.php'; ?>
    
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
          <span>Cell Log</span></a>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="new_summary_s.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Summary</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Report_s.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Excel Exporter</span></a>
        </a>
      </li>
    </ul>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">Summary</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Area Chart-->
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3" style="padding-left: 15px;padding-right: 15px;">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Monthly Count Bar Chart</div>
              <div class="card-body">
                <canvas id="mycanvas" width="100%" height="50"></canvas>
              </div>

              <!-- <form id="loginform" method="post">    -->
              <!-- <div class="form-group row">
                <label class="col-sm-4 col-form-label"><a href="#" id="downloadPdf">Download Report Page as PDF</a></label>
               
               </div> -->
              <!-- <label class="col-sm-0 col-form-label"> to </label>
               <div class="col-sm-3">
                <input  class="form-control" type="date" id="date2" maxlength="10"   >
               </div>
               <div class="col-sm-2">
               <button class="btn btn-success" id="generate"> Generate </button>
                </div>
              </div>
              </form>
   -->




            </div>
          </div>
          <div class="col-lg-4">
            <div class="mb-3">
              <div class="card text-white o-hidden h-100" style="background-image: url('images/bg-2.jpg');">
                <div class="card-body" style="font-size: medium;font-family: cambria;">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-2">Daily Details!</div>
                  <hr>
                  <ul>
                    <li>Today Request Count :- <?php
                                                require_once('connect.php');
                                                $d_date = date('Y-m-d');
                                                $qry = "SELECT COUNT(`date`) as da FROM cbm_cell_block WHERE `date` LIKE '$d_date%'";

                                                $res = $con->query($qry);
                                                while ($data1 = $res->fetch_assoc()) {
                                                  echo $data1['da'];
                                                } ?></li>
                    <li>Today Block Pending Request Count :- <?php
                                                              require_once('connect.php');
                                                              $d_date = date('Y-m-d');
                                                              $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE block='Pending..' AND `date` LIKE '$d_date%'";

                                                              $res = $con->query($qry);
                                                              while ($data1 = $res->fetch_assoc()) {
                                                                echo $data1['block1'];
                                                              } ?></li>
                    </li>
                    <li>Today Deblock Pending Request Count :- <?php
                                                                require_once('connect.php');
                                                                $d_date = date('Y-m-d');
                                                                $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE deblock='Pending..' AND `date` LIKE '$d_date%'";

                                                                $res = $con->query($qry);
                                                                while ($data1 = $res->fetch_assoc()) {
                                                                  echo $data1['deblock1'];
                                                                } ?></li>
                    <li>Today Block Count :- <?php
                                              require_once('connect.php');
                                              $d_date = date('Y-m-d');
                                              $qry = "SELECT COUNT(`block`) as block2 FROM cbm_cell_block WHERE block='Block' AND `date` LIKE '$d_date%'";

                                              $res = $con->query($qry);
                                              while ($data1 = $res->fetch_assoc()) {
                                                echo $data1['block2'];
                                              } ?></li>
                    <li>Today Deblock Count :- <?php
                                                require_once('connect.php');
                                                $d_date = date('Y-m-d');
                                                $qry = "SELECT COUNT(`deblock`) as deblock2 FROM cbm_cell_block WHERE deblock='Deblock' AND `date` LIKE '$d_date%'";

                                                $res = $con->query($qry);
                                                while ($data1 = $res->fetch_assoc()) {
                                                  echo $data1['deblock2'];
                                                } ?></li>
                  </ul>
                </div>
                <a class="card-footer text-white clearfix small z-1">
                  <span class="float-left">Daily Details Count</span>
                  <span class="float-right">
                    <i class="fas fa-angle-up"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="mb-3">
              <div class="card text-white o-hidden h-100" style="background-image: url('images/bg-3.jpg');background-size: cover;">
                <div class="card-body" style="font-size: medium;font-family: cambria;">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-2">Monthly Details!</div>
                  <hr>
                  <ul>
                    <li>Monthly Request Count :- <?php
                                                  require_once('connect.php');
                                                  $d_date = date('Y-m-d');
                                                  $qry = "SELECT COUNT(`date`) as da FROM cbm_cell_block WHERE MONTH(`date`) = MONTH(NOW())";

                                                  $res = $con->query($qry);
                                                  while ($data1 = $res->fetch_assoc()) {
                                                    echo $data1['da'];
                                                  } ?></li>
                    <li>Monthly Block Pending Request Count :- <?php
                                                                require_once('connect.php');
                                                                $d_date = date('Y-m-d');
                                                                $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE block='Pending..' AND MONTH(`date`) = MONTH(NOW())";

                                                                $res = $con->query($qry);
                                                                while ($data1 = $res->fetch_assoc()) {
                                                                  echo $data1['block1'];
                                                                } ?></li>
                    </li>
                    <li>Monthly Deblock Pending Request Count :- <?php
                                                                  require_once('connect.php');
                                                                  $d_date = date('Y-m-d');
                                                                  $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE deblock='Pending..' AND MONTH(`date`) = MONTH(NOW())";

                                                                  $res = $con->query($qry);
                                                                  while ($data1 = $res->fetch_assoc()) {
                                                                    echo $data1['deblock1'];
                                                                  } ?></li>
                    <li>Monthly Block Count :- <?php
                                                require_once('connect.php');
                                                $d_date = date('Y-m-d');
                                                $qry = "SELECT COUNT(`block`) as block2 FROM cbm_cell_block WHERE block='Block' AND MONTH(`date`) = MONTH(NOW())";

                                                $res = $con->query($qry);
                                                while ($data1 = $res->fetch_assoc()) {
                                                  echo $data1['block2'];
                                                } ?></li>
                    <li>Monthly Deblock Count :- <?php
                                                  require_once('connect.php');
                                                  $d_date = date('Y-m-d');
                                                  $qry = "SELECT COUNT(`deblock`) as deblock2 FROM cbm_cell_block WHERE deblock='Deblock' AND MONTH(`date`) = MONTH(NOW())";

                                                  $res = $con->query($qry);
                                                  while ($data1 = $res->fetch_assoc()) {
                                                    echo $data1['deblock2'];
                                                  } ?></li>
                  </ul>
                </div>
                <a class="card-footer text-white clearfix small z-1">
                  <span class="float-left">Monthly Details Count</span>
                  <span class="float-right">
                    <i class="fas fa-angle-up"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-5 col-sm-6 mb-3">

        </div>
        <div class="col-xl-5 col-sm-6 mb-3">

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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- <script type="text/javascript" src="jquery/app.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <!-- <script src="js/jspdf.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script> -->
  <!-- Demo scripts for this page
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> -->


  <script>
    $(document).ready(function() {


      //  $('#generate').click(function (e) {
      // e.preventDefault();
      // var val1 = $('#date1').val();
      // var val2 = $('#date2').val();

      // $.ajax({
      //     type: 'POST',
      //     url: "data.php",
      //     data: {date1: val1, date2: val2},
      //     dataType: "html",
      //     success: 
      //function (response) {
      //                           $('#mycanvas').html(response);
      //                       }
      //                   });

      //               });
      $.ajax({
        url: "data.php",
        method: "post",
        success: function(data) {
          console.log(data);
          var date = [];
          var Block = [];
          var Deblock = [];
          var Request = [];

          for (var i in data) {
            date.push("" + data[i].a);
            Block.push(data[i].b);
            Deblock.push(data[i].c);
            Request.push(data[i].d);
          }

          var chartdata = {
            labels: date,
            date,
            date,
            datasets: [{
              label: 'Block Count',
              backgroundColor: '#98FB98',
              borderColor: '#98FB98',
              data: Block
            }, {
              label: 'Deblock Count',
              backgroundColor: '#b2beb5',
              borderColor: '#b2beb5',
              data: Deblock
            }, {
              label: 'Request Count',
              backgroundColor: '#87CEEB',
              borderColor: '#87CEEB',
              data: Request
            }]

          };

          var ctx = $("#mycanvas");

          var barGraph = new Chart(ctx, {
            type: 'bar',
            data: chartdata
          });
        },
        error: function(data) {
          console.log(data);
        }
      });


    });

    // });
  </script>


</body>

</html>