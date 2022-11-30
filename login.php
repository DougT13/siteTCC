<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
			body{
            font-family: Arial, Helverica, sans-serif;
            background-image: url(images/bg-cantina1.png);
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid black;
        }
        legend{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: #ffcc13;
            border-radius: 5px;
            color: black;
        }
        .inputBox{
            position: relative;
        } 
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid black;
            outline: none;
            color: black;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput, 
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: black;
        }
        .submit{
            background-color: #ffcc13;
            width: 100%;
            border: none;
            padding: 15px;
            color: black;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            font-weight: bold;
        }
        .submit:hover{
            background-color: #ffb515;
        }
        footer{
		 position: fixed;
		 left: 0;
		 bottom: 0;
		 width: 100%;
		 background-color: rgb(40,40,40);
		 color: white;
		 text-align: center;
		}
	</style>
</head>
<body>
	<div class="box">

		<form action="testLogin.php" method="POST">
			<fieldset>
				<legend><b>Login</b></legend>
				<div class="inputBox">
	            	<input type="text" name="email" class="inputUser" required>
	            	<label for="email" class="labelInput">Email</label>
	            </div>
	            <br><br>
	            <div class="inputBox">	
	            	<input type="password" name="senha" class="inputUser" required>
	            	<label for="senha" class="labelInput">Senha</label>
	            </div>	
	            <br><br>
	            <input type="submit" class="submit" name="submit" id="submit" value="Entrar">
            </fieldset>
        </form>
	</div>
    <footer>
	    Projeto Open Source.	&trade; - Copyright&copy; - : Agradecimentos especiais ETEC IRMÃ AGOSTINA
    </footer>
</body>
</html>