<?php
  require_once ('connect.php');

  $searchTerm = $_GET['term']; 

$query = $con->query("SELECT * FROM cbm_cell_block WHERE `cell` LIKE '%".$searchTerm."%' GROUP BY `cell` ORDER BY `cell` ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['cell'];
}
//return json data
echo json_encode($data);
?>
