CREATE TABLE Account(
	id SERIAL PRIMARY KEY,
	username varchar(15) NOT NULL,
	password varchar(15) NOT NULL
);

CREATE TABLE Hahmo(
	id SERIAL PRIMARY KEY,
	nimi varchar(15) NOT NULL
);

CREATE TABLE Rooli(
	id SERIAL PRIMARY KEY,
	nimi varchar(15) NOT NULL,
	kuvaus varchar(100) NOT NULL
);

CREATE TABLE Liitos(
	id SERIAL PRIMARY KEY,
	hahmo INTEGER REFERENCES Hahmo(id) NOT NULL,
	roolit INTEGER REFERENCES Rooli(id) NOT NULL
);