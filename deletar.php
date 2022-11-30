<?php 

	if (!empty($_GET['IDProduto'])) {

		include_once ('config.php');

        $IDProduto = $_GET['IDProduto'];

        $sqlSelect = "SELECT * FROM Produtos WHERE IDProduto=$IDProduto";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM Produtos WHERE IDProduto=$IDProduto";

            $resultDelete = $conexao->query($sqlDelete);
		}
	}
	header('location: Gerenciamento.php');

 ?>