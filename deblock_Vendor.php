<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

require_once ('connect.php');

$id = $_GET['id']; 
$req=$_SESSION['user_name'];// $id is now defined

// column is indeed an int
// $id = (int)$_GET['id'];

//mysqli_query($con,"DELETE FROM cbm_cell_block WHERE id='".$id."'");z
mysqli_query($con,"UPDATE `cbm_cell_block` SET deblock='Approval_Pending..',`requestor`='".$req."' WHERE `id` = '".$id."' AND `block`='Block'");
// echo mysqli_affected_rows($con);
// if(mysqli_affected_rows($con) == '0')
//   {
      
//     echo ("<script language='javascript'>
//              window.alert('Still not blocked.. Can't deblock recode!')
//              window.location.href='javascript:history.back()'
//            </script>");
//            mysqli_close($con);
//   }
//   else
//   {
//     echo ("<script language='javascript'>
//              window.alert('Send a Deblock Request')
//              window.location.href='dashboard_Requestor.php'
//            </script>");
//            mysqli_close($con);
//   } 
mysqli_close($con);
header("Location: dashboard_Vendor.php");
?> 