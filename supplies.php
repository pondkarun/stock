<?php
include('include/chk.php');

if ($_SESSION["STATUS"]  != 'admin') {
  Header("Location: logout.php");
  exit();
}

$query = "SELECT * ,
(SELECT SUM(UNIT)  FROM stock WHERE  SUPPLIES_ID = s.ID) AS UNIT_STOCK,
(SELECT SUM(UNIT) FROM map_withdraw_supplies WHERE SUPPLIES_ID = s.ID) AS UNIT_WITHDRAW
FROM supplies AS s WHERE s.IS_USE = 'true'
ORDER BY s.ID DESC" or die("Error:" . mysqli_error());
$result = mysqli_query($condb, $query);
?>
<!DOCTYPE html>
<html style="background-color: #3e3e3e !important;" ng-app="supplies">


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
  <title>รายการพัสดุ</title>


</head>

<body ng-controller="AppCtrl">

  <div id="wrapper">
    <?php include('./include/nav.php') ?>
    <!--/. NAV TOP  -->
    <?php include('./include/side.php') ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <div class="header" style="padding-top: 15px">
        <ol class="breadcrumb">
          <li class="active">รายการพัสดุ</li>
        </ol>
      </div>
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="board">
              <div class="panel panel-primary">

                <div align="right" style="margin: 10px;">
                  <a href="supplies_add.php?active=supplies" class="btn btn-success btn-md"> + เพิ่มพัสดุ</a>
                </div>

                <section class="table-responsive ">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="5%">ลำดับ</th>
                        <th width="30%">รายการพัสดุ</th>
                        <th width="10%">ราคา</th>
                        <th width="10%">คงเหลือ</th>
                        <th width="10%">เพิ่มสต๊อกพัสดุ</th>
                        <th width="10%">จัดการ</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      while ($row = @mysqli_fetch_array($result)) { ?>
                        <?php $y = $row['ID']; ?>
                        <tr>
                          <td align="center"><?php echo ++$i; ?></td>
                          <td><?php echo $row['SUPPLIES_NAME']; ?></td>
                          <td align="center"><?php echo number_format($row['PRICE'], 2) . " บาท"; ?></td>
                          <td align="center"><?php echo $row['UNIT_STOCK'] - $row['UNIT_WITHDRAW']; ?></td>
                          <td align="center">



                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#myModal" ng-click="SELECT(<?php echo $i; ?>)"><i class="fas fa-plus-circle"></i> เพิ่มสต๊อกพัสดุ</button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                                    <h4 class="modal-title">เพิ่มสต๊อกพัสดุ ID {{ modelSave.ID }}</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-horizontal" style="padding-top: 15px">
                                      <div class="form-group">
                                        <label for="inputmajor" class="col-sm-3 control-label">จำนวนพัสดุ <span class="text-red">*</span> : </label>
                                        <div class="col-sm-8">
                                          <input type="number" class="form-control" ng-model="modelSave.UNIT" placeholder="จำนวน">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal" ng-click="save()">บันทึก</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                  </div>
                                </div>

                              </div>
                            </div>


                          </td>
                          <td align="center">
                            <a href="supplies_add.php?ID=<?php echo $row['ID']; ?>&active=withdraw" class="btn btn-sm btn-warning text-white">
                              <i class="fas fa-edit"></i> แก้ไข
                            </a>
                            <button type="button" class="btn btn-sm btn-danger text-white" ng-click="delete(<?php echo $row['ID']; ?>)"> <i class="fas fa-trash"></i> ลบ</button>
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
  <script>
    $(function() {
      $('#dataTable').DataTable({
        // "aaSorting" :[[2,'desc']],
        // "lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
    });

    function deleteItem(id) {
      if (confirm('Are you sure, you want to delete this item?') == true) {
        window.location = `delete.php?id=${id}`;
        // window.location='delete.php?id='+id;
      }
    };
  </script>

  <script src='assets/angular/js/angular.js'></script>
  <script src='assets/angular/js/angular-animate.min.js'></script>
  <script src='assets/angular/js/angular-route.min.js'></script>
  <script src='assets/angular/js/angular-aria.min.js'></script>
  <script src='assets/angular/js/angular-messages.min.js'></script>
  <script src='assets/angular/js/moment.js'></script>
  <script src='assets/angular/js/svg-assets-cache.js'></script>
  <script src='assets/angular/js/angular-material.js'></script>
  <script src="app/supplies/supplies.js"></script>

</body>

</html>