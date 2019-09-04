<?php
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
 


?>