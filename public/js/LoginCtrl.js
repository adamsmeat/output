function LoginCtrl($scope, $http)
{
 
  $scope.clickedLoginButton = function() {
    //$scope.todos.push({text:$scope.todoText, done:false});
    //$scope.todoText = '';
    //$http.post('/someUrl', {}).success(successCallback);
    $http.post('/template', {}).success(function(userObj){
      //alert(returnData.firstName);
      //$scope.firstName = returnData.firstName;
      $scope.user = userObj;
    });
    //alert('clicked');
  };
 
}


