
<?php
require_once ('PDO.php');
//$connect = new PDO("mysql:host=localhost;dbname=cell_block_manager", "root", "");
//$query = "SELECT * FROM cbm_cell_block ORDER BY id DESC";
//SELECT * FROM cbm_cell_block WHERE `block`='pending..' OR `deblock`='pending..' ORDER BY id DESC
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
  OR deblock_by LIKE '%" . $search . "%') AND (`block`='Approval_Pending..' OR `deblock`='Approval_Pending..')";
} else {
$query = "SELECT * FROM cbm_cell_block WHERE `block`='Approval_Pending..' OR `deblock`='Approval_Pending..' ORDER BY id DESC";
}


$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);
}

?>
