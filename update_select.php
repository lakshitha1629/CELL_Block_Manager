
<?php
require_once('PDO.php');

if (isset($_POST["value"])) {
    $search = $_POST["value"];
    $query = "
  SELECT * FROM cbm_cell_block 
  WHERE (cell LIKE '%" . $search . "%'
  OR site_name LIKE '%" . $search . "%' 
  OR technology LIKE '%" . $search . "%' 
  OR requestor LIKE '%" . $search . "%' 
  OR reason LIKE '%" . $search . "%'
  OR block LIKE '%" . $search . "%'
  OR block_by LIKE '%" . $search . "%'
  OR deblock LIKE '%" . $search . "%'
  OR deblock_by LIKE '%" . $search . "%') AND (`block`='Pending..' OR `deblock`='pending..')";
} else {
    $query = "SELECT * FROM cbm_cell_block WHERE `block`='Pending..' OR `deblock`='Pending..' ORDER BY id DESC";
}



$statement = $connect->prepare($query);

if ($statement->execute()) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data);
}

?>