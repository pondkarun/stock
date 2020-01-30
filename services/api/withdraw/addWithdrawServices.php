<?php
require_once('../../../include/condb.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


$input = file_get_contents("php://input");
$postRequest = json_decode($input);
// print_r($postRequest[0]->USERS_ID);
$USERS_ID = $postRequest[0]->USERS_ID;

$sql = "INSERT INTO withdraw (USERS_ID) VALUES ('$USERS_ID')";
$result = mysqli_query($condb, $sql) or die("Error in query: $sql" . mysqli_error());
$last_id = mysqli_insert_id($condb); // คืนค่า id ที่ insert ล่าสุด

$countPostRequest = count($postRequest);
for ($i = 0; $i < $countPostRequest; $i++) {

  $statement = array(
    @$postRequest[$i]->SUPPLIES_ID,
    @$postRequest[$i]->UNIT
  );
  // print_r($statement[2]);
  $sql = "INSERT INTO map_withdraw_supplies (

        WITHDRAW_ID,
        SUPPLIES_ID,
        UNIT

      )VALUES(

        '$last_id',
        '$statement[0]',
        '$statement[1]'

      )";


  $result = mysqli_query($condb, $sql) or die("Error in query: $sql" . mysqli_error());
}

print_r($last_id);
