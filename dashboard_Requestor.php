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
  <meta http-equiv="Refresh" content="100">
  <meta name="viewport" content="width=device-width, initial-scale=0.9">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
    <?php include 'common/nav_rno.php'; ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard_Requestor.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="Details_Requestor.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Log Details</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Vendor_Request.php">
            <i class="fas fa-blender-phone"></i>
            <span>Vendor Request</span></a>
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
            <div class="col-xl-12 col-sm-12 mb-3">
              <div class="card text-white o-hidden h-100" style="background-image: url('images/bg-4.jpg');background-size: cover;padding-bottom: 100px;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>


          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white o-hidden h-100" style="background-color: navy;">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><b><i><?php
                                          require_once('connect.php');
                                          $date3 = date('Y-m-d');
                                          $requestor = $_SESSION['user_name'];
                                          $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE requestor='$requestor' AND block='Pending..'";

                                          $res = $con->query($qry);
                                          while ($data1 = $res->fetch_assoc()) {
                                            echo $data1['block1'];
                                          } ?> Pending Block Messages!</b></i></div>
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
                                          require_once('connect.php');
                                          $date3 = date('Y-m-d');
                                          $requestor = $_SESSION['user_name'];
                                          $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE requestor='$requestor' AND deblock='Pending..'";

                                          $res = $con->query($qry);
                                          while ($data4 = $res->fetch_assoc()) {
                                            echo $data4['deblock1'];
                                          } ?> Pending Deblock Messages!</b></i></div>
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
                                          require_once('connect.php');
                                          $date3 = date('Y-m-d');
                                          $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE block='Approval_Pending..'";

                                          $res = $con->query($qry);
                                          while ($data1 = $res->fetch_assoc()) {
                                            echo $data1['block1'];
                                          } ?> Approval Pending Block Messages!</b></i></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="Vendor_Request.php">
                  <span class="float-left">Vendors Approval Pending Block Messages Count</span>
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
                                          require_once('connect.php');
                                          $date3 = date('Y-m-d');
                                          $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE deblock='Approval_Pending..'";

                                          $res = $con->query($qry);
                                          while ($data4 = $res->fetch_assoc()) {
                                            echo $data4['deblock1'];
                                          } ?> Approval Pending Deblock Messages!</b></i></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="Vendor_Request.php">
                  <span class="float-left">Vendors Approval Pending Deblock Messages Count</span>
                  <span class="float-right">
                    <i class="fas fa-angle-up"></i>
                  </span>
                </a>
              </div>
            </div>
          
        </div>


        <!-- Uploader --->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fa fa-list-alt"></i>
            Multi-CELL Uploader</div>
          <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">

              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label>Upload your Multi-CELL Excel File :</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="excelfile" id="excelfile" class="">
                      <!-- <label class="" for="inputGroupFile01">Choose file</label> -->
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <button class="btn btn-success">Upload</button>
                  </div>


            </form>

            <?php

            use Box\Spout\Reader\ReaderFactory;
            use Box\Spout\Common\Type;

            require_once('connect.php');
            require_once('Spout/Autoloader/autoload.php');

            if (!empty($_FILES['excelfile']['name'])) {

              $pathinfo = pathinfo($_FILES['excelfile']['name']);

              if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')
                && $_FILES['excelfile']['size'] > 0
              ) {
                $file = $_FILES['excelfile']['tmp_name'];

                $reader = ReaderFactory::create(Type::XLSX);

                $reader->open($file);
                $count = 0;

                foreach ($reader->getSheetIterator() as $sheet) {

                  foreach ($sheet->getRowIterator() as $row) {

                    if ($count > 0) {

                      date_default_timezone_set('Asia/Colombo');

                      $date = date('Y-m-d H:i:s');
                      $cell = strtoupper($row[0]);
                      $site_name = ucfirst($row[1]);
                      $technology = strtoupper($row[2]);
                      // $requestor = $row[3];
                      $requestor = $_SESSION['user_name'];
                      $reason = ucfirst($row[3]);

                      $block = ucfirst($row[4]);
                      $deblock = 'Pending..';
                      $active = '1';

                      $check = mysqli_query($con, "SELECT * FROM `cbm_cell_block` WHERE `site_name`='$site_name' AND `technology`='$technology' AND (`block`='$block' OR `deblock`='$deblock')");
                      // echo $check;
                      $checkrows = mysqli_num_rows($check);

                      if ($checkrows > 0) {
                        echo "<div style='color: red;'>*Cell request already exists.</div>";
                      } else {

                        if ($block == 'Block') {
                          $block1 = 'Pending..';
                          $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `active`, `block`) VALUES ('$date','$cell','$site_name','$technology','$requestor','$reason','$active','$block1')";
                        } else if ($block == 'Deblock') {
                          //`id`, `date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`, `active`
                          $block2 = 'Block';
                          $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `active`, `block`, `deblock`) VALUES ('$date','$cell','$site_name','$technology','$requestor','$reason','$active','$block2','$deblock')";
                          //echo $qry;
                        } else {

                          echo "error";
                        }
                      }

                      //$qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `active`, `block`) VALUES ('$date','$cell','$site_name','$technology','$requestor','$reason','$active','$block')";
                      $res = mysqli_query($con, $qry);
                    }
                    $count++;
                  }
                }

                if ($res) {
                  echo "Your file Uploaded Successfull";
                } else {
                  echo "Your file Uploaded Failed";
                }

                $reader->close();
              } else {
                echo "Please Choose only Excel file";
              }
            } else {
              //echo "test";
            }

            ?>

          </div>
          <div class="col-xl-3 col-sm-6 mb-3">

          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            Use this table format:- <form><input type="button" value="Download Template" onClick="window.location.href='downloads/Template.xlsx'" class="btn btn-info"></form>
            <hr>
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead style="background-color: aliceblue;">
                <tr>
                  <th>Cell </th>
                  <th>Site_name </th>
                  <th>Technology </th>
                  <th>Reason</th>
                  <th>Request Type</th>
                </tr>
              </thead>

              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
            <p style="margin-bottom: 2px;">Please give Request Type <b>Block</b> or <b>Deblock</b>
              <div style="color: red;">*(As in the <b>Bold</b> format)</div>
            </p>

          </div>
          <div class="col-xl-3 col-sm-6 mb-3">

          </div>
        </div>
      </div>
    </div>



    <!-- form --->
    <div class="card col-xl-12 col-sm-12 mb-3">
      <div class="card-header">
        <i class="fas fa-file"></i>
        Single CELL Form</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label>Date :</label>
              <input type="text" name="date" class="form-control" placeholder="<?php echo date("Y/m/d"); ?>" maxlength="10" readonly>
            </div>
            <div class="col-md-4 mb-3">
              <label>Cell :</label>
              <input type="text" name="cell" id="cell" class="form-control" placeholder="Cell Name" maxlength="25" style="text-transform: uppercase;" required>
            </div>
            <div class="col-md-4 mb-3">
              <label>Site Name :</label>
              <input type="text" name="site" class="form-control" placeholder="Site Name" maxlength="35" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label>Technology :</label>
              <input type="text" name="technology" id="technology" class="form-control" placeholder="BSC/RNC/4G/3G" maxlength="10" style="text-transform: uppercase;" required>
            </div>
            <div class="col-md-4 mb-3">
              <label>Requestor :</label>
              <input type="text" name="requestor" class="form-control" placeholder="<?php echo $_SESSION['user_name']; ?>" maxlength="40" readonly>
            </div>
            <div class="col-md-4 mb-3">
              <label>Request Type :</label>
              <select class="form-control" name="block">
                <option value="Pending..">Block</option>
                <option value="Block">Deblock</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label>Reason :</label>
              <input type="text" name="reason" id="reason" class="form-control" placeholder="Reason" required>
            </div>
          </div>
          <input class="btn btn-success" type=submit value="ADD" name="submit1">

        </form>
        <?php

        if (isset($_POST['submit1'])) {
          require_once('connect.php');
          date_default_timezone_set('Asia/Colombo');
          $date = date('Y-m-d H:i:s');
          //$date = $_POST['date'];
          $cell = strtoupper($_POST['cell']);
          $site_name = ucfirst($_POST['site']);
          $technology = strtoupper($_POST['technology']);
          $requestor = $_SESSION['user_name'];
          $reason = ucfirst($_POST['reason']);
          $block = $_POST['block'];
          $deblock = 'Pending..';
          $active = '1';

          //checkin query
          //$check = mysqli_query($con, "select * from clients where firstname='$firstname' and lastname='$lastname'");
          $check = mysqli_query($con, "SELECT * FROM `cbm_cell_block` WHERE `site_name`='$site_name' AND `technology`='$technology' AND (`block`='$block' OR `deblock`='$deblock')");
          // echo $check;
          $checkrows = mysqli_num_rows($check);

          if ($checkrows > 0) {
            echo "<div style='color: red;'>*Cell request already exists.</div>";
          } else {



            if ($block == 'Block') {
              $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `active`, `block`, `deblock`) VALUES ('$date','$cell','$site_name','$technology','$requestor','$reason','$active','$block','$deblock')";
            } else {
              //`id`, `date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`, `active`
              $block1 = 'Pending..';
              $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `active`, `block`) VALUES ('$date','$cell','$site_name','$technology','$requestor','$reason','$active','$block1')";
              //echo $qry;
            }
            if (!mysqli_query($con, $qry)) {
              die('Error: ' . mysqli_error());
            }
            echo "Your record added Successfull";
          }
        }

        ?>


      </div>
    </div>



    <!-- DataTables  -->
    <div class="card col-xl-12 col-sm-12 mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        CELL Block Table</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="80px">Date</th>
                <th>Cell </th>
                <th>Site_name </th>
                <th>Technology </th>
                <th width="150px">Requestor</th>
                <th>Reason</th>
                <th>Block</th>
                <th>Deblock</th>
                <th></th>
              </tr>
            </thead>

            <tfoot>
              <tr>
                <th width="80px">Date</th>
                <th>Cell </th>
                <th>Site_name </th>
                <th>Technology </th>
                <th width="150px">Requestor</th>
                <th>Reason</th>
                <th>Block</th>
                <th>Deblock</th>
                <th></th>
              </tr>
            </tfoot>

            <?php

            require_once('connect.php');
            $user = $_SESSION['user_name'];
            $qry = "SELECT * FROM cbm_cell_block WHERE `requestor` LIKE '%$user%' AND (block='Pending..' OR deblock='' OR deblock='Pending..') ORDER BY `id` DESC";


            if ($res = $con->query($qry)) {
              while ($row = $res->fetch_assoc()) {
                $id = $row["id"];
                $field1name = $row["date"];
                $field2name = $row["cell"];
                $field3name = $row["site_name"];
                $field4name = $row["technology"];
                $field5name = $row["requestor"];
                $field6name = $row["reason"];
                $field7name = $row["block"];
                $field8name = $row["deblock"];

                echo "<tr> 
                  <td>" . $field1name . "</td> 
                  <td>" . $field2name . "</td> 
                  <td>" . $field3name . "</td> 
                  <td>" . $field4name . "</td> 
                  <td>" . $field5name . "</td> 
                  <td>" . $field6name . "</td>
                  <td>" . $field7name . "</td>
                  <td>" . $field8name . "</td>
                  <td><a onClick=\"return confirm('Are you sure you want to deblock?')\" href=\"deblock_Requestor.php?id=" . $row['id'] . "\" class=''><i class='fas fa-mail-bulk' style='font-size:18px;color:blue'></i></a>
                  <a onClick=\"return confirm('Are you sure you want to delete?')\" href=\"delete_Requestor.php?id=" . $row['id'] . "\" class=''><i class='fa fa-window-close' style='font-size:18px;color:red'></i></a>
                  </td>
              </tr>";
              }

              $res->free();
            }
            ?>
          </table><br>
          <p style="margin-bottom: 2px;text-align: right;">Deblock Request Use &nbsp;&nbsp; <i class='fas fa-mail-bulk' style='font-size:18px;color:blue'></i>
            &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;Delete Request Use &nbsp;&nbsp;<i class='fa fa-window-close' style='font-size:18px;color:red'></i></p>

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



    <script>
      $(function cell() {
        $("#cell").autocomplete({
          source: "AutoComplete/cell_search.php",
        });
      });
    </script>
    <script>
      $(function technology() {
        $("#technology").autocomplete({
          source: "AutoComplete/tech_search.php",
        });
      });
    </script>
    <script>
      $(function reason() {
        $("#reason").autocomplete({
          source: "AutoComplete/reason_search.php",
        });
      });
    </script>

</body>

</html>