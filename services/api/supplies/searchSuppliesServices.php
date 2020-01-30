<?php
require_once('../../../include/condb.php');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


try {

    $query = "SELECT * ,
    (SELECT SUM(UNIT)  FROM stock WHERE  SUPPLIES_ID = s.ID) AS UNIT_STOCK,
    (SELECT SUM(UNIT) FROM map_withdraw_supplies WHERE SUPPLIES_ID = s.ID) AS UNIT_WITHDRAW
    FROM supplies AS s";
    $result = $condb->query($query) or die($condb->error);

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
} catch (PDOException $e) {

    echo $e->getMessage();
}
