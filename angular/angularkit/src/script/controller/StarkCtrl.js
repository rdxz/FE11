angular.module('controllers').controller('StarkCtrl', [
  '$scope',
  '$StarkManage',
  function (
    $scope,
    $StarkManage
  ) {
    console.log($StarkManage.starkName);
    $scope.name = $StarkManage.starkName;

  }])