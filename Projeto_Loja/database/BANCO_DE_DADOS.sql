CREATE TABLE `Categorias` (
  `ID` bigint(255) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `Clientes` (
  `ID` int(120) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telefone` int(20) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `Produtos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `ID_categoria` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `produto` varchar(120) NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ID_categoria) references categorias(id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Vendas (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_cliente BIGINT,
    data_hora DATETIME,
    total DECIMAL(10, 2),
    FOREIGN KEY (ID_Cliente) REFERENCES Clientes(ID)
);

ENGINE=InnoDB DEFAULT CHARSET=utf8;



