<?php
require_once('connect.php');

$id = $_GET['id']; // $id is now defined

$qry1 = "SELECT * FROM `cbm_cell_block` WHERE `id`='$id'";

$res1 = $con->query($qry1);

if (mysqli_num_rows($res1) == 1) {

  while ($data1 = $res1->fetch_assoc()) {
                  $block = $data1['block'];
                  $deblock = $data1['deblock'];

                  if($block=="Block"){
                    mysqli_query($con, "UPDATE `cbm_cell_block` SET deblock='Pending..' WHERE `id` = '" . $id . "' AND `block`='Block'");


                  }elseif($deblock=="Deblock"){
                    mysqli_query($con, "UPDATE `cbm_cell_block` SET `block`='Pending..' WHERE `id` = '" . $id . "' AND `deblock`='Deblock'");

                  }
                }

            }

mysqli_close($con);
header("Location: dashboard_Requestor.php");


?>