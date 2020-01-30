angular
    .module('MyApp', ['ngMaterial', 'ngMessages', 'material.svgAssetsCache'])
    .controller('AppCtrl', function($scope, $http) {
        onitInit();

        function onitInit() {
            search()
            $scope.USERS_ID = $_GET('ID');
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

        function search() {
            $http.post('./services/api/withdraw/searchWithdrawServices.php').then((res) => {
                // console.log("res.data", res.data);
                $scope.SUPPLIES_LIST = res.data
            }).catch((err) => {
                console.log("Error");
            }).finally(() => {

            });
        }

        $scope.model = {
            SUPPLIES_ID: null,
            UNIT: null
        }
        $scope.tableList = [];
        $scope.addTable = function() {
            //console.log("SUPPLIES_ID", $scope.model);
            let listSUPPLIES_ID = $scope.model.SUPPLIES_ID;
            listSUPPLIES_ID.forEach((e) => {
                let whereName = $scope.SUPPLIES_LIST.filter(x => x.ID == e);
                let table = {
                    SUPPLIES_ID: e,
                    SUPPLIES_NAME: whereName[0].SUPPLIES_NAME,
                    UNIT: $scope.model.UNIT,
                    USERS_ID: $scope.USERS_ID
                }

                if (checkTableList(table)) {
                    $scope.tableList.push(table)
                }
            });

            // console.log("$scope.tableList", $scope.tableList);


        };
        $scope.delTable = function(ID) {
            // console.log("ID", ID);
            let tableListIndex = $scope.tableList.findIndex(x => x.SUPPLIES_ID == ID);
            // console.log("tableListIndex", tableListIndex);
            $scope.tableList.splice(tableListIndex, 1);
        }

        $scope.clear = function() {
            $scope.model.SUPPLIES_ID = null
            $scope.model.UNIT = null
            $scope.tableList = []
        }

        $scope.save = function(data) {
            console.log("data", data);
            $http.post('./services/api/withdraw/addWithdrawServices.php', data).then((res) => {
                console.log("res.data", res.data);
                $scope.clear();
                //alert("บันทึกสำเร็จ");
                openUrl(res.data);
                location.replace("withdraw.php?active=withdraw");
            }).catch((err) => {
                console.warn("Error");
                alert("Error")
            }).finally(() => {

            });
        }

        function openUrl(data) {
            var url = "./withdraw_print.php?active=withdraw&USERS_ID=" + $scope.USERS_ID + "&ID=" + data;
            window.open(url);
        }

        function checkTableList(data) {
            //console.log("data", data);
            let item = $scope.tableList.find(x => x.SUPPLIES_ID == data.SUPPLIES_ID);
            if (item) {
                return false;
            } else {
                return true;
            }
        };





    })