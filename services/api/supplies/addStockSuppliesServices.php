<?php
require_once('../../../include/condb.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


$input = file_get_contents("php://input");
$postRequest = json_decode($input);
// print_r($postRequest[0]->USERS_ID);
$UNIT = $postRequest->UNIT;
$SUPPLIES_ID = $postRequest->ID;

$sql = "INSERT INTO stock (UNIT , SUPPLIES_ID) VALUES ('$UNIT' , '$SUPPLIES_ID')";
$result = mysqli_query($condb, $sql) or die("Error in query: $sql" . mysqli_error());


print_r($result);
