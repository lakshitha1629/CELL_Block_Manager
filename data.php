<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cell_block_manager');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}


  //$date1=$_POST['date1'];
//  $date2=$_POST['date2'];
//query to get data from the table

$query = sprintf("SELECT CAST(`date` AS DATE) as a,COUNT(`block`) as b,COUNT(`deblock`) as c,COUNT(`date`) as d FROM cbm_cell_block GROUP BY CAST(`date` AS DATE)");
//$query = sprintf("SELECT CAST(`date` AS DATE) as a,COUNT(`block`) as b,COUNT(`deblock`) as c,COUNT(`date`) as d FROM cbm_cell_block WHERE `date` BETWEEN '$date1' AND '2019-09-15' GROUP BY CAST(`date` AS DATE)");
  //$query = sprintf("SELECT playerid, score, score2 FROM score ORDER BY playerid");
//SELECT CAST(`date` AS DATE) as a,COUNT(`block`) as b,COUNT(`deblock`) as c,COUNT(`date`) as d FROM cbm_cell_block GROUP BY CAST(`date` AS DATE)
//execute query
//$query = sprintf("SELECT CAST(`date` AS DATE) as a,COUNT(`block`) as b,COUNT(`deblock`) as c,COUNT(`date`) as d FROM cbm_cell_block WHERE `date` BETWEEN '2019-09-10' AND '2019-09-15' GROUP BY CAST(`date` AS DATE)");

$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
