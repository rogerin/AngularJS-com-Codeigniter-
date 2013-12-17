<html data-ng-app="mvcApp">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Treino Angular</title>
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body data-ng-controller="myController">
	<div class="container">
		<h2>Lista Carregado do banco</h2>
		<div class="container">
			<div class="row">
				<div class="alert" data-ng-show="loading">Carregando...</div>
			</div>
			<div class="row">

				<div class="col-md-4">

					<form data-ng-submit="salvar()" class="form-inline" role="form">
					  <div class="form-group">
					    <input data-ng-model="instrucao.instrucaoTxt" type="text" class="form-control"   placeholder="Digite sua instrução..">
					   <input data-ng-model="instrucao.instrucaoId" type="hidden">
					  </div>
					  
					  <button type="submit" class="btn btn-default">Cadastrar</button>
					</form>

					<form data-ng-submit="" class="form-inline" role="form">
					  <div class="form-group">
					    <input type="search" class="form-control"  placeholder="Buscar">
					  </div>
					  
					  <button type="submit" class="btn btn-default">Buscar</button>
					</form>

				</div>
		
			</div>


		</div>
		<table class="table">
			<thead>
				<tr>
					<td>id</td>
					<td>instrucaoTxt</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr data-ng-repeat="un in lista | filter:orderBy:instrucaoId:reverse">
					<td>{{un.instrucaoId}}</td>
					<td>{{un.instrucaoTxt}}</td>
					<td>(del | edit)</td>
				</tr>
			</tbody>
		</table>
	</div>


	<hr/>
	<div class="container">
		<div class="container theme-showcase">
			<h1>Lista de estados e capitais</h1>
			<p> Filtrar: <form><input class="form-control" type="search" name="busca" data-ng-model="filtro" placeholder="Filtrar"> </form></p>
			<ul class="list-group">
				<li class="list-group-item" data-ng-repeat="state in states | orderBy:'name' | filter:filtro">{{state.name}} - {{state.capital}} - {{ state.renda | currency:'R$ '}}</li>
			</ul>

		</div>
	
		<div class="container">
			<h5>Add novo estado</h5>
			<form data-ng-submit="addState()">
				<input  class="form-control col-md-3"  type="text" data-ng-model="estado" placeholder="digite o estado">
				<input  class="form-control col-md-3" type="text" data-ng-model="instrucaoTxt" placeholder="digite a capital">
				
				<input class="btn btn-default" type="submit" value="Cadastrar" />
			</form>
		</div>

		<div class="container">
			<label>Gostei <input type="checkbox" data-ng-model="gostei"></label> <span class="glyphicon glyphicon-thumbs-up" data-ng-show="gostei"></span>
			<br/>
			<label>Esconder <input type="checkbox" data-ng-model="escondido"></label> <span class="glyphicon glyphicon-usd" data-ng-hide="escondido"></span>
			<br/>
			<p>
				<input type="submit" data-ng-click="incrementa()"> <br/>
				<small>Clicado {{contador }} vezes.</small> /
				<small>Você clicou <span data-ng-bind="contador"></span> vezes.</small> /

			</p>
			
		</div>


		<div class="contador">
			<p>
				Letras: {{letras}}
			</p>
			<p>
				Letras (limitando a 2): {{letras | limitTo: 2}}
			</p>
			<p>
				Letras (limitando a 2 e uppercase): {{letras | limitTo: 2 | uppercase}}
			</p>


			<p>
				Estados (json): {{states | json }}
			</p>

		</div>
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/angular.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/app.js"></script>


</body>
</html>