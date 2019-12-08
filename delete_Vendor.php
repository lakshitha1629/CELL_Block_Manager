<?php
require_once ('connect.php');

$id = $_GET['id']; // $id is now defined

// column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($con,"DELETE FROM cbm_cell_block WHERE id='".$id."' AND ((`block`='Approval_Pending..' AND `deblock`='') OR (`block`='' AND `deblock`='Approval_Pending..'))");

  mysqli_close($con);
  header("Location: dashboard_Vendor.php");
?> 
