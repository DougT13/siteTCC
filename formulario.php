

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Itens</title>
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
        <form action="http://localhost/cantinaapi/CantinaAPI/v1/Api.php?apicall=createProdutos" method="POST">
            <fieldset>
                <legend><b>Adicionar Produto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="NomeProduto" id="NomeProduto" class="inputUser" required>
                    <label for="NomeProduto" class="labelInput">Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="PrecoProduto" id="PrecoProduto" class="inputUser" required>
                    <label for="PrecoProduto" class="labelInput">Valor</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="QtdeEstoque" id="QtdeEstoque" class="inputUser" required>
                    <label for="QtdeEstoque" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Descricao" id="Descricao" class="inputUser" required>
                    <label for="Descricao" class="labelInput">Descrição do Produto</label>
                </div>
                
                <br><br>
                <input type="submit" class="submit" value="Registrar" name="submit" id="submit">
                <br><br>
                <button onclick="window.location.href='Gerenciamento.php'" style="text-decoration: none;" class="submit">Voltar</button>
            </fieldset>
        </form>
    </div>
    <footer>
		Projeto Open Source.	&trade; - Copyright&copy; - : Agradecimentos especiais ETEC IRMÃ AGOSTINA
    </footer>
</body>
</html>