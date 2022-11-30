<?php
    $url = 'http://localhost/cantinaapi/CantinaAPI/v1/Api.php?apicall=';

    $class = 'getPedidos';
	$pedidos = 'getItensPedidos';
    $param = '';

    $response = file_get_contents($url.$class.$param);

	$QuantidadePedidos = file_get_contents($url.$pedidos.$param);

    //echo $response;
    //transformando o json em um array
    $response = json_decode($response, 1);
    $QuantidadePedidos = json_decode($QuantidadePedidos, 1);
    //$QuantidadePedidos = $QuantidadePedidos['pedidos']['IDPedido'];
    //$ola = $response['pedidos']['0']['IDPedido'];
    //echo($response['produtos'][0]['IDProduto']);

    //echo $response['pedidos']['0']['PrecoProduto'];
	$precoTotal = 0;

	foreach($response['pedidos'] as $preco){
		$precoProduto =  intval($preco['PrecoProduto']);
		$precoTotal = $precoTotal + $precoProduto;
	}
	$id = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Pedidos</title>

	<style>
	body{
			background-image: url(images/bg-cantina1.png);
            color: black;
            text-align: center;
        }
		.box-search {
			display: flex;
			justify-content: center;
			gap: .1%;
		}
		.table-bg {
			background-color: rgba(255, 255, 255, 0.8);
			border-radius: 15px 15px 0 0;
			border: 3px solid black;
		}
		nav {
			text-align: center;
			
		}
		
	</style>
</head>
<body>

	<nav class="navbar navbar-dark" style="background: rgb(40,40,40); display: wrap; justify-content:center;  ">

            <a class="navbar-brand" href="#" style="color:white;"><b>Tabela de Pedidos</b></a>
            
        </div>
    </nav>  
    <br>
    <div class="container-md">
	<div class="box-search">
		
		<a class="btn btn-sm btn-primary" href="Gerenciamento.php" style="background: #fe7009; border: 1px solid black; color: black; margin-bottom:20px; padding:10px 10px 10px 10px;" ><b>Ir para o gerenciamento</b></a>

		<a class="btn btn-sm btn-primary" href="login.php" style="background: #fe7009; border: 1px solid black; color: black; margin-left: auto; margin-bottom:20px; padding:10px 10px 10px 10px;" ><b>Sair</b></a>
	</div>
	<div>
	<table style="border-top: 3px solid black;
			width: 50%;
			text-align: center;
			border-right: 3px solid black;
			border-left: 3px solid black;
			background-color: rgba(255, 255, 255, 0.8);">
	<thead >
		<th>IDPedido: 8// Data Pedido: 10-02-2005 // Valor Pedido: $80,00</th>
	</thead>
	</table>
	<table class='table text-black table-bg'>
						<thead>
							<tr>
								<th scope='col'>IDPedido</th>
								<th scope='col'>Data do Pedido</th>
								<th scope='col'>Valor Pedido</th>
								<th scope='col'>Cliente</th>	
								<th scope='col'>Produto</th>	
								<th scope='col'>Preço</th>	
								<th scope='col'>Quantidade Vendida</th>	
								</th>
							</tr>
						</thead>
						<tbody>
		<?php
			$IDPedido = "";
			foreach($response['pedidos'] as $pedido){
				
				if($pedido['IDPedido'] == $id)
				{	
					if($pedido['IDPedido'] != $IDPedido){
						echo "<tr>";
						echo"<td>".($pedido['IDPedido'])."</td>";
						echo"<td>".($pedido['DataPedido'])."</td>";
						echo"<td>".($pedido['ValorPedido'])."</td>";
						echo"<td>".($pedido['Nome'])."</td>";
						echo"<td>".($pedido['NomeProduto'])."</td>";
						echo"<td>".($pedido['PrecoProduto'])."</td>";
						echo"<td>".($pedido['QuantidadeVendida'])."</td>";
						$IDPedido = $pedido['IDPedido'];
					}else {
						echo "<tr>";
						echo"<td>".'-'."</td>";
						echo"<td>".'-'."</td>";
						echo"<td>".'-'."</td>";
						echo"<td>".'-'."</td>";
						echo"<td>".($pedido['NomeProduto'])."</td>";
						echo"<td>".($pedido['PrecoProduto'])."</td>";
						echo"<td>".($pedido['QuantidadeVendida'])."</td>";
					}
					
				}else{
					$id++;
					echo "
					<table class='table text-black table-bg'>
						<thead>
						<tr>
						<th scope='col'>IDPedido</th>
						<th scope='col'>Data do Pedido</th>
						<th scope='col'>Valor Pedido</th>
						<th scope='col'>Cliente</th>	
						<th scope='col'>Produto</th>	
						<th scope='col'>Preço</th>	
						<th scope='col'>Quantidade Vendida</th>	
						</th>
						</tr>
					</thead>
					<tbody>
					";
					echo "<tr>";
					echo"<td>".($pedido['IDPedido'])."</td>";
					echo"<td>".($pedido['DataPedido'])."</td>";
					echo"<td>".($pedido['ValorPedido'])."</td>";
					echo"<td>".($pedido['Nome'])."</td>";
					echo"<td>".($pedido['NomeProduto'])."</td>";
					echo"<td>".($pedido['PrecoProduto'])."</td>";
					echo"<td>".($pedido['QuantidadeVendida'])."</td>";
					$IDPedido = $pedido['IDPedido'];
				}
			}
			?> 
		  </tbody>
		</table>
	</div>
</body>
<script>
	var search = document.getElementById('pesquisar');

	search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

	function searchData(){
		window.location = 'Gerenciamento.php?search='+search.value;
	}


</script>
</div>
</html>

<?php

/*
	echo"<td>".($pedido['IDPedido'])."</td>";
				echo"<td>".($pedido['Nome'])."</td>";
				echo"<td>".($pedido['DataPedido'])."</td>";
				echo"<td>".($pedido['ValorPedido'])."</td>";

				echo "
				
				<thead>
					<tr>
					<th scope='col'>Produto</th>
					<th scope='col'>Quantidade</th>
					<th scope='col'>Preço</th>
					</tr>
				</thead>
				<tbody>
				";
				
				foreach($response['pedidos'] as $itens){
					echo "<tr>";
					echo"<td>".($itens['NomeProduto'])."</td>";
					echo"<td>".($itens['QuantidadeVendida'])."</td>";
					echo"<td>".($itens['PrecoProduto'])."</td>";
				}



echo "
				<table class='table text-black table-bg'>
				<thead>
					<tr>
					<th scope='col'>IDPedido</th>
					<th scope='col'>NomeCliente</th>
					<th scope='col'>Produto</th>
					<th scope='col'>Quantidade</th>
					<th scope='col'>Preço</th>
					<th scope='col'>Data</th>
					<th scope='col'>ValorTotal</th>
						
					</th>
					</tr>
				</thead>
				<tbody>
				";
				echo"<td>".$i."</td>";
				
						if(!empty($response['pedidos'])){
								
								foreach($response['pedidos'] as $pedido){
									echo "<tr>";
									echo"<td>".($pedido['NomeProduto'])."</td>";
									echo"<td>".($pedido['QuantidadeVendida'])."</td>";
									echo"<td>".($pedido['PrecoProduto'])."</td>";
									echo"<td>".$precoTotal."</td>";
								}
						} */

?>