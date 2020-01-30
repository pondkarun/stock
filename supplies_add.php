<?php include('include/chk.php'); ?>
<!DOCTYPE html>
<html style="background-color: #3e3e3e !important;" ng-app="supplies" ng-controller="AppCtrl">


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
    <title>{{button}}</title>


</head>

<body>

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



                                <section class="table-responsive ">
                                    <div class="form-group">
                                        <label for="inputmajor" class="col-sm-2 control-label">รายการพัสดุ <span class="text-red">*</span> : </label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" ng-model="modelSave.SUPPLIES_NAME" placeholder="รายการพัสดุ">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" ng-model="modelSave.PRICE" placeholder="ราคา">
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" ng-class="buttonClass" ng-click="save()" ng-disabled="!modelSave.SUPPLIES_NAME || !modelSave.PRICE">{{button}}</button>
                                        </div>
                                    </div>
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


    <script src='assets/angular/js/angular.js'></script>
    <script src='assets/angular/js/angular-animate.min.js'></script>
    <script src='assets/angular/js/angular-route.min.js'></script>
    <script src='assets/angular/js/angular-aria.min.js'></script>
    <script src='assets/angular/js/angular-messages.min.js'></script>
    <script src='assets/angular/js/moment.js'></script>
    <script src='assets/angular/js/svg-assets-cache.js'></script>
    <script src='assets/angular/js/angular-material.js'></script>
    <script src="app/supplies/suppliesApp.js"></script>

</body>

</html>