var gitBrowserModule = angular.module("gitBrowser",[]);
gitBrowserModule.config(function($interpolateProvider){
	$interpolateProvider.startSymbol("[[").endSymbol("]]");
})
gitBrowserModule.controller("gitBrowserController", function($scope, $http){
	$scope.userRepositories;
	$scope.search;

	$scope.getUserRepositories = function(){
		$http.get("/repos/"+$scope.search).
			success(function(data,status,headers,config){
				$scope.userRepositories = data;
			}).
			error(function(data, status, headers, config){
				console.log("something is wrong");
			});
	};
	$scope.displayAlert = function(data){
		alert("ID: " + data.id + ", Created At: " + data.created_at);
	};
})