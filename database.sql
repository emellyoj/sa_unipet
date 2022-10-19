-- --------------------------
-- Criação do banco de dados
-- --------------------------

DROP DATABASE IF EXISTS UNIPET;
CREATE DATABASE UNIPET;
USE UNIPET;


-- --------------------------------
-- Criação da tabela pet
-- --------------------------------

CREATE TABLE PET (
    ID_PET 			INT PRIMARY KEY AUTO_INCREMENT,
    NOME_PET		VARCHAR(45) NOT NULL,
    GENERO_PET		CHAR(1),
    RACA_PET		VARCHAR(45),
    DESCRICAO_PET	TEXT,
    FOTO_PET		TEXT
);
    

-- -------------------------------
-- Criação da tabela tipo_usuario
-- -------------------------------

CREATE TABLE TIPO_USUARIO (
    ID_TIPO_USUARIO INT PRIMARY KEY AUTO_INCREMENT,
    TIPO_USUARIO VARCHAR(45) NOT NULL
);


-- --------------------------
-- Criação da tabela usuario
-- --------------------------
CREATE TABLE USUARIO (
    ID_USUARIO INT PRIMARY KEY AUTO_INCREMENT,
    USERNAME_USUARIO VARCHAR(25) NOT NULL UNIQUE,
    NOMECOMPLETO_USUARIO VARCHAR(70) NOT NULL,
    TELEFONE_USUARIO CHAR(11),
    EMAIL_USUARIO VARCHAR(100) NOT NULL,
    SENHA_USUARIO VARCHAR(1000) NOT NULL,
    CEP_USUARIO CHAR(8),
    ESTADO_USUARIO CHAR(2),
    CIDADE_USUARIO VARCHAR(45),
    BAIRRO_USUARIO VARCHAR(45),
    RUA_USUARIO VARCHAR(60),
    NUMEROCASA_USUARIO VARCHAR(7),
    COMPLEMENTOENDERECO_USUARIO VARCHAR(60),
    SALDO_USUARIO DECIMAL(7,2) NOT NULL DEFAULT 0,
    FK_TIPOUSUARIO INT NOT NULL default 1,
	FOREIGN KEY (FK_TIPOUSUARIO)
	REFERENCES TIPO_USUARIO(ID_TIPO_USUARIO)

);


-- -----------------------------------
-- Criação da tabela avaliação medico
-- -----------------------------------

CREATE TABLE AVALIACAO_MEDICO(
	ID_AVALIACAO_MEDICO INT PRIMARY KEY AUTO_INCREMENT,
	ESTRELAS INT NOT NULL,
	COMENTARIO TEXT,
	DATA_AVALIACAO DATE DEFAULT CURDATE(),
	HORA_AVALIACAO TIME DEFAULT CURTIME(),
	FK_AVALIACAO_MEDICO_AVALIADO INT NOT NULL,
		FOREIGN KEY (FK_AVALIACAO_MEDICO_AVALIADO)
		REFERENCES USUARIO(ID_USUARIO),
	FK_AVALIACAO_USUARIO_AVALIADOR INT NOT NULL,
		FOREIGN KEY (FK_AVALIACAO_USUARIO_AVALIADOR)
		REFERENCES USUARIO(ID_USUARIO)
);


-- ------------------------------
-- Criação da tabela usuario_pet 
-- ------------------------------

CREATE TABLE USUARIO_PET(
    ID_USUARIO_PET INT PRIMARY KEY AUTO_INCREMENT,
    FK_PET INT NOT NULL,
	FOREIGN KEY (FK_PET)
	REFERENCES PET(ID_PET),
    FK_USUARIO INT NOT NULL,
	FOREIGN KEY (FK_USUARIO)
	REFERENCES USUARIO(ID_USUARIO)
);


-- ---------------------------
-- Criação da tabela consulta
-- ---------------------------

CREATE TABLE CONSULTA(
    ID_CONSULTA INT PRIMARY KEY AUTO_INCREMENT,
    DATA_CONSULTA DATE NOT NULL,
    HORA_CONSULTA TIME NOT NULL,
    PRECO_CONSULTA DECIMAL(7,2) NOT NULL,
    RELATORIO_CONSULTA TEXT,
    FK_CONSULTA_PET INT NOT NULL,
	FOREIGN KEY (FK_CONSULTA_PET)
	REFERENCES PET(ID_PET),
    FK_CONSULTA_MEDICO INT NOT NULL,
	FOREIGN KEY (FK_CONSULTA_MEDICO)
	REFERENCES USUARIO(ID_USUARIO)
);


