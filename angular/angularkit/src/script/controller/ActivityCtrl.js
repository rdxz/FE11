angular.module('controllers').controller('ActivityCtrl', [
  '$scope',
  '$ActivityManage',
  function(
    $scope,
    $ActivityManage
  ){

    $ActivityManage.fetchAct().then(function(data){
        console.log(data)
    })

}])