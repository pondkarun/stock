<?php
include('include/chk.php');
function DateThai($day)
{
    $Year = date("Y", strtotime($day)) + 543;
    $Month = date("n", strtotime($day));
    $Day = date("j", strtotime($day));
    $MonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $MonthThai = $MonthCut[$Month];
    return "$Day $MonthThai พ.ศ. $Year";
}

$sql = "SELECT * , w.ID as ID_W  FROM withdraw AS w INNER JOIN users AS u ON w.USERS_ID = u.ID WHERE w.ID = $_GET[ID] ";
$result = mysqli_query($condb, $sql);
$row_view = mysqli_fetch_array($result);
extract($row_view);

$query = "SELECT * FROM map_withdraw_supplies AS a
INNER JOIN withdraw AS b ON a.WITHDRAW_ID = b.ID
INNER JOIN supplies AS c ON a.SUPPLIES_ID = c.ID
WHERE a.WITHDRAW_ID = $_GET[ID]";
$result = mysqli_query($condb, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ใบเบิกพัสดุ</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/css/main.css">

</head>

<body class="container" onload="window.print()">
    <div class="s1">
        <h3>ใบเบิกพัสดุ</h3>
        <h4>คณะวิทยาการจัดการ</h4>
        <h4>มหาวิทยาลัยราชภัฏจันทรเกษม</h4>
    </div>

    <div class="s2">
        <p>วันที่ <?php echo DateThai($row_view['DATETIME']); ?></p>
        <p>เลขที่ <?php echo $row_view['ID_W']; ?></p>
    </div>

    <div class="s3">
        <p>เรียน หัวหน้างานพัสดุ</p>
        <p style="padding-left: 50px;"> ข้าพเจ้า.....................................................................................................................................................................................................................................................................................
        </p>
        <p>หน่วยงานคณะวิทยาการจัดการ ขอเบิกวัสดุ ตามรายการข้างล้างนี้ เพื่อนำไปใช้ในราชการ ของคณะวิทยาการจัดการ มีรายการ ดังนี้</p>
        <p></p>
    </div>

    <div class="s4 ">
        <table class="table table-bordered">
            <tr>
                <th width="10% ">ลำดับ</th>
                <th width="50% ">รายการ</th>
                <th width="10% ">รหัส</th>
                <th width="10% ">จำนวน</th>
                <th width="10% ">หน่วยนับ</th>
                <th width="10% ">หมายเหตุ</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td align="center "><?php echo ++$i; ?></td>
                    <td style="padding-left: 5px; "><?php echo $row['SUPPLIES_NAME']; ?></td>
                    <td align="center "><?php echo $row['SUPPLIES_ID']; ?></td>
                    <td align="center "><?php echo $row['UNIT']; ?></td>
                    <td align="center "><?php echo number_format($row['PRICE'] * $row['UNIT'], 2); ?></td>
                    <td align="center "></td>
                </tr>
            <?php } ?>

        </table>
    </div>



    <div class="s5 row ">
        <div class="col-xs-6 ">
            <p>ลงชื่อ...............................................ผู้รับพัสดุ</p>
            <p>(.....................................................................)</p>
        </div>
        <div class="col-xs-6 ">
            <p>ลงชื่อ...............................................ผู้จ่ายพัสดุ</p>
            <p>(.....................................................................)</p>
        </div>
    </div>

    <div class="s6 ">
        <p>ลงชื่อ ....................................................................... หัวหน้าพัสดุ</p>
        <p>(ผู้ช่วยศาสตราจารย์สิริพัฒน์ เสวิกุล)</p>
    </div>



</body>

</html>