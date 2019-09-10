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
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="Admin_dashboard.php">Welcome</a>

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
        <a class="nav-link" href="Admin_dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Admin_Summary.php">
          <i class="fas fa-chart-area"></i>
          <span>Daily Report</span></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Registration.php">
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
      <li class="nav-item active">
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
            <a href="Admin_dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

<!-- form --->
<div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-users"></i>
            Registration Form</div>
          <div class="card-body">
        <form method = "post" action = "">
            <div class="form-row">
              <div class="col-md-4 mb-3">  
                <label>Username :</label>
                <input type="text" name="name" class="form-control" placeholder="Enter the username" maxlength="10" required>
            </div>
            </div>
            <div class="form-row">
           <div class="col-md-4 mb-3">
                 <label>Password :</label>
                <input type="password" name="password1" class="form-control" placeholder="Enter the password" maxlength="30" required>
            </div>
            <div style="padding-right: 34px;">
            </div>
           <div class="col-md-4 mb-3">
                 <label>Confirm Password :</label>
                <input type="password" name="password2" class="form-control" placeholder="Enter the password again" maxlength="30" required>
            </div>
            </div>
            <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>User Type :</label>
                <select class="form-control" name="type" required>
                        <option value="" disabled selected>Choose User Type</option>
                        <option value="2">RNO Team Requestor</option>
                        <option value="3">INOC Team Leader</option>
                </select>
            </div>
            </div>  
                 
        <br>
<input class="btn btn-success" type=submit value="ADD" name="submit1">

</form>
</div>
<?php 

if(isset($_POST['submit1'])){ 
  require_once ('connect.php');
   //$date = $_POST['date'];
   $name = $_POST['name'];
   $password1 = $_POST['password1'];
   $password2 = $_POST['password2'];
   $type = $_POST['type'];
   $active='0';
   
   if ($password1 != $password2) {
    echo "The two passwords do not match";
}else{
    $password = md5($password1);
    $qry = "INSERT INTO `cbm_user_account`(`user_name`,`user_type`, `password`, `activated`) VALUES ('$name','$type','$password','$active')";
   //echo $qry;
   if (!mysqli_query($con,$qry))
     {
     die('Error: ' . mysqli_error());
     }
   echo "Registration Successfull";
  }
}
?>

</div>
        
          <!-- DataTables  -->
          <div class="card col-xl-12 col-sm-12 mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            User Table</div>
          <div class="card-body">
            <div class="table-responsive">
            <?php 
              
              require_once ('connect.php');

              $qry = "SELECT * FROM cbm_user_account WHERE `user_type`='2' OR `user_type`='3'";                  
               
              echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>   
                  <tr> 
                  <th>Username</th>
                  <th>User_Type</th>
                  <th>Activate</th>  
                  <th></th>         
                  </tr>
             </thead>';
               
              if ($res = $con->query($qry)) {
                  while ($row = $res->fetch_assoc()) {
                      $id=$row["user_id"];
                      $field1name = $row["user_name"];
                      $field2name = $row["user_type"];
                      $field3name = $row["activated"];
                      
if($field2name=='2'){
    echo "<tr> 
                                <td>".$field1name."</td> 
                                <td>RNO Team Requestor</td>";
                                if($field3name=='1'){
                                  echo "<td>Activate</td><td><a href=\"activate.php?id=".$row['user_id']."&active=".$row['activated']."\" type='button' class='btn btn-info'>Activate / Deactivate</a></td> 
             
                                  </tr>";
                                }else{
                                  echo "<td>Deactivate</td><td><a href=\"activate.php?id=".$row['user_id']."&active=".$row['activated']."\" type='button' class='btn btn-info'>Activate / Deactivate</a></td> 
             
                                  </tr>";
                                }
                                
}else{
                     // `user_name`,`user_type`, `password`, `activated`            
                      echo "<tr> 
                                <td>".$field1name."</td> 
                                <td>INOC Team Leader</td>";
                                if($field3name=='1'){
                                  echo "<td>Activate</td><td><a href=\"activate.php?id=".$row['user_id']."&active=".$row['activated']."\" type='button' class='btn btn-info'>Activate / Deactivate</a></td> 
             
                                  </tr>";
                                }else{
                                  echo "<td>Deactivate</td><td><a href=\"activate.php?id=".$row['user_id']."&active=".$row['activated']."\" type='button' class='btn btn-info'>Activate / Deactivate</a></td> 
             
                                  </tr>";
                                }
}
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
