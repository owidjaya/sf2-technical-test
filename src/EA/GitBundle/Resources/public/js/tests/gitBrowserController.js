describe('gitBrowserController Test', function(){
    var $scope, createController, $httpBackend, $http;
    beforeEach(angular.mock.module("gitBrowser"));
    beforeEach(inject(function($injector) {
        $rootScope = $injector.get('$rootScope');
        $scope = $rootScope.$new();

        var $controller = $injector.get('$controller');
        $httpBackend = $injector.get('$httpBackend');
        $httpBackend.when("GET", "/repos/test").respond({});
        $http = $injector.get("$http");
        createController = function() {
            return $controller('gitBrowserController', {
                '$scope': $scope,
                '$http':  $http
            });
        };
        spyOn(window, 'alert');
      }));



    it('call to display alert should call alert function', function() {
      var controller = createController();
      var data = {
      	id: 1,
      	created_at: "2014-01-01"
      }
      $scope.displayAlert(data);
      expect(window.alert).toHaveBeenCalledWith("ID: " + data.id + ", Created At: " + data.created_at);
    });

    it('call get user repositories should do GET from /repos/<username>', function() {
      $scope.search = "test";
      $httpBackend.expectGET("/repos/"+ $scope.search);
      var controller = createController();
      $scope.getUserRepositories();
      $httpBackend.flush();
      expect($scope.userRepositories).toEqual(jasmine.any(Object));
    });
  });
