<?php

//$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");
$connect = new PDO("mysql:host=localhost;dbname=cell_block_manager", "root", "");


if(isset($_POST['hidden_id']))
{
 $block = $_POST['block'];
 $block_by = $_POST['block_by'];
 $deblock = $_POST['deblock'];
 $deblock_remarks = $_POST['deblock_remarks'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':block'   => $block[$count],
   ':block_by'  => $block_by[$count],
   ':deblock' => $deblock[$count],
   ':deblock_remarks'   => $deblock_remarks[$count],
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE cbm_cell_block 
  SET block = :block, block_by = :block_by, deblock = :deblock, deblock_remarks = :deblock_remarks
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>
<!-- , address = :address, block = :block, deblock = :deblock, deblock_remarks = :deblock_remarks  -->

