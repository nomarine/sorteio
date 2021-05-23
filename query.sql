USE sorteio;

CREATE TABLE Sorteados (
	id INT NOT NULL,
	nome VARCHAR(32) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Participantes (
	id INT NOT NULL,
	codigo VARCHAR(8) NOT NULL,
	nome VARCHAR(32) NOT NULL,
	sorteado_id int,
	PRIMARY KEY (id),
	FOREIGN KEY (sorteado_id) REFERENCES Sorteados(id)
);

SELECT * FROM Participantes;

SELECT * FROM Sorteados;