<?php
session_start();
require_once ('PDO.php');

if(isset($_POST['hidden_id']))
{
date_default_timezone_set('Asia/Colombo');
 $deblock_time = date('Y-m-d H:i:s'); 
 $block_time = date('Y-m-d H:i:s');
 $block = $_POST['block'];
 $block_by = $_SESSION['user_name'];
 $block_remarks = $_POST['block_remarks'];
 $deblock = $_POST['deblock'];
 $deblock_by = $_SESSION['user_name'];
 $deblock_remarks = $_POST['deblock_remarks'];
 $id = $_POST['hidden_id'];

 for($count = 0; $count < count($id); $count++)
 {
  if(($block[$count]=='Block')){
     //`block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`
  $data = array(
   
   ':block'   => $block[$count],
   ':block_remarks'  => $block_remarks[0],
   ':block_time'   => $block_time,
   ':block_by'   => $block_by,
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE cbm_cell_block 
  SET block = :block, block_remarks = :block_remarks, block_time = :block_time, block_by = :block_by
  WHERE id = :id
  ";
  
 }elseif(($deblock[$count]=='Deblock')){
    $data = array(
   
        ':deblock' => $deblock[$count],
        ':deblock_remarks'   => $deblock_remarks[0],
        ':deblock_by'   => $deblock_by,
        ':deblock_time'   => $deblock_time,
        ':id'   => $id[$count]
       );
    $query = "
  UPDATE cbm_cell_block 
  SET deblock = :deblock, deblock_remarks = :deblock_remarks, deblock_by = :deblock_by, deblock_time = :deblock_time
  WHERE id = :id AND deblock = 'Pending..'
  ";

  }
  $statement = $connect->prepare($query);
  $statement->execute($data); 
  header("Location: dashboard.php");
 }
 
}

?>
