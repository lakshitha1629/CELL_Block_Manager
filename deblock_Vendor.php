<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

require_once ('connect.php');

$id = $_GET['id']; 
$req=$_SESSION['user_name'];// $id is now defined

// mysqli_query($con,"UPDATE `cbm_cell_block` SET deblock='Approval_Pending..',`requestor`='".$req."' WHERE `id` = '".$id."' AND `block`='Block'");

$qry1 = "SELECT * FROM `cbm_cell_block` WHERE `id`='$id'";

$res1 = $con->query($qry1);

if (mysqli_num_rows($res1) == 1) {

  while ($data1 = $res1->fetch_assoc()) {
                  $block = $data1['block'];
                  $deblock = $data1['deblock'];

                  if($block=="Block" && $deblock==""){
                    mysqli_query($con, "UPDATE `cbm_cell_block` SET deblock='Approval_Pending..',`requestor`='".$req."' WHERE `id` = '" . $id . "' AND `block`='Block'");


                  }elseif($deblock=="Deblock" && $block==""){
                    mysqli_query($con, "UPDATE `cbm_cell_block` SET `block`='Approval_Pending..',`requestor`='".$req."' WHERE `id` = '" . $id . "' AND `deblock`='Deblock'");

                  }
                }

			}
			
mysqli_close($con);
header("Location: dashboard_Vendor.php");
?> 