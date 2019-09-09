<?php

//$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");
$connect = new PDO("mysql:host=localhost;dbname=cell_block_manager", "root", "");


if(isset($_POST['hidden_id']))
{
 
 $block = $_POST['block'];
 $block_time =
 $block_remarks = $_POST['block_remarks'];
 $deblock = $_POST['deblock'];
 $deblock_remarks = $_POST['deblock_remarks'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
     //`block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`
  $data = array(
   
   ':block'   => $block[$count],
   ':block_remarks'  => $block_remarks[$count],
   ':deblock' => $deblock[$count],
   ':deblock_remarks'   => $deblock_remarks[$count],
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE cbm_cell_block 
  SET block = :block, block_remarks = :block_remarks, deblock = :deblock, deblock_remarks = :deblock_remarks
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data); 
  header("Location: dashboard.php");
 }
 
}

?>
<!-- , address = :address, block = :block, deblock = :deblock, deblock_remarks = :deblock_remarks  -->

