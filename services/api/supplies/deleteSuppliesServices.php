<?php
require_once('../../../include/condb.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');


$input = file_get_contents("php://input");
$ID = json_decode($input);

$sql = " UPDATE supplies SET  IS_USE = 'false' WHERE ID = '$ID '";
$result = mysqli_query($condb, $sql) or die("Error in query: $sql" . mysqli_error());

print_r($result);
