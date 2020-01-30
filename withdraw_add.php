<?php include('include/chk.php');
if (!$_GET['ID'] && !$_GET['active'] == 'withdraw') {
    echo "<script>";
    echo "window.history.back();";
    echo "</script>";
    exit;
}
$query = "SELECT * FROM  supplies ";
$result = $condb->query($query) or die($condb->error);
?>
<!DOCTYPE html>
<html style="background-color: #3e3e3e !important;" ng-app="MyApp">

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
    <link rel="stylesheet" href="assets/bootstrap-select/css/bootstrap-select.min.css">
    <link rel='stylesheet' href='assets/angular/css/angular-material.css'>

    <title>ใบเบิกพัสดุ</title>


</head>

<body ng-controller="AppCtrl">

    <div id="wrapper">
        <?php include('./include/nav.php') ?>
        <!--/. NAV TOP  -->
        <?php include('./include/side.php') ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="header" style="padding-top: 15px">
                <!-- <ol class="breadcrumb">
                    <li class="active">รายการพัสดุ</li>
                </ol> -->
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="board">
                            <div class="panel panel-primary">

                                <h4 class="text-center">ใบเบิกพัสดุ</h4>
                                <h4 class="text-center">คณะวิทยาการจัดการ</h4>
                                <h4 class="text-center">มหาวิทยาลัยราชภัฏจันทรเกษม</h4>
                                <div class="form-horizontal" style="padding-top: 15px">
                                    <div class="form-group">
                                        <label for="inputmajor" class="col-sm-2 control-label">เลือกพัสดุ <span class="text-red">*</span> : </label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <select class="selectpicker form-control" data-live-search="true" multiple data-actions-box="true" ng-model="model.SUPPLIES_ID">
                                                    <option ng-repeat="x in SUPPLIES_LIST" value="{{x.ID}}">{{ x.SUPPLIES_NAME }} ( {{ x.PRICE }} )</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" ng-model="model.UNIT" placeholder="จำนวน">
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-info " ng-click="addTable()" ng-disabled="!model.SUPPLIES_ID || !model.UNIT">เพิ่มพัสดุ</button>
                                        </div>
                                    </div>
                                </div>

                                <div ng-show="tableList.length > 0">

                                    <!-- <ul>
                                        <li ng-repeat="x in tableList"> {{x.SUPPLIES_ID}} จำนวน {{x.UNIT}}</li>
                                    </ul> -->

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">รายการ</th>
                                                <th class="text-center">จำนวน</th>
                                                <th class="text-center">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in tableList">
                                                <td class="text-center">{{$index + 1}}</td>
                                                <td>{{x.SUPPLIES_NAME}}</td>
                                                <td class="text-center">{{x.UNIT}}</td>
                                                <td class="text-center"><button type="button" class="btn btn-sm btn-danger text-white" ng-click="delTable(x.SUPPLIES_ID)"><i class="fas fa-trash"></i> ลบ</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <center>
                                        <button type="button" class="btn btn-success" ng-click="save(tableList)" ng-disabled="tableList.length <= 0">เบิกพัสดุ</button>
                                        <!-- <button type="button" class="btn btn-default" ng-click="clear()" ng-disabled="tableList.length <= 0">ค่าเริ่มต้น</button> -->
                                    </center>

                                </div>

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


    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/bootstrap-select/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->

    <script src='assets/angular/js/angular.js'></script>
    <script src='assets/angular/js/angular-animate.min.js'></script>
    <script src='assets/angular/js/angular-route.min.js'></script>
    <script src='assets/angular/js/angular-aria.min.js'></script>
    <script src='assets/angular/js/angular-messages.min.js'></script>
    <script src='assets/angular/js/moment.js'></script>
    <script src='assets/angular/js/svg-assets-cache.js'></script>
    <script src='assets/angular/js/angular-material.js'></script>
    <script src="app/withdraw/withdraw.js"></script>
</body>

</html>