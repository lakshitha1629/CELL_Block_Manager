<?php session_start();?>
<?php
if(isset($_POST["submit"]))
{
    require_once ('connect.php');
    $id = $_SESSION['cell_id'];
    //$id=$_GET['cell_id'];
    $block_type=$_POST['block_type'];
    $Block_remarks = $_POST['Block_remarks'];
    $Deblock_remarks = $_POST['Deblock_remarks'];
    
   // `block_remarks`=[value-11],`deblock`=[value-12],`deblock_date`=[value-13],`deblock_remarks`=[value-15]
    mysqli_query($con,"UPDATE `cbm_cell_block` SET `block`='".$block_type."',`block_remarks`='".$Block_remarks."',`deblock_remarks`='".$Deblock_remarks."' WHERE `cell_id`='".$id."'"); 
     mysqli_close($con);
    header("Location: dashboard.php");
   // `block_remarks`=[value-11],`deblock`=[value-12],`deblock_date`=[value-13],`deblock_remarks`=[value-15]

}

 ?>

