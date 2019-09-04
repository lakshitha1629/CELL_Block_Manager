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
        <a class="nav-link" href="dashboard_Requestor.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
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
            
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            
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

                    $date = date('Y-m-d');
                    $cell = $row[0];
                    $site_name = $row[1];
                    $controller = $row[2];
                    $requestor = $row[3];
                    $reason = $row[4];

                    $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `controller`, `requestor`, `reason`) VALUES ('$date','$cell','$site_name','$controller','$requestor','$reason')";
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
                <input type="text" name="cell" class="form-control" placeholder="Cell Number" maxlength="20">
            </div>
        <div class="col-md-4 mb-3">
                 <label>Site Name :</label>
                <input type="text" name="site" class="form-control" placeholder="Site Name" maxlength="30">
            </div>
            </div>
        <div class="form-row">
         <div class="col-md-4 mb-3">
                 <label>Controller :</label>
                <input type="text" name="controller" class="form-control" placeholder="BSC/RNC" maxlength="10">
            </div>
         <div class="col-md-4 mb-3">
         <label>Requestor :</label>
         <input type="text" name="requestor" class="form-control" placeholder="Requestor Name" maxlength="40">
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
  $date = date('Y-m-d');
   //$date = $_POST['date'];
   $cell = $_POST['cell'];
   $site_name = $_POST['site'];
   $controller = $_POST['controller'];
   $requestor = $_POST['requestor'];
   $reason = $_POST['reason'];
   
   $qry = "INSERT INTO `cbm_cell_block`(`date`, `cell`, `site_name`, `controller`, `requestor`, `reason`) VALUES ('$date','$cell','$site_name','$controller','$requestor','$reason')";
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
    <th>Delete</th> 
        </tr></thead>';
 
if ($res = $con->query($qry)) {
    while ($row = $res->fetch_assoc()) {
        $id=$row["cell_id"];
        $field1name = $row["date"];
        $field2name = $row["cell"];
        $field3name = $row["site_name"];
        $field4name = $row["controller"]; 
        $field5name = $row["requestor"];
        $field6name = $row["reason"]; 
        						
        echo "<tr> 
                  <td>".$field1name."</td> 
                  <td>".$field2name."</td> 
                  <td>".$field3name."</td> 
                  <td>".$field4name."</td> 
                  <td>".$field5name."</td> 
                  <td>".$field6name."</td>
                  <td><a onClick=\"return confirm('Are you sure you want to delete?')\" href=\"delete_Requestor.php?id=".$row['cell_id']."\" type='button' class='btn btn-danger'>Delete</a></td> 
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
