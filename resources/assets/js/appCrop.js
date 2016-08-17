angular.module('appCrop', ['ngImgCrop'])
    .controller('CropController', function($scope,$http) {
        $scope.myImage=false;
        $scope.myCroppedImage=false;

        var handleFileSelect=function(evt) {
            var file=evt.currentTarget.files[0];
            var reader = new FileReader();
            reader.onload = function (evt) {
                $scope.$apply(function($scope){
                    $scope.myImage=evt.target.result;
                });
            };
            reader.readAsDataURL(file);
        };
        angular.element(document.querySelector('#fileInput')).on('change',handleFileSelect);

        $scope.upload = function () {
            $scope.$parent.clubsData.myImage = $scope.myImage;
            $scope.$parent.clubsData.myCroppedImage = $scope.myCroppedImage;

            if($scope.$parent.clubsData.myCroppedImage) {
                $(document).find('#empty_img').toggleClass('empty_img');
                $(document).find('#full_img').toggleClass('empty_img');
            }
        };

        $scope.cancel = function () {
            $(document).find('#empty_img').toggleClass('empty_img');
            $(document).find('#full_img').toggleClass('empty_img');
        };

    });