<?php
require_once ('connect.php');

//$id = $_GET['id']; // $id is now defined

// column is indeed an int
// $id = (int)$_GET['id'];
$block=$_GET["block"];

//mysql_query("INSERT INTO cbm_cell_block (block) VALUES ('$block')"); 
//SELECT block FROM cbm_cell_block WHERE cell_id='".$id."'"); 

//echo " Added Successfully ";
$data=$_GET['foo'];
if($data=="Block")
{
 echo "selected value is option1";    // add sql operation here if option 1
    // mysqli_query($con,"INSERT INTO cbm_cell_block (block) VALUES ('Block')");
    // mysqli_close($con);
    // header("Location: dashboard.php");

}
else if($data=="Unblock")
{
    echo "selected value is option2";  
    // mysqli_query($con,"INSERT INTO cbm_cell_block (block) VALUES ('Unblock')");
    // mysqli_close($con);
    // header("Location: dashboard.php");
}

?> 