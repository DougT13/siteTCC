<?php
    $url = 'http://localhost/ApiCantina/CantinaAPI/v1/Api.php?apicall=';

    $class = 'getItensPedidos';
	$pedidos = 'getPedidos';
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
    //var_dump ($QuantidadePedidos);
    //echo $response['pedidos']['10']['Nome'];
	$precoTotal = 0;

	
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
            background-image: url(bg-site.jpg);
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
		<?php /*
			foreach($response['pedidos'] as $pedido){
                
                foreach($response['pedidos'] as $preco){
                    $precoProduto =  intval($preco['PrecoProduto']);
                    $quatidadeVendida = intval($preco['QuantidadeVendida']);
                    $precoTotal = $precoTotal + ($precoProduto * $quatidadeVendida);
                }
                echo  "<table class='table text-black table-bg'>
                <thead>
                    <th scope='col'>IDPedido</th>
                    <th scope='col'>NomeCliente</th>
                    <th scope='col'>ValorTotal</th>
                    <th scope='col'>DataPedido</th>
                </thead>
    
                <td>".$pedido['IDPedido']."</td>
                <td>".$pedido['Nome']."</td>
                <td>".$precoTotal."</td>
                <td>".$pedido['DataPedido']."</td>
    
                <thead>
                    <th scope='col'>ITENS PEDIDOS</th>
                    <th scope='col'>----------</th>
                    <th scope='col'>----------</th>
                    <th scope='col'>----------</th>
                </thead>
                
                <thead>
                    <th scope='col'>NomeProduto</th>
                    <th scope='col'>Quantidade Vendida</th>
                    <th scope='col'>Preço Produto</th>     
                </thead>";
                foreach($pedido['IDProduto'] as $produto){
                echo "<tr>";
                echo"<td>".($produto['NomeProduto'])."</td>";
                echo"<td>".($produto['QuantidadeVendida'])."</td>";
                echo"<td>".($produto['PrecoProduto'])."</td>";
                
                }
            $precoTotal = 0;
            }
			?> 
		  </tbody>
		</table>
        */?>
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

foreach($QuantidadePedidos as $pedido){
                
    foreach($response['pedidos'] as $preco){
        $precoProduto =  intval($preco['PrecoProduto']);
        $quatidadeVendida = intval($preco['QuantidadeVendida']);
        $precoTotal = $precoTotal + ($precoProduto * $quatidadeVendida);
    }
    echo  "<table class='table text-black table-bg'>
    <thead>
        <th scope='col'>IDPedido</th>
        <th scope='col'>NomeCliente</th>
        <th scope='col'>ValorTotal</th>
        <th scope='col'>DataPedido</th>
    </thead>";
    <td>".$pedido['IDPedido']."</td>
    <td>".$pedido['Nome']."</td>
    <td>".$precoTotal."</td>
    <td>".$pedido['DataPedido']."</td>"; 
}


?>