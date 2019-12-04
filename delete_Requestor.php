<?php
require_once ('connect.php');

$id = $_GET['id']; // $id is now defined

mysqli_query($con,"DELETE FROM cbm_cell_block WHERE id='".$id."' AND ((`block`='pending..' AND `deblock`='') OR (`block`='' AND `deblock`='pending..')) ");

  mysqli_close($con);
  header("Location: dashboard_Requestor.php");
?> 