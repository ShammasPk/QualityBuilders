/**
 * Created by psybo-03 on 5/7/17.
 */


app.controller('portfolioController', ['$scope', '$http', '$rootScope', '$location', 'Upload', '$timeout', '$filter', '$uibModal', '$log', '$document', function ($scope, $http, $rootScope, $location, Upload, $timeout, $filter, $uibModal, $log, $document) {

    $scope.portfolios = [];
    $scope.newportfolio = {};
    $scope.curportfolio = {};
    $scope.files = [];
    $scope.errFiles = [];
    $scope.showform = false;
    $scope.message = {};
    $rootScope.url = $location.path().replace('/', '');
    $scope.uploaded = [];
    $scope.fileValidation = {};
    $scope.date = new Date();


    loadPortfolio();

    function loadPortfolio() {
        $http.get($rootScope.base_url + 'admin/portfolio/get').then(function (response) {
            console.log(response.data);
            if (response.data) {
                $scope.portfolios = response.data;
                $scope.showtable = true;
            } else {
                console.log('No data Found');
                $scope.showtable = false;
                $scope.message = 'No data found';
            }
        });
    }


    $scope.newPortfolio = function () {
        $scope.newportfolio = {};
        $scope.filespre = [];
        $scope.uploaded = [];
        $scope.files = [];
        $scope.errFiles = [];
        $scope.showform = true;
        $scope.item_files = false;
    };

    $scope.editPortfolio = function (item) {
        $scope.item_files = [];
        $scope.showform = true;
        $scope.curportfolio = item;
        $scope.newportfolio = angular.copy(item);
        $scope.item_files = item.file;
        $scope.files = [];
    };

    $scope.hideForm = function () {
        $scope.errFiles = '';
        $scope.showform = false;
    };

    $scope.addPortfolio = function () {
        $rootScope.loading = true;
        console.log($scope.newportfolio);

        var fd = new FormData();
        $scope.newportfolio.date = $filter('date')($scope.date, "yyyy-MM-dd");

        angular.forEach($scope.newportfolio, function (item, key) {
            fd.append(key, item);
        });

        fd.append('uploaded', JSON.stringify($scope.uploaded));

        if ($scope.newportfolio['id']) {
            var url = $rootScope.base_url + 'admin/portfolio/edit/' + $scope.newportfolio.id;
            $http.post(url, fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
                .then(function onSuccess(response) {
                    loadPortfolio();
                    $scope.newportfolio = {};
                    $scope.showform = false;
                    $rootScope.loading = false;
                    $scope.files = [];
                },function onError(response) {
                    console.log(response.data);
                    console.log('edit Error :- Status :' + response.status + 'data : ' + response.data);
                    $rootScope.loading = false;
                    $scope.files = [];
                });
        } else {
            var url = $rootScope.base_url + 'admin/portfolio/add';

            $http.post(url, fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
                .then(function onSuccess(response) {
                    loadPortfolio();
                    $scope.newportfolio = {};
                    $scope.showform = false;
                    $rootScope.loading = false;
                    $scope.files = [];

                }, function onError(response) {
                    console.log('addError :- Status :' + response.status + 'data : ' + response.data);
                    console.log(response.data);
                    $rootScope.loading = false;
                    $scope.files = [];

                    if (response.status == 403) {
                        $scope.fileValidation.status = true;
                        $scope.fileValidation.msg = response.data.validation_error;
                    }
                });
        }
    };

    $scope.deletePortfolio = function (item) {
        console.log(item);
        $rootScope.loading = true;
        var url = $rootScope.base_url + 'admin/portfolio/delete/' + item['id'];
        $http.delete(url)
            .then(function onSuccess(response) {
                var index = $scope.portfolios.indexOf(item);
                $scope.portfolios.splice(index, 1);
                alert(response.data.msg);
                loadPortfolio();
                $rootScope.loading = false;
            },function onError(response) {
                console.log('Delete Error :- Status :' + response.status + 'data : ' + response.data);
                console.log(response.data);
                $rootScope.loading = false;
            });
    };


    $scope.uploadFiles = function (files, errFiles) {
        angular.forEach(errFiles, function (errFile) {
            $scope.errFiles.push(errFile);
        });
        angular.forEach(files, function (file) {
            $scope.files.push(file);
            file.upload = Upload.upload({
                url: $rootScope.base_url + 'admin/portfolio/upload',
                data: {file: file}
            });

            file.upload.then(function (response) {
                $timeout(function () {
                    $scope.uploaded.push(response.data);
                    file.result = response.data;
                });
            }, function (response) {
                if (response.status > 0)
                    $scope.errorMsg = response.status + ': ' + response.data;
            }, function (evt) {
                file.progress = Math.min(100, parseInt(100.0 *
                evt.loaded / evt.total));
            });
        });
    };

    $scope.deleteImage =function(item) {

        $rootScope.loading = true;
        var url = $rootScope.base_url + 'admin/portfolio/delete-image/' + item['id'];
        $http.delete(url)
            .then(function onSuccess(response) {
                /*remove deleted file from scope variable*/
                var index = $scope.item_files.indexOf(item);
                $scope.item_files.splice(index, 1);

                $rootScope.loading = false;
            },function onError(response) {
                console.log('Delete Error :- Status :' + response.status + 'data : ' + response.data);
                console.log(response.data);
                $rootScope.loading = false;
            });
    };

    $scope.showPortfolioFiles = function (item) {
        console.log(item);
        $scope.portfoliofiles = item;
    };



    /****Modal***/

    $scope.animationsEnabled = true;

    $scope.open = function (portfolio,size, parentSelector) {
        var parentElem = parentSelector ?
            angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'myModalContent.html',
            controller: 'ModalInstanceCtrl',
            controllerAs: '$scope',
            size: size,
            appendTo: parentElem,
            resolve: {
                items: function () {
                    return portfolio;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };

}]);





