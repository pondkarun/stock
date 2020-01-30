<meta charset="utf-8">
<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;
session_start();
if (isset($_POST['username'])) {

    include('../include/condb.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE USERNAME='$username' AND password='$password' ";

    $result = mysqli_query($condb, $sql);


    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);
        $_SESSION["ID"] = $row["ID"];
        $_SESSION["login"] = 'in';
        $_SESSION["STATUS"] = $row["STATUS"];

        Header("Location: ../index.php");
    } else {

        echo "<script>";
        echo "alert(\" ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {

    Header("Location: login.php");
}
?>