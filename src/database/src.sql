CREATE TABLE clientes(
	idCliente INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(60),
	cpf VARCHAR(15)
);

CREATE TABLE produtos(
	idProduto INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(50),
	valor DECIMAL(7,2),
	quantidade INT
);

CREATE TABLE vendas(
	idVenda INT PRIMARY KEY AUTO_INCREMENT,
	idCliente INT,
	valorTotal DECIMAL(7,2),
	FOREIGN KEY (idCliente) REFERENCES clientes(idCliente)
);

CREATE TABLE itensVenda(
	idItensVenda INT PRIMARY KEY AUTO_INCREMENT,
	idVenda INT,
	idProduto INT,
	quantidade DECIMAL(7,2),
	valorUnitario DECIMAL(7,2),
	FOREIGN KEY (idVenda) REFERENCES vendas (idVenda),
	FOREIGN KEY (idProduto) REFERENCES produtos (idProduto)
);


CREATE TRIGGER setItemVenda
AFTER INSERT ON itensVenda
FOR EACH ROW
BEGIN

	UPDATE vendas SET valorTotal = valorTotal + (NEW.quantidade * NEW.valorUnitario) WHERE idVenda = NEW.idVenda;
	UPDATE produtos SET quantidade = quantidade - NEW.quantidade WHERE idProduto = NEW.idProduto;
	
END;

CREATE TRIGGER attItemVenda
AFTER UPDATE ON itensVenda
FOR EACH ROW
BEGIN

	UPDATE vendas SET valorTotal = valorTotal - ((OLD.quantidade * OLD.valorUnitario) * (NEW.quantidade * NEW.valorUnitario)) WHERE idVenda = NEW.idVenda;
	UPDATE produtos SET quantidade = quantidade + (OLD.quantidade - NEW.quantidade) WHERE idProduto = NEW.idProduto;
	
END;

CREATE TRIGGER delItemVenda
AFTER DELETE ON itensVenda
FOR EACH ROW
BEGIN

	UPDATE vendas SET valorTotal = valorTotal - (OLD.quantidade * OLD.valorUnitario) WHERE idVenda = OLD.idVenda;
	UPDATE produtos SET quantidade = quantidade + OLD.quantidade WHERE idProduto = OLD.idProduto;
	
END;

CREATE TRIGGER deltarVenda
AFTER DELETE ON vendas
FOR EACH ROW
BEGIN

	DELETE FROM itensVenda WHERE idVenda = OLD.idVenda;
	
END;















