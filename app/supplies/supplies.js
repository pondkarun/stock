angular
    .module('supplies', ['ngMaterial', 'ngMessages', 'material.svgAssetsCache'])
    .controller('AppCtrl', function($scope, $http) {
        onitInit();
        $scope.modelSave = { ID: null, UNIT: null };

        function onitInit() {
            search()
        }

        function search() {
            $http.post('./services/api/supplies/searchSuppliesServices.php').then((res) => {
                // console.log("res.data", res.data);
                $scope.SUPPLIES_LIST = res.data
            }).catch((err) => {
                console.log("Error");
            }).finally(() => {

            });
        }
        $scope.SELECT = function(ID) {
            $scope.modelSave.ID = ID
            console.log("$scope.modelSave.ID", $scope.modelSave.ID)
        }

        $scope.close = function() {
            $scope.modelSave = { ID: null, UNIT: null };
        }
        $scope.save = function() {
            console.log("modelSave", $scope.modelSave);
            let data = $scope.modelSave;
            $http.post('./services/api/supplies/addStockSuppliesServices.php', data).then((res) => {
                console.log("res.data", res.data);
                location.replace("supplies.php?active=supplies");
            }).catch((err) => {
                console.warn("Error");
                // alert("Error")
            }).finally(() => {

            });
            $scope.close()
        }

        $scope.delete = function(item) {
            // console.log("item", item);
            $http.post('./services/api/supplies/deleteSuppliesServices.php', item).then((res) => {
                alert("ลบสำเร็จ")
                location.replace("supplies.php?active=supplies");
            }).catch((err) => {
                console.warn("Error");
            }).finally(() => {

            });
        }


    })