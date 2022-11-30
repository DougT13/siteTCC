DROP DATABASE IF EXISTS Cantina;

	CREATE DATABASE Cantina;

	USE Cantina;

	CREATE TABLE Estabelecimento(
			IDEstabelecimento INT NOT NULL auto_increment PRIMARY KEY,
			CNPJ VARCHAR(14) NOT NULL UNIQUE KEY,
			NomeEstabelecimento VARCHAR(100) NOT NULL,
			Endereco VARCHAR(100) NOT NULL,
			Telefone VARCHAR(14) NULL,
			Email VARCHAR(100) NOT NULL,
			Senha VARCHAR(30) NOT NULL

	);

	INSERT INTO Estabelecimento
	VALUES(null, '98563256987456', 'Cantina do Tonhao', 'Rua do Tonhao', '9911547896325', 'tonhao@tonhao.com', 'tonho');

	CREATE TABLE Clientes(
		IDCliente INT auto_increment NOT NULL PRIMARY KEY,
		Nome VARCHAR(100) NOT NULL,
		Telefone BIGINT(14) NOT NULL,
		Email VARCHAR(100) NOT NULL UNIQUE KEY,
        Senha VARCHAR(100) NOT NULL
);


	
	CREATE TABLE Produtos(
			IDProduto INT NOT NULL auto_increment PRIMARY KEY,
			IDEstabelecimento INT NOT NULL,
			NomeProduto VARCHAR(40) NOT NULL,
			PrecoProduto DECIMAL(4,2) NOT NULL,
			QtdeEstoque INT NOT NULL,
			Descricao VARCHAR(250) NOT NULL,
			CONSTRAINT FK_Estabelecimento FOREIGN KEY (IDEstabelecimento) REFERENCES Estabelecimento(IDEstabelecimento)
	);

	

	INSERT INTO Produtos
	VALUES(null, 1, 'Coxinha', '5.00', '45', 'Coxinha de Frango'),
	(null, 1, 'Hamburgão', '5.50', '41', 'Hamburguer com cheedar'),
	(null, 1, 'Beirute', '7.00', '20', 'Fatia unica de beirute de frango'),
	(null, 1, 'Pizza', '9.00', '10', 'Fatia unica de pizza de calabresa'),
	(null, 1, 'Bolo', '5.00', '85', 'fatia unica de bolo de chocolate');


	CREATE TABLE Pedidos(
		IDPedido INT NOT NULL auto_increment PRIMARY KEY,
		IDCliente INT NOT NULL,
		DataPedido DATE NOT NULL,
		ValorPedido DECIMAL(5,2) NOT NULL,

		CONSTRAINT FK_Clientes_IDCliente FOREIGN KEY (IDCliente) REFERENCES Clientes(IDCliente)
		
);


	CREATE TABLE ItensPedidos(
		IDPedido INT NOT NULL,
		IDProduto INT NOT NULL,
		QuantidadeVendida INT NOT NULL,
		CONSTRAINT FK_Produtos_IDProduto FOREIGN KEY (IDProduto) REFERENCES Produtos (IDProduto),
		CONSTRAINT FK_Pedidos_IDPedido FOREIGN KEY (IDPedido) REFERENCES Pedidos (IDPedido)

	);

	INSERT INTO Clientes
	VALUES(null, 'Jailson Mendes', '(11)99632-0258', 'jailson@mendes.com', '123pato'),
	(null, 'Manel Solucoes', '(11)96969-6969', 'manel@solucao.com', '123manel'),
	(null, 'Dogla Gay Hetero', '(11)91313-2222', 'dogla@serelepe.com', '123dogla');
	
	INSERT INTO Pedidos
	VALUES(null, '1', '2005-05-01', '80'),
	(null, '1', '2004-05-08', '10'),

	(null, '2', '2022-10-11', '50'),

	(null, '3', '2022-10-15', '40');


	INSERT INTO ItensPedidos
	VALUES('1', '1', '5'),
	('1', '1', '2'),
	('1', '1', '9'),
	('1', '1', '8');

	INSERT INTO ItensPedidos
	VALUES('2', '3', '1'),
	('2', '2', '1'),
	('2', '3', '3'),
	('2', '4', '2');

	INSERT INTO ItensPedidos
	VALUES('4', '1', '5'),
	('4', '2', '7'),
	('4', '3', '8'),
	('4', '4', '9');

	SELECT Pedidos.IDPedido,
	Pedidos.DataPedido,
	Pedidos.ValorPedido,
	Clientes.Nome,
	Produtos.NomeProduto,
	Produtos.PrecoProduto,
	ItensPedidos.QuantidadeVendida
	FROM Produtos INNER JOIN (ItensPedidos INNER JOIN
	(Pedidos INNER JOIN Clientes ON Clientes.IDCliente = Pedidos.IDCliente)
	ON ItensPedidos.IDPedido = Pedidos.IDPedido)
	ON ItensPedidos.IDProduto = Produtos.IDProduto
	ORDER BY IDPedido;


/*
SELECT ItensPedidos.IDPedido,
Produtos.NomeProduto
FROM ItensPedidos INNER JOIN Produtos ON Produtos.IDProduto = ItensPedidos.IDProduto
ORDER BY ItensPedidos.IDPedido;

SELECT Produtos.NomeProduto,
	Produtos.PrecoProduto,
	ItensPedidos.QuantidadeVendida
	FROM Produtos INNER JOIN
	ItensPedidos ON ItensPedidos.IDProduto = Produtos.IDProduto
	ORDER BY Produtos.IDProduto;

SELECT Pedidos.IDPedido,
	Pedidos.DataPedido,
	Clientes.Nome
	FROM Pedidos INNER JOIN
	Clientes ON Clientes.IDCliente = Pedidos.IDCliente
	ORDER BY Pedidos.IDPedido;
*/	