/**
 * Created by psybo-03 on 1/7/17.
 */

app.controller('adminController', ['$scope', '$location', '$http', '$rootScope', '$filter', '$window', 'uibDateParser', '$uibModal', '$log', '$document', function ($scope, $location, $http, $rootScope, $filter, $window, uibDateParser, $uibModal, $log, $document) {

    $scope.error = {};
    var base_url = $scope.baseUrl = $location.protocol() + "://" + location.host + '/';
    $rootScope.base_url = base_url;
    $rootScope.public_url = $scope.baseUrl = $location.protocol() + "://" + location.host;


    $scope.paginations = [5, 10, 20, 25];
    $scope.numPerPage = 10;

    $scope.user = {};
    $scope.curuser = {};
    $scope.newuser = {};
    $scope.newuser = {};
    $rootScope.loading = false;
    $scope.formdisable = false;

    $rootScope.loading = false;

    $scope.format = 'yyyy/MM/dd';
    //$scope.date = new Date();

    //check_thumb();

    //load_user();

    function load_user() {
        var url = $rootScope.base_url + 'admin/user';
        $http.get(url).then(function (response) {
            if (response.data) {
                $scope.curuser = response.data.username;
                $scope.newuser.username = $scope.curuser;
            }
        });
    }

    $scope.login = function () {
        console.log('login');
        var fd = new FormData();
        angular.forEach($scope.user, function (item, key) {
            fd.append(key, item);
        });

        var url = $rootScope.base_url + 'login/verify';
        $http.post(url, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
            .then(function onSuccess(response) {
                $window.location.href = base_url + 'admin/#/';
            }, function onError(response) {
                console.log('login error');
                console.log(response.data);
                $scope.error = response.data;
                $scope.showerror = true;
            });
    };

    function check_thumb() {
        $rootScope.loading = true;
        var url = $rootScope.base_url + 'admin/check-thumb';
        $http.post(url, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
            .then(function nSuccess(response) {
                console.log('success');
                $rootScope.loading = false;
            }, function onError(response) {
                console.log('error');
                $rootScope.loading = false;
            })
    }

    $scope.changeProfile = function () {
        $rootScope.loading = true;
        var fd = new FormData();

        angular.forEach($scope.newuser, function (item, key) {
            fd.append(key, item);
        });
        var url = $rootScope.base_url + 'admin/change/submit';
        $http.post(url, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
            .then(function onSuccess(response) {
                $rootScope.loading = false;
                console.log('profile changed');
                $scope.showmsg = true;
                $scope.formdisable = true;
                openModal('Username and Password changed.', 'sm');
                $scope.newuser = {};
                load_user();
                $scope.newuser.username = $scope.curuser;
                $scope.formdisable = false;
            }, function onError(response) {
                $rootScope.loading = false;
                $scope.showerror = true;
                openModal('Try again later.', 'sm');
                $scope.newuser = {};
                load_user();
                $scope.newuser.username = $scope.curuser;
                $scope.formdisable = false;
            });
    };

    $scope.cancel = function () {
        $window.location.href = '/#';
    };


    /******DATE Picker start******/
    $scope.today = function () {
        $scope.date = new Date();
    };
    $scope.today();

    $scope.clear = function () {
        $scope.date = null;
    };

    $scope.inlineOptions = {
        customClass: getDayClass,
        minDate: new Date(),
        showWeeks: true
    };

    $scope.dateOptions = {
        formatYear: 'yy',
        maxDate: new Date(2020, 5, 22),
        minDate: new Date(),
        startingDay: 1
    };

    // Disable weekend selection
    function disabled(data) {
        var date = data.date,
            mode = data.mode;
        return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);
    }

    $scope.toggleMin = function () {
        $scope.inlineOptions.minDate = $scope.inlineOptions.minDate ? null : new Date();
        $scope.dateOptions.minDate = $scope.inlineOptions.minDate;
    };

    $scope.toggleMin();

    $scope.open1 = function () {
        $scope.popup1.opened = true;
    };

    $scope.open2 = function () {
        $scope.popup2.opened = true;
    };

    $scope.setDate = function (year, month, day) {
        $scope.date = new Date(year, month, day);
    };

    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];
    $scope.altInputFormats = ['M!/d!/yyyy'];

    $scope.popup1 = {
        opened: false
    };

    $scope.popup2 = {
        opened: false
    };

    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    var afterTomorrow = new Date();
    afterTomorrow.setDate(tomorrow.getDate() + 1);
    $scope.events = [
        {
            date: tomorrow,
            status: 'full'
        },
        {
            date: afterTomorrow,
            status: 'partially'
        }
    ];

    function getDayClass(data) {
        var date = data.date,
            mode = data.mode;
        if (mode === 'day') {
            var dayToCheck = new Date(date).setHours(0, 0, 0, 0);

            for (var i = 0; i < $scope.events.length; i++) {
                var currentDay = new Date($scope.events[i].date).setHours(0, 0, 0, 0);

                if (dayToCheck === currentDay) {
                    return $scope.events[i].status;
                }
            }
        }

        return '';
    }


    /******DATE Picker END******/

    function openModal(content, size, parentSelector) {
        var parentElem = parentSelector ?
            angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ModalInstanceCtrl',
            controllerAs: '$scope',
            size: size,
            appendTo: parentElem,
            resolve: {
                items: function () {
                    return content;
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
