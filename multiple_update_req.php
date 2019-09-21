<?php
session_start();
require_once ('PDO.php');


if(isset($_POST['hidden_id']))
{
date_default_timezone_set('Asia/Colombo');
 $deblock_time = date('Y-m-d H:i:s'); 
 $block_time = date("H:i:s");
 $requestor = $_POST['requestor'];
 $approve = $_SESSION['user_name'];
 $block = $_POST['block'];
 $deblock = $_POST['deblock'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  if(($block[$count]=='Block')&&($deblock[$count]=='Pending..')){
     //`block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`
 
     $data = array(
   
        ':deblock' => $deblock[$count],
        ':id'   => $id[$count]
       );
    $query = "
  UPDATE cbm_cell_block 
  SET deblock = :deblock
  WHERE id = :id 
  ";

 }else{
    $data = array(
   
        ':block'   => $block[$count],
        ':id'   => $id[$count]
       );
       $query = "
       UPDATE cbm_cell_block 
       SET block = :block
       WHERE id = :id
       ";
    

  }
  $statement = $connect->prepare($query);
  $statement->execute($data); 
  header("Location: Vender_Request.php");
 }
 
}

?>
