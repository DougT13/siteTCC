<?php
    $url = 'http://localhost/cantinaapi/CantinaAPI/v1/Api.php?apicall=';

    $class = 'getProdutos';
    $param = '';

    $response = file_get_contents($url.$class.$param);

    //echo $response;
    //transformando o json em um array
    $response = json_decode($response, 1, JSON_UNESCAPED_UNICODE);
    //var_dump($response);
    //echo($response['produtos'][0]['IDProduto']);

    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Gerenciamento</title>

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
			background: linear-gradient(to right, rgba(225, 147, 220, 0.8), rgb(218, 165, 32));
			text-align: center;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-dark" style="background: rgb(40,40,40); display: wrap; justify-content:center;  ">

	<a class="navbar-brand" href="#" style="color:white;"><b>Tabela de Produtos</b></a>
	</nav>
    <br>
    <div class="container-md">
	<div class="box-search">
		<input type="search" form="form-control w-25" placeholder="Pesquisar" id="pesquisar" style="margin-bottom:20px; padding:10px 10px 10px 10px;">
		<button onclick="searchData()" class="btn" style="background: #fe7009; border: 1px solid black; color: black; margin-bottom:20px; padding:10px 10px 10px 10px;">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
			  	<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
			</svg>
		</button>

		<a class="btn btn-sm btn-primary" href="formulario.php" style="background: #fe7009; border: 1px solid black; color: black; margin-bottom:20px; padding:10px 10px 10px 10px;"><b>Adicionar Item</b></a>
		<a class="btn btn-sm btn-primary" href="pedidos.php" style="background: #fe7009; border: 1px solid black; color: black; margin-bottom:20px; padding:10px 10px 10px 10px;" ><b>Ir para os pedidos</b></a>
		<a class="btn btn-sm btn-primary" href="login.php" style="background: #fe7009; border: 1px solid black; color: black; margin-bottom:20px; padding:10px 10px 10px 10px; margin-left:auto;" ><b>Sair</b></a>
	</div>
	<div>
		<table class="table text-black table-bg">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nome</th>
		      <th scope="col">Valor</th>
		      <th scope="col">Quantidade</th>
		      <th scope="col">Descrição</th>
		      <th scope="col">...</th>
		      	
		      </th>
		    </tr>
		  </thead>
		  <tbody>
			<?php
				if(!empty($response['produtos'])){  
					foreach($response['produtos'] as $produto){
						$IDProduto = $produto['IDProduto'];
						echo "<tr>";
						echo"<td>".($produto['IDProduto'])."</td>";
						echo"<td>".($produto['NomeProduto'])."</td>";
						echo"<td>".($produto['PrecoProduto'])."</td>";
						echo"<td>".($produto['QtdeEstoque'])."</td>";
						echo"<td>".($produto['Descricao'])."</td>";
						echo "<td>
						<form method='GET' action='editar.php' >
							<input type='hidden' name='IDProduto' value='$IDProduto'>
							<button type='submit'>Editar</button>
						</form>
						<form method='POST' action='http://localhost/cantinaapi/CantinaAPI/v1/Api.php?apicall=deleteProdutos' >
							<input type='hidden' id='IDProduto' name='IDProduto' value='$IDProduto'>
							<button type='submit'>Excluir</button>
						</form>
					</td>";
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
