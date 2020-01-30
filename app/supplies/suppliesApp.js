angular
    .module('supplies', ['ngMaterial', 'ngMessages', 'material.svgAssetsCache'])
    .controller('AppCtrl', function($scope, $http) {
        onitInit();
        $scope.modelSave = { ID: null, SUPPLIES_NAME: null, PRICE: null, REMARK: null };

        function onitInit() {
            $scope.ID = $_GET('ID');
            if ($scope.ID) {
                searchEdit($scope.ID)
                $scope.button = "แก้ไขพัสดุ"
                $scope.buttonClass = "btn btn-danger"
            } else {
                $scope.button = "เพิ่มพัสดุ"
                $scope.buttonClass = "btn btn-info"
            }
        }

        function $_GET(param) {
            var vars = {};
            window.location.href.replace(location.hash, '').replace(
                /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
                function(m, key, value) { // callback
                    vars[key] = value !== undefined ? value : '';
                }
            );

            if (param) {
                return vars[param] ? vars[param] : null;
            }
            return vars;
        }

        function searchEdit(ID) {
            $http.post('./services/api/supplies/searchEditSuppliesServices.php', ID).then((res) => {
                // console.log("res.data", res.data);
                res.data.filter((e) => {
                    e.PRICE = Number(e.PRICE)
                })
                $scope.modelSave = res.data[0];
            }).catch((err) => {
                console.log("Error");
            }).finally(() => {

            });
        }

        $scope.save = function() {
            let data = $scope.modelSave;
            console.log("modelSave", data);

            $http.post('./services/api/supplies/addEditSuppliesServices.php', data).then((res) => {
                // console.log("res.data", res.data);
                alert("บันทึกำเร็จ")
                location.replace("supplies.php?active=supplies");
            }).catch((err) => {
                console.warn("Error");

            }).finally(() => {

            });
        }


    })