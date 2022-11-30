<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadatrar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap.min.js"></script>
	<style>
			body.center-form {
	    	min-height: 100vh;
	  		}

		  div.center-form {
		    position: relative;
		    min-height: 100vh;
		  }

		  div.center-form > form {
		    position: absolute;
		    top: 35%;
		    left: 50%;
		    transform: translateY(-50%) translateX(-50%);
	</style>
</head>
<body class="center-form">
	<div class="jumbotron" style="text-align: center; background: darkred; color: white; padding-left: 10px;">
		<h1>Cadastrar</h1>
		<p>Cadastre sua cantina agora!</p>
	</div>
	<div class="center-form">
		<form action="cadastrado.php" method="POST">
			NOME DA CANTINA <br>
			<input type="text" name="nome_cantina" size="40" maxlength="100">
			<br>
			<br>
			CNPJ <br>
			<input type="text" name="CNPJ" size="40" min="11" maxlength="14">
			<br> 
			<br>
			ENDEREÇO <br>
			<input type="text" name="endereco" size="40">
			<br><br>
			TELEFONE <br>
			<input type="text" name="tel" size="40" min="8" maxlength="13">
			<br><br>
			EMAIL <br>
			<input type="text" name="email" size="40" maxlength="100">
			<br><br>
			SENHA <br>
			<input type="text" name="senha" size="40" maxlength="30">
			<br><br>
			<input type="submit" name="enviar">
		</form>
	</div>
</body>
</html>
