CREATE TABLE Kayttaja(
	id SERIAL PRIMARY KEY,
	kayttajatunnus varchar(15) NOT NULL,
	salasana varchar(15) NOT NULL
);

CREATE TABLE Joukkue(
	id SERIAL PRIMARY KEY,
	nimi varchar(15) NOT NULL,
	kayttaja INTEGER REFERENCES Kayttaja(id) NOT NULL
);

CREATE TABLE Hahmo(
	id SERIAL PRIMARY KEY,
	nimi varchar(15) NOT NULL
);

CREATE TABLE Liitos1(
	id SERIAL PRIMARY KEY,
	joukkue INTEGER REFERENCES Joukkue(id) NOT NULL,
	sankarit INTEGER REFERENCES Hahmo(id)
);

CREATE TABLE Rooli(
	id SERIAL PRIMARY KEY,
	nimi varchar(15) NOT NULL,
	kuvaus varchar(100) NOT NULL
);

CREATE TABLE Liitos2(
	id SERIAL PRIMARY KEY,
	hahmo INTEGER REFERENCES Hahmo(id) NOT NULL,
	roolit INTEGER REFERENCES Rooli(id) NOT NULL
);

CREATE TABLE Esine(
	id SERIAL PRIMARY KEY,
	nimi varchar(100) NOT NULL,
	hinta INTEGER NOT NULL,
	kuvaus varchar(100)
);

CREATE TABLE Taito(
	id SERIAL PRIMARY KEY,
	nimi varchar(100) NOT NULL,
	kuvaus varchar(100),
	manacost INTEGER,
	hahmo INTEGER REFERENCES Hahmo(id),
	esine INTEGER REFERENCES Esine(id)
);