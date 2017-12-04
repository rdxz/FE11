angular.module('starkapp')
  .factory('$ActivityManage',[
    '$http',function($http){
        return{
          fetchAct: function () {
            // return $http.get('http://easy-mock.com/mock/59664d4d58618039284c7710/example/goods/list')
            return $http.get('http://h6.duchengjiu.top/shop/api_cat.php')
            .then(function(data) {
              console.log(1111);
                return data;
            })
          }
        }

    }
  ])