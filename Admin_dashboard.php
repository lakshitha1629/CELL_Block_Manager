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
  <meta http-equiv="Refresh" content="100">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="jquery/jquery.min.js"></script>

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
      <li class="nav-item active">
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
      <li class="nav-item">
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
            <a href="">Dashboard</a>
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

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: navy;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?php
                                  require_once('connect.php');
                                  $qry = "SELECT COUNT(`block`) as block1 FROM cbm_cell_block WHERE block='Pending..'";

                                  $res = $con->query($qry);
                                  while ($data1 = $res->fetch_assoc()) {

                                    if ($data1['block1'] != '0') {
                                      echo '<audio controls autoplay>

                    <source src="music/sound.mp3" type="audio/mpeg" >
                  </audio>
                  ';
                                    }
                                    echo $data1['block1'];
                                  } ?> Pending Block Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#DEB">
                <span class="float-left">Pending Block Messages Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-up"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: forestgreen;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?php
                                  require_once('connect.php');
                                  $qry = "SELECT COUNT(`deblock`) as deblock1 FROM cbm_cell_block WHERE deblock='Pending..'";

                                  $res = $con->query($qry);
                                  while ($data2 = $res->fetch_assoc()) {
                                    if ($data2['deblock1'] != '0') {
                                      echo '<audio controls autoplay>

                    <source src="music/sound.mp3" type="audio/mpeg" >
                  </audio>
                  ';
                                    }
                                    echo $data2['deblock1'];
                                  } ?> Pending Deblock Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#DEB">
                <span class="float-left">Pending Deblock Messages Count</span>
                <span class="float-right">
                  <i class="fas fa-angle-up"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">

          </div>
          <div class="col-xl-3 col-sm-6 mb-3">

          </div>
        </div>


        <!-- DataTables  -->
        <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            CELL Requests Block/Deblock Pending Table</div>
          <div class="card-body">
            <form method="post" id="update_form">
              <div align="left">
                <input type="submit" name="multiple_update" id="multiple_update" class="btn btn-info" value="Update" />
              </div>
              <div align="right">
                Search : <input type="text" name="search" id="search" class="form-control-sm" />
              </div>
              <br />
              <!-- onClick="document.location.reload(true)" -->
              <div class="table-responsive">

                <div id="DEB">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%"></th>
                        <th>Date</th>
                        <th>Cell </th>
                        <th>Site_name </th>
                        <th>Technology </th>
                        <th>Requestor</th>
                        <th>Reason</th>
                        <th>Block</th>
                        <th>Block_remarks</th>
                        <th>Deblock</th>
                        <th>Deblock_remarks</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th width="5%"></th>
                        <th>Date</th>
                        <th>Cell </th>
                        <th>Site_name </th>
                        <th>Technology </th>
                        <th>Requestor</th>
                        <th>Reason</th>
                        <th>Block</th>
                        <th>Block_remarks</th>
                        <th>Deblock</th>
                        <th>Deblock_remarks</th>
                      </tr>
                    </tfoot>

                    <tbody></tbody>
                </div>
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
  <!-- <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


</body>

</html>

