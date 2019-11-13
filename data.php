<?php
//setting header to json
header('Content-Type: application/json');
require_once ('connect.php');
//database
// define('DB_HOST', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'cell_block_manager');

//get connection
//$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$con){
  die("Connection failed: " . $con->error);
}


  //$date1=$_POST['date1'];
//  $date2=$_POST['date2'];
//query to get data from the table
// $query = sprintf("SELECT CAST(`date` AS DATE) as a,COUNT(`block`) as b,COUNT(`deblock`) as c,COUNT(`date`) as d FROM cbm_cell_block WHERE MONTH(`date`) = MONTH(NOW()) GROUP BY CAST(`date` AS DATE)");
$query = sprintf("SELECT CAST(`date` AS DATE) as a,
(SELECT COUNT(`block`) FROM cbm_cell_block WHERE MONTH(`date`) = MONTH(NOW()) AND `block`='Block' GROUP BY CAST(`date` AS DATE))as b,
(SELECT COUNT(`deblock`) FROM cbm_cell_block WHERE MONTH(`date`) = MONTH(NOW()) AND `block`='Deblock' GROUP BY CAST(`date` AS DATE))as c,
(SELECT COUNT(`date`) FROM cbm_cell_block WHERE MONTH(`date`) = MONTH(NOW()) GROUP BY CAST(`date` AS DATE)) as d 
FROM cbm_cell_block WHERE MONTH(`date`) = MONTH(NOW()) GROUP BY CAST(`date` AS DATE)");

$result = $con->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$con->close();

//now print the data
print json_encode($data);
?>