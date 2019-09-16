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
      <li class="nav-item active">
        <a class="nav-link" href="dashboard_Requestor.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
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
                    <input type="file" name="excelfile" id="excelfile" class="" >
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

require_once ('connect.php');
require_once ('Spout/Autoloader/autoload.php');

if(!empty($_FILES['excelfile']['name']))
{

    $pathinfo = pathinfo($_FILES['excelfile']['name']);

    if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')
        && $_FILES['excelfile']['size'] > 0 )
    {
        $file = $_FILES['excelfile']['tmp_name'];

        $reader = ReaderFactory::create(Type::XLSX);

        $reader->open($file);
        $count = 0;

        foreach ($reader->getSheetIterator() as $sheet)
        {

            foreach ($sheet->getRowIterator() as $row)
            {

                if ($count > 0) {

                  date_default_timezone_set('Asia/Colombo');

                    $date = date('Y-m-d H:i:s');
                    $cell = $row[0];
                    $site_name = $row[1];
                    $technology = $row[2];
                  // $requestor = $row[3];
                    $requestor = $_SESSION['user_name'];
                    $reason = $row[3];
                    $block ='Pending..';
                    $active='1';

                    $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `active`, `block`) VALUES ('$date','$cell','$site_name','$technology','$requestor','$reason','$active','$block')";
                    $res = mysqli_query($con,$qry);

                }
                $count++;
            }
        }

        if($res)
        {
            echo "Your file Uploaded Successfull";
        }
        else
        {
            echo "Your file Uploaded Failed";
        }

        $reader->close();
    }
    else
    {
        echo "Please Choose only Excel file";
    }
}
else
{
//echo "test";
}

?>

            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
            
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
            Use this table format:- <form><input type="button" value="Download Template" onClick="window.location.href='downloads/Template.xlsx'" class="btn btn-info"></form><hr>
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead style="background-color: aliceblue;"> 
                  <tr> 
                  <th>Cell </th> 
                  <th>Site_name </th> 
                  <th>Technology </th>
                  <th>Reason</th>
                </tr></thead>
                
                <tr> 
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
                </tr>
                </table>
                    
                
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
        <form method = "post" action = "">
            <div class="form-row">
              <div class="col-md-4 mb-3">  
                <label>Date :</label>
                <input type="text" name="date" class="form-control" placeholder="<?php echo date("Y/m/d");?>" maxlength="10" readonly>
            </div>
            <div class="col-md-4 mb-3">
                <label>Cell :</label>
                <input type="text" name="cell" class="form-control" placeholder="Cell Name" maxlength="20">
            </div>
        <div class="col-md-4 mb-3">
                 <label>Site Name :</label>
                <input type="text" name="site" class="form-control" placeholder="Site Name" maxlength="30">
            </div>
            </div>
        <div class="form-row">
         <div class="col-md-4 mb-3">
                 <label>Technology :</label>
                <input type="text" name="technology" class="form-control" placeholder="BSC/RNC/4G/3G" maxlength="10">
            </div>
         <div class="col-md-4 mb-3">
         <label>Requestor :</label>
         <input type="text" name="requestor" class="form-control" placeholder="<?php echo $_SESSION['user_name'];?>" maxlength="40" readonly>
    </div>
    </div>

    <div class="form-row">
   <div class="col-md-12 mb-3">
                 <label>Reason :</label>
                <input type="text" name="reason" class="form-control" placeholder="Reason" maxlength="100">
            </div>
    </div>
<input class="btn btn-success" type=submit value="ADD" name="submit1">

</form>
<?php 

if(isset($_POST['submit1'])){ 
  require_once ('connect.php');
  date_default_timezone_set('Asia/Colombo');
  $date = date('Y-m-d H:i:s');
   //$date = $_POST['date'];
   $cell = $_POST['cell'];
   $site_name = $_POST['site'];
   $technology = $_POST['technology'];
   $requestor = $_SESSION['user_name'];
   $reason = $_POST['reason'];
   $block ='Pending..';
   $active='1';
   //`id`, `date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`, `active`
   $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `active`, `block`) VALUES ('$date','$cell','$site_name','$technology','$requestor','$reason','$active','$block')";
   //echo $qry;
   if (!mysqli_query($con,$qry))
     {
     die('Error: ' . mysqli_error());
     }
   echo "Your record added Successfull";
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
<?php 
              
require_once ('connect.php');
$user = $_SESSION['user_name'];
$qry = "SELECT * FROM cbm_cell_block WHERE `requestor`='$user' AND block='Pending..' OR deblock='' OR deblock='Pending..'";           
 
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
    <th>Deblock</th>
    <th></th> 
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
        $field8name = $row["deblock"];
        						
        echo "<tr> 
                  <td>".$field1name."</td> 
                  <td>".$field2name."</td> 
                  <td>".$field3name."</td> 
                  <td>".$field4name."</td> 
                  <td>".$field5name."</td> 
                  <td>".$field6name."</td>
                  <td>".$field7name."</td>
                  <td>".$field8name."</td>
                  <td><a onClick=\"return confirm('Are you sure you want to deblock?')\" href=\"deblock_Requestor.php?id=".$row['id']."\" type='button' class='btn btn-info'>Deblock Req.</a>
                  <a onClick=\"return confirm('Are you sure you want to delete?')\" href=\"delete_Requestor.php?id=".$row['id']."\" type='button' class='btn btn-danger'>Delete</a>
                  </td> 
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


</body>

</html>
