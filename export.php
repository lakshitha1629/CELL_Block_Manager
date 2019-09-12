<?php 
  require_once ('connect.php');
  //$query = "SELECT * FROM cbm_cell_block WHERE `date` BETWEEN '$date1' AND '$date2'";
 // $date = date('Y-m-d');
  //$date1=$_POST['date1'];
  //$date2=$_POST['date2'];
  $output = "";

if(isset($_POST['export'])){ 
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
   $query = "SELECT * FROM cbm_cell_block WHERE `date` BETWEEN '$date1' AND '$date2'";
   $result = mysqli_query($con, $query);
   if(mysqli_num_rows($result) > 0)
   {
    $output .= "
     <table class='table' bordered='1'>  
     <tr> 
     <th>Date</th> 
     <th>Cell </th> 
     <th>Site_name </th> 
     <th>Technology </th> 
     <th>Requestor</th> 
     <th>Reason</th> 
     <th>Block</th>
     <th>Block_by</th>
     <th>Block_time</th>
     <th>Block_remarks</th>          
     <th>Deblock</th>
     <th>Deblock_by</th>
     <th>Deblock_time</th>        
     <th>Deblock_remarks</th> 
         </tr>
    ";
    while($row = mysqli_fetch_array($result))
    {
                  $output .= "<tr> 
                                <td>".$row['date']."</td> 
                                <td>".$row['cell']."</td> 
                                <td>".$row['site_name']."</td> 
                                <td>".$row['technology']."</td> 
                                <td>".$row['requestor']."</td> 
                                <td>".$row['reason']."</td>
                                <td>".$row['block']."</td> 
                                <td>".$row['block_by']."</td> 
                                <td>".$row['block_time']."</td> 
                                <td>".$row['block_remarks']."</td> 
                                <td>".$row['deblock']."</td> 
                                <td>".$row['deblock_by']."</td>
                                <td>".$row['deblock_time']."</td> 
                                <td>".$row['deblock_remarks']."</td> 
                                </tr>";
    }
    $output .= "</table>";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=Mobitel_INOC_CELL_Report.xls');
    echo $output;
   }else{
     echo "Enter the correct date range";
   }
  }
  ?>