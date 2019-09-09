<?php
session_start();
//$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");
$connect = new PDO("mysql:host=localhost;dbname=cell_block_manager", "root", "");


if(isset($_POST['hidden_id']))
{
date_default_timezone_set('Asia/Colombo');
 $deblock_time = date('Y-m-d H:i:s'); 
 $block_time = date("H:i:s");
 $block = $_POST['block'];
 $block_by = $_SESSION['user_name'];
 $block_remarks = $_POST['block_remarks'];
 $deblock = $_POST['deblock'];
 $deblock_by = $_SESSION['user_name'];
 $deblock_remarks = $_POST['deblock_remarks'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
     //`block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_date`, `deblock_time`, `deblock_remarks`
  $data = array(
   
   ':block'   => $block[$count],
   ':block_remarks'  => $block_remarks[$count],
   ':block_time'   => $block_time,
   ':block_by'   => $block_by,
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE cbm_cell_block 
  SET block = :block, block_remarks = :block_remarks, block_time = :block_time, block_by = :block_by
  WHERE id = :id
  ";

  if($deblock[$count]=='Deblock'){
    $data = array(
   
        ':deblock' => $deblock[$count],
        ':deblock_remarks'   => $deblock_remarks[$count],
        ':deblock_by'   => $deblock_by,
        ':deblock_time'   => $deblock_time,
        ':deblock_remarks'   => $deblock_remarks[$count],
        ':id'   => $id[$count]
       );
    $query = "
  UPDATE cbm_cell_block 
  SET deblock = :deblock, deblock_remarks = :deblock_remarks, deblock_by = :deblock_by, deblock_time = :deblock_time
  WHERE id = :id
  ";

  }elseif($deblock[$count]!='Deblock'){
    $data = array(
   
      ':deblock' => ' ',
      ':deblock_remarks'   => ' ',
      ':deblock_by'   => ' ',
      ':deblock_time'   => NULL,
      ':deblock_remarks'   => ' ',
      ':id'   => $id[$count]
     );
  $query = "
UPDATE cbm_cell_block 
SET deblock = :deblock, deblock_remarks = :deblock_remarks, deblock_by = :deblock_by, deblock_time = :deblock_time
WHERE id = :id
";

  }
  $statement = $connect->prepare($query);
  $statement->execute($data); 
  header("Location: dashboard.php");
 }
 
}

?>
