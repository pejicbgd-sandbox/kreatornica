(function(angular) {
    "use strict";

    function encodeEntities(value) {
        return $('<div/>').text(value).html();
    }

    var baseUrl = 'http://localhost/kreatornica/admin/';
    var aboutUs = angular.module('aboutUs', []);

    aboutUs.config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{').endSymbol('}');
    });

    aboutUs.controller('AboutUsController', ['$scope', '$http', function($scope, $http) {
        $scope.aboutUs = {
            title: viewData.aboutUs.title,
            subtitle: viewData.aboutUs.subtitle,
            content: viewData.aboutUs.text
        };

        $scope.languageSelected = 'sr';

        $scope.$watch('languageSelected', function(){
            var url = baseUrl + 'helper.php?action=getAboutUsData&lang=' + $scope.languageSelected;
            $http({
                method: 'GET',
                url: url
            }).then(function successCallback(response) {
                $scope.aboutUs.title = encodeEntities(response.data.aboutUsTitle);
                $scope.aboutUs.subtitle = encodeEntities(response.data.aboutUsSubtitle);
                $scope.aboutUs.content = encodeEntities(response.data.aboutUs);
            });
        });
    }]);

})(window.angular);