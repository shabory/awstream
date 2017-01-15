var app = angular.module('myApp', []);

app.controller('productsController', function($scope, $http) {
  getallproducts(); // Load all available tasks 
  function getallproducts(){  
  $http.get("controllers/controller.php?action=getallproducts").then(function(data){
  $scope.products = data.data;
       });
  };
  getallCats(); // Load all available tasks 
  function getallCats(){  
  $http.get("controllers/controller.php?action=getallCats").then(function(data){
  		$scope.cats = data.data;
       });
  };
  $scope.addProduct = function (product_name,category_id) {
  	$http({method: "post", url: "controllers/controller.php",
  	headers: { 'Content-Type': 'application/x-www-form-urlencoded' },	
    data: {
        product_name: product_name,
        category_id: category_id
        }
     

     });
    getallproducts();
    
  };
  $scope.deleteProduct = function (product_id) {
    if(confirm("Are you sure to delete this product?")){
    $http.get("controllers/controller.php?action=deleteProduct&productId="+product_id).then(function(data){
    getallproducts();
      });
    }
  };

  $scope.toggleStatus = function(item, status, task) {
    if(status=='2'){status='0';}else{status='2';}
      $http.post("ajax/updateTask.php?taskID="+item+"&status="+status).success(function(data){
        getTask();
      });
  };

});

app.controller('catsController', function($scope, $http) {
  getallCats(); // Load all available tasks 
  function getallCats(){  
  $http.get("controllers/controller.php?action=getallCats").then(function(data){
  		$scope.cats = data.data;
       });
  };
  $scope.addTask = function (task) {
    $http.post("ajax/addTask.php?task="+task).success(function(data){
        getTask();
        $scope.taskInput = "";
      });
  };
  $scope.deleteTask = function (task) {
    if(confirm("Are you sure to delete this line?")){
    $http.post("ajax/deleteTask.php?taskID="+task).success(function(data){
        getTask();
      });
    }
  };

  $scope.toggleStatus = function(item, status, task) {
    if(status=='2'){status='0';}else{status='2';}
      $http.post("ajax/updateTask.php?taskID="+item+"&status="+status).success(function(data){
        getTask();
      });
  };

});