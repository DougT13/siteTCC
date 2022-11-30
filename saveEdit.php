<?php 

	include_once ('config.php');

	if (isset($_POST['update'])) {

		$IDProduto = $_POST['IDProduto'];		
		$nome_produto = $_POST['nome_produto'];
        $valor = $_POST['valor'];
        $quant = $_POST['quant'];
        $descricao = $_POST['descricao'];

        $sqlUpdate = "UPDATE produtos SET nome_produto='$nome_produto', valor='$valor', quant = '$quant', descricao = '$descricao' WHERE IDProduto='$IDProduto'";

        $result = $conexao->query($sqlUpdate);
	}
	header('location: Gerenciamento.php');

 ?>