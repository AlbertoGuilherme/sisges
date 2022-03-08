<!DOCTYPE html>
<html>
<head>
	<title>Isced Huila</title>
	<link rel="stylesheet" href="{{ url('css/app.css') }}">
	<script src = {{'js/app.cjs'}}> </script>
	
</head>
<body>
  <div class="col-md-12 col-sm-6 col-xs-12 offset-4">
				<img src="{{url('imgs/isced.jpg')}}" class=" img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} align-items-center" alt="">
				
        </div>

		<div class="col-md-12 col-sm-12 col-xs-12  offset-1">
					<h6>INSTITUTO SUPERIOR DE CIÊNCIAS DE EDUCAÇÃO DA HUÍLA </h6>
				
		        </div>
			<div class="col-md-12 col-sm-6 col-xs-12 offset-5">
					
						<h6>ISCED HUILA</h6>
		        </div>
				<div class="col-md-12 col-sm-6 col-xs-12 offset-1">
					    <h6>Nome : {{auth()->user()->name}}</h6>
						<h6>Seu Pedido : {{$comment}}</h6>
						<h6>Estado  do seu pedido : {{$status}}</h6>
						<h6>Número único do Seu pedido : {{$identify}}</h6>
						<h6>Número único de Pagamento por Referência : {{$reup}}</h6>
						
		        </div>
				







	<hr>
  <h6>Data de Emissão :</h6>	{{  $time = now()}}
</body>
</html>