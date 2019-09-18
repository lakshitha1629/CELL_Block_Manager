
<?php
require_once ('PDO.php');
//$connect = new PDO("mysql:host=localhost;dbname=cell_block_manager", "root", "");
//$query = "SELECT * FROM cbm_cell_block ORDER BY id DESC";
//SELECT * FROM cbm_cell_block WHERE `block`='pending..' OR `deblock`='pending..' ORDER BY id DESC
$query = "SELECT * FROM cbm_cell_block WHERE `block`='Pending..' OR `deblock`='pending..' ORDER BY date DESC";

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
