<?php


$con = mysqli_connect("localhost","root","","Cantina");
    if (mysqli_connect_errno()) {
        echo "Erro: ".mysqli_connect_error();

    }else{

        $sql ="INSERT INTO Estabelecimento Values ('null','$_POST[CNPJ]','$_POST[nome_cantina]','$_POST[endereco]','$_POST[tel]', '$_POST[email]', '$_POST[senha]')";

    if (mysqli_query($con,$sql)) {

        echo "Cadastro feito com sucesso!";

    }else{

        echo "Erro ao inserir: ".mysqli_error($con);
    }

    mysqli_close($con);

    }

?>