<?php
session_start();
require_once ('PDO.php');


if(isset($_POST['hidden_id']))
{
   date_default_timezone_set('Asia/Colombo');
   $deblock_time = date('Y-m-d H:i:s'); 
   $block_time = date('Y-m-d H:i:s');
   $requestor = $_POST['requestor'];
   $approval = $_SESSION['user_name'];
   $block = $_POST['block'];
   $deblock = $_POST['deblock'];
   $id = $_POST['hidden_id'];
   for($count = 0; $count < count($id); $count++)
   {
  if($deblock[$count]=='Pending..'){
   //`block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`
 
     $data = array(
        ':requestor' => $requestor[$count].' (approved by '.$approval.')',
        ':deblock' => $deblock[$count],
        ':id'   => $id[$count]
       );
    $query = "
  UPDATE cbm_cell_block 
  SET deblock = :deblock,requestor = :requestor
  WHERE id = :id 
  ";

 }elseif($block[$count]=='Pending..'){
    $data = array(
        ':requestor' => $requestor[$count].' (approved by '.$approval.')',
        ':block'   => $block[$count],
        ':id'   => $id[$count]
       );
       $query = "
       UPDATE cbm_cell_block 
       SET block = :block,requestor = :requestor
       WHERE id = :id
       ";
    

  }
  $statement = $connect->prepare($query);
  $statement->execute($data); 
  header("Location: Vendor_Request.php");
 }
 
}

?>
