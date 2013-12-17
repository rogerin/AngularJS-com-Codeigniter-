var mvcApp = angular.module('mvcApp', []);

mvcApp.controller('myController', function($scope, $window, $http) {

  var $ = jQuery;
  $scope.instrucao = {instrucaoId: 0, instrucaoTxt: ''};
  $scope.lista = [];

  $scope.$on('LOAD',function(){$scope.loading=true});
  $scope.$on('UNLOAD',function(){$scope.loading=false});


  $scope.$emit('LOAD');
  $http.get('/api/listar').success(function(data){
    $scope.lista = data;
    $scope.$emit('UNLOAD');
  })



  $scope.salvar = function(){
    $scope.$emit('LOAD');
    $http.post('/api/salvar', $scope.instrucao).success(function(data){
      $scope.lista.unshift(data);
      $scope.$emit('UNLOAD');
   });
  }










  $scope.data = new Date();
  $scope.contador = 0;

  $scope.letras = "abcdefghijklmnopqrstuvwyz";

  $scope.filtro = "";

  $scope.states = [
  	{ name: 'Minas Gerais',		capital: 'Belo Horizonte',	renda: 2000		}, 
  	{ name: 'São Paulo',		capital: 'São Paulo',		renda: 2999.45	}, 
  	{ name: 'Paraíba',			capital: 'João Pessoa',		renda: 2000		}, 
    { name: 'Rio de Janeiro',	capital: 'Rio de Janeiro',	renda: 2000		},
    { name: 'Santa Catarina',	capital: 'Florianópolis',	renda: 3000		},
    { name: 'Pernambuco',		capital: 'Recife',			renda: 2000		},
    { name: 'Espírito Santo',	capital: 'Vitória',			renda: 2000		}
  ];

  $scope.addState = function() {
    $scope.states.push({
      name: $scope.estado,
      capital: $scope.capital,
      renda: 1000
    });
    $scope.estado = '';
    $scope.capital = '';
  };

  $scope.incrementa = function(){
  	$scope.contador = $scope.contador +1;
  }

});