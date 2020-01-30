<?php
include('include/chk.php');

if ($_SESSION["STATUS"]  != 'admin') {
    Header("Location: logout.php");
    exit();
}

$query = "SELECT * FROM  users where STATUS != 'admin' " or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">
    <!-- dataTables -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <!-- ICON -->
    <link rel="icon" type="image/png" href="./assets/images/logo-msci.png" />
    <title>รายชื่ออาจารย์ทั้งหมด</title>


</head>

<body>

    <div id="wrapper">
        <?php include('./include/nav.php') ?>
        <!--/. NAV TOP  -->
        <?php include('./include/side.php') ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="header" style="padding-top: 15px">
                <ol class="breadcrumb">
                    <li class="active">รายชื่ออาจารย์ทั้งหมด</li>
                </ol>

            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="board">
                            <div class="panel panel-primary">

                                <!-- <div align="right" style="margin: 10px;">
                                    <a href="major-add.php?active=major" class="btn btn-success btn-md"> + เพิ่มสาขาวิชา</a>
                                </div> -->

                                <section class="table-responsive ">
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">ลำดับ</th>
                                                <th width="30%">ชื่อ - นามสกุล</th>
                                                <th width="5%">เลือก</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td align="center"><?php echo ++$i; ?></td>
                                                    <td><?php echo $row['NAME'] . " " . $row['SERNAME']; ?></td>
                                                    <td align="center">
                                                        <a href="withdraw_add.php?ID=<?php echo $row['ID']; ?>&active=withdraw" class="btn btn-sm btn-warning text-white">
                                                            <i class="fas fa-edit"></i> เลือก
                                                        </a>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </section>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>


    <!-- DataTables -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>





</body>

</html>