<!--jQuary-->
<script>
  $(document).ready(function() {

    function fetch_data(value) {
      $.ajax({
        processing: true,
        serverSide: true,
        url: "update_select.php",
        method: "POST",
        data: {
          value: value
        },
        dataType: "json",
        success: function(data) {
          var html = '';
          for (var count = 0; count < data.length; count++) {
            html += '<tr>';
            html += '<td><input type="checkbox" id="' + data[count].id + '" data-date="' + data[count].date + '" data-cell="' + data[count].cell + '" data-site_name="' + data[count].site_name + '" data-technology="' + data[count].technology + '" data-requestor="' + data[count].requestor + '" data-reason="' + data[count].reason + '" data-block="' + data[count].block + '" data-block_remarks="' + data[count].block_remarks + '" data-deblock="' + data[count].deblock + '" data-deblock_remarks="' + data[count].deblock_remarks + '" class="check_box"  /></td>';
            html += '<td>' + data[count].date + '</td>';
            html += '<td>' + data[count].cell + '</td>';
            html += '<td>' + data[count].site_name + '</td>';
            html += '<td>' + data[count].technology + '</td>';
            html += '<td>' + data[count].requestor + '</td>';
            html += '<td>' + data[count].reason + '</td>';
            html += '<td>' + data[count].block + '</td>';
            html += '<td>' + data[count].block_remarks + '</td>';
            html += '<td>' + data[count].deblock + '</td>';
            html += '<td>' + data[count].deblock_remarks + '</td></tr>';
          }
          $('tbody').html(html);
        }
      });
    }
    //cell,site_name,technology,requestor,reason
    //`block`, `block_by`, `block_time`, `block_remarks`, `deblock`, 
    //`deblock_date`, `deblock_time`, `deblock_remarks`, `active
    fetch_data();

    $('#search').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        fetch_data(search);
      } else {
        fetch_data();
      }
    });


    $(document).on('click', '.check_box', function() {
      var html = '';
      if (this.checked) {

        html = '<td><input type="checkbox" id="' + $(this).attr('id') + '" data-date="' + $(this).data('date') + '" data-cell="' + $(this).data('cell') + '" data-site_name="' + $(this).data('site_name') + '" data-technology="' + $(this).data('technology') + '" data-requestor="' + $(this).data('requestor') + '" data-reason="' + $(this).data('reason') + '" data-block="' + $(this).data('block') + '" data-block_remarks="' + $(this).data('block_remarks') + '" data-deblock="' + $(this).data('deblock') + '" data-deblock_remarks="' + $(this).data('deblock_remarks') + '" class="check_box" checked /></td>';
        html += '<td><input type="hidden" name="date[]" class="form-control" value="' + $(this).data("date") + '" />' + $(this).data("date") + '</td>';
        html += '<td><input type="hidden" name="cell[]" class="form-control" value="' + $(this).data("cell") + '" />' + $(this).data("cell") + '</td>';
        html += '<td><input type="hidden" name="site_name[]" class="form-control" value="' + $(this).data("site_name") + '" />' + $(this).data("site_name") + '</td>';
        html += '<td><input type="hidden" name="technology[]" class="form-control" value="' + $(this).data("technology") + '" />' + $(this).data("technology") + '</td>';
        html += '<td><input type="hidden" name="requestor[]" class="form-control" value="' + $(this).data("requestor") + '" />' + $(this).data("requestor") + '</td>';
        html += '<td><input type="hidden" name="reason[]" class="form-control" value="' + $(this).data("reason") + '" />' + $(this).data("reason") + '</td>';

        if (($(this).data("block") == 'Pending..')) {
          html += '<td><input type="hidden" name="block[]" class="form-control" value="Block" />Block</td>';
          //html += '<td><select name="block[]" id="block_'+$(this).attr('id')+'" class="form-control"><option value="'+$(this).data("block")+'" selected>Choose type</option><option value="Block">Block</option></select></td>';  
          html += '<td><input type="text" name="block_remarks[]" class="form-control" value="' + $(this).data("block_remarks") + '" /></td>';
          html += '<td><input type="hidden" name="deblock[]" class="form-control" value="' + $(this).data("deblock") + '" />' + $(this).data("deblock") + '</td>';
          html += '<td><input type="hidden" name="deblock_remarks[]" class="form-control" value="' + $(this).data("deblock_remarks") + '" />' + $(this).data("deblock_remarks") + '</td>';

        } else if (($(this).data("deblock") == 'Pending..')) {
          html += '<td><input type="hidden" name="block[]" class="form-control" value="' + $(this).data("block") + '" />' + $(this).data("block") + '</td>';
          html += '<td><input type="hidden" name="block_remarks[]" class="form-control" value="' + $(this).data("block_remarks") + '" />' + $(this).data("block_remarks") + '</td>';
          // html += '<td><select name="deblock[]" id="deblock_'+$(this).attr('id')+'" class="form-control"><option value="'+$(this).data("deblock")+'" selected>Choose type</option><option value="Deblock">Deblock</option></select></td>';  
          html += '<td><input type="hidden" name="deblock[]" class="form-control" value="Deblock" />Deblock</td>';
          html += '<td><input type="text" name="deblock_remarks[]" class="form-control" value="' + $(this).data("deblock_remarks") + '" />';


        }
        html += '<input type="hidden" name="hidden_id[]" value="' + $(this).attr('id') + '" /></td>';


      } else {
        html = '<td><input type="checkbox" id="' + $(this).attr('id') + '" data-date="' + $(this).data('date') + '" data-cell="' + $(this).data('cell') + '" data-site_name="' + $(this).data('site_name') + '" data-technology="' + $(this).data('technology') + '" data-requestor="' + $(this).data('requestor') + '" data-reason="' + $(this).data('reason') + '" data-block="' + $(this).data('block') + '" data-block_remarks="' + $(this).data('block_remarks') + '" data-deblock="' + $(this).data('deblock') + '" data-deblock_remarks="' + $(this).data('deblock_remarks') + '" class="check_box" /></td>';
        html += '<td>' + $(this).data('date') + '</td>';
        html += '<td>' + $(this).data('cell') + '</td>';
        html += '<td>' + $(this).data('site_name') + '</td>';
        html += '<td>' + $(this).data('technology') + '</td>';
        html += '<td>' + $(this).data('requestor') + '</td>';
        html += '<td>' + $(this).data('reason') + '</td>';
        html += '<td>' + $(this).data('block') + '</td>';
        html += '<td>' + $(this).data('block_remarks') + '</td>';
        html += '<td>' + $(this).data('deblock') + '</td>';
        html += '<td>' + $(this).data('deblock_remarks') + '</td>';
      }
      $(this).closest('tr').html(html);
      //$('#block'+$(this).attr('id')+'').val($(this).data('block'));
      $('#deblock' + $(this).attr('id') + '').val($(this).data('deblock'));
    });

    $('#update_form').on('submit', function(event) {
      event.preventDefault();
      if ($('.check_box:checked').length > 0) {
        $.ajax({
          url: "multiple_update.php",
          method: "POST",
          data: $(this).serialize(),
          success: function() {
            alert('Your Data Updated Successfull.');
            fetch_data();
            location.reload(true);
          }
        })
      }
    });

  });
</script>