-- ----------------------------
-- Criação da tabela vacina
-- ----------------------------

CREATE TABLE VACINA (
    ID_VACINA INT PRIMARY KEY AUTO_INCREMENT,
    NOME_VACINA VARCHAR(45) NOT NULL,
    DESCRICAO_VACINA TEXT
);


-- ----------------------------
-- Criação da tabela vacinacao
-- ----------------------------

CREATE TABLE VACINACAO (
    ID_VACINACAO INT PRIMARY KEY AUTO_INCREMENT,
    DATA_VACINACAO DATE NOT NULL,
    HORA_VACINACAO TIME NOT NULL,
    FK_VACINACAO_PET INT NOT NULL,
	FOREIGN KEY (FK_VACINACAO_PET)
	REFERENCES PET(ID_PET),
    FK_VACINACAO_MEDICO INT NOT NULL,
	FOREIGN KEY (FK_VACINACAO_MEDICO)
	REFERENCES USUARIO(ID_USUARIO),    
    FK_VACINACAO_VACINA INT NOT NULL,
	FOREIGN KEY (FK_VACINACAO_VACINA)
	REFERENCES VACINA(ID_VACINA)
);


-- --------------------------
-- Criação da tabela entrega
-- --------------------------

CREATE TABLE ENTREGA (
    ID_ENTREGA INT PRIMARY KEY AUTO_INCREMENT,
    DATA_ENTREGA DATE,
    HORA_ENTREGA TIME,
    RETIRADO_NA_LOJA TINYINT,
    STATUS_ENTREGA VARCHAR(45) NOT NULL,
    VALOR_FRETE DECIMAL(7,2)
);


-- --------------------------
-- Criação da tabela produto
-- --------------------------
CREATE TABLE PRODUTO (
    ID_PRODUTO INT PRIMARY KEY AUTO_INCREMENT,
    NOME_PRODUTO VARCHAR(45) NOT NULL,
    DESCRICAO_PRODUTO TEXT,
    FOTO_PRODUTO TEXT,
    PRECO_PRODUTO DECIMAL(7,2) NOT NULL,
    QUANT_ESTOQUE INT NOT NULL,
    DISPONIVEL_VENDA TINYINT NOT NULL
);

ALTER TABLE PRODUTO ADD CONSTRAINT CHECK (QUANT_ESTOQUE >= 0);


-- -------------------------
-- Criação da tabela compra
-- -------------------------

CREATE TABLE COMPRA (
    ID_COMPRA INT PRIMARY KEY AUTO_INCREMENT,
    DATA_COMPRA DATE NOT NULL,
    HORA_COMPRA TIME NOT NULL,
    TOTAL_COMPRA DECIMAL(7,2) NOT NULL,
    FK_COMPRA_ENTREGA INT NOT NULL,
	FOREIGN KEY (FK_COMPRA_ENTREGA)
	REFERENCES ENTREGA(ID_ENTREGA),
    FK_COMPRA_USUARIO INT NOT NULL,
	FOREIGN KEY (FK_COMPRA_USUARIO)
	REFERENCES USUARIO(ID_USUARIO)
);


-- ---------------------------
-- Criação da tabela carrinho
-- ---------------------------

CREATE TABLE CARRINHO (
    ID_CARRINHO INT PRIMARY KEY AUTO_INCREMENT,
    QUANTIDADE_PRODUTO INT NOT NULL,
    SUBTOTAL DECIMAL(7,2) NOT NULL,
    FK_CARRINHO_COMPRA INT,
	FOREIGN KEY (FK_CARRINHO_COMPRA)
	REFERENCES COMPRA(ID_COMPRA),
    FK_CARRINHO_PRODUTO INT NOT NULL,
	FOREIGN KEY (FK_CARRINHO_PRODUTO)
	REFERENCES PRODUTO(ID_PRODUTO)	
);


-- ---------------------------
-- Inserção de valores
-- ---------------------------
INSERT INTO TIPO_USUARIO(TIPO_USUARIO) VALUES('Comum'), ('Medico'), ('Admin');