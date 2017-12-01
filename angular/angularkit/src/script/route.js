app.config(function ($routeProvider) {
  $routeProvider
    .when('/', {
      template: '<h1> 今天天气不错哦！就是有点冷 {{msg}}</h1>',
      controller: function ($scope) {
        $scope.msg = 'stark';
      }
    })
    .when('/stark', {
      template: '<h1> my name is  {{name}}</h1>',
      controller: function ($scope) {
        $scope.name = 'stark.wang';
      }
    })
    .when('/shudong', {
      template: '<h1> this is  {{name}}</h1>',
      controller: function ($scope) {
        $scope.name = 'shudong page';
      }
    })
    .when('/activity', {
      templateUrl: '/view/activity/index.html',
      controller:'ActivityCtrl'
    })
})