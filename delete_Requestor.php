<?php
require_once ('connect.php');

$id = $_GET['id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($con,"DELETE FROM cbm_cell_block WHERE cell_id='".$id."'");
mysqli_close($con);
header("Location: dashboard_Requestor.php");
?> 