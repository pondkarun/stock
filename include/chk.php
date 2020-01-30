<?php
session_start();

include('condb.php');
if ($_SESSION["STATUS"]  != 'admin') {
    session_destroy();
    echo "<script type='text/javascript'>";
    echo "window.location='login/';";
    echo "</script>";
}

$sql = "SELECT  NAME , SERNAME FROM users WHERE ID = $_SESSION[ID] ";
$result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error());
$sqlfullname = mysqli_fetch_array($result);
extract($sqlfullname);

$fullname = $sqlfullname["NAME"] . " " . $sqlfullname["SERNAME"